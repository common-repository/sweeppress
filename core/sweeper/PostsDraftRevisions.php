<?php

namespace Dev4Press\Plugin\SweepPress\Sweeper;

use Dev4Press\Plugin\SweepPress\Base\Sweeper;
use Dev4Press\Plugin\SweepPress\Basic\Data;
use Dev4Press\Plugin\SweepPress\Basic\Removal;
use Dev4Press\Plugin\SweepPress\Query\Posts;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PostsDraftRevisions extends Sweeper {
	protected string $_code = 'posts-draft-revisions';
	protected string $_category = 'posts';
	protected string $_version = '3.6';
	protected int $_days_to_keep = 0;
	protected array $_affected_tables = array(
		'postmeta',
		'posts',
	);

	protected bool $_flag_auto_cleanup = false;
	protected bool $_flag_single_task = false;

	protected bool $_flag_bulk_network = true;
	protected bool $_flag_high_system_requirements = true;
	protected bool $_flag_days_to_keep = true;

	public function __construct() {
		parent::__construct();

		$this->_days_to_keep = sweeppress_settings()->get( 'keep_days_posts-draft-revisions', 'sweepers', 0 );
	}

	public static function instance() : PostsDraftRevisions {
		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new PostsDraftRevisions();
		}

		return $instance;
	}

	public function items_count_n( int $value ) : string {
		return _n( '%s post', '%s posts', $value, 'sweeppress' );
	}

	public function title() : string {
		return __( 'Draft Posts Revisions', 'sweeppress' );
	}

	public function description() : string {
		return __( 'Remove revisions for posts with draft status.', 'sweeppress' );
	}

	public function help() : array {
		$help = array(
			__( 'This sweeper will take into account revisions for posts with draft status only for every post type.', 'sweeppress' ),
			__( 'It is not a good idea to remove revisions while you are still writing the post, in case you need to go back and change things before publishing.', 'sweeppress' ),
			__( 'If you remove revisions, you will not be able to go back o previous versions of the post!', 'sweeppress' ),
		);

		if ( $this->_days_to_keep > 0 ) {
			$help[] = sprintf( __( 'This sweeper will keep revisions from the past %s days. You can adjust the days to keep value in the plugin Settings.', 'sweeppress' ), '<strong>' . $this->_days_to_keep . '</strong>' );
		}

		return $help;
	}

	public function limitations() : array {
		return array(
			__( 'This sweeper can\'t be used from the Dashboard for Auto Sweeping.', 'sweeppress' ),
		);
	}

	protected function post_types() : array {
		return Data::get_post_types();
	}

	public function list_tasks() : array {
		return $this->post_types();
	}

	public function prepare() {
		foreach ( $this->post_types() as $cpt => $label ) {
			$this->_tasks[ $cpt ] = array(
				'title'      => $label,
				'real_title' => $cpt,
				'items'      => 0,
				'records'    => 0,
				'size'       => 0,
			);
		}

		$this->_tasks = array_merge( $this->_tasks, Posts::instance()->post_draft_revisions( $this->_days_to_keep ) );
	}

	public function sweep( $tasks = array() ) : array {
		$results = array(
			'records' => 0,
			'size'    => 0,
			'tasks'   => array(),
		);

		$start = $this->get_tasks();

		$this->register_active_sweeper();
		$this->log_sweep_start();

		foreach ( $tasks as $name ) {
			$task = $start[ $name ] ?? array( 'records' => 0 );

			if ( $task['records'] > 0 ) {
				$removal = Removal::instance()->posts_revisions( $name, $this->_days_to_keep, array(
					'draft',
					'auto-draft',
				) );

				if ( is_wp_error( $removal ) ) {
					$results['tasks'][ $name ] = $removal;
				} else {
					$results['tasks'][ $name ] = $task['title'];
					$results['records']        += $task['records'];
					$results['size']           += $task['size'];
				}
			}
		}

		$this->log_sweep_end();
		$this->unregister_active_sweeper();

		return $results;
	}
}
