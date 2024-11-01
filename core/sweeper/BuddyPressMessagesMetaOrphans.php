<?php

namespace Dev4Press\Plugin\SweepPress\Sweeper;

use Dev4Press\Plugin\SweepPress\Base\Sweeper;
use Dev4Press\Plugin\SweepPress\Basic\Removal;
use Dev4Press\Plugin\SweepPress\Query\BuddyPress;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BuddyPressMessagesMetaOrphans extends Sweeper {
	protected string $_code = 'buddypress-messages-meta-orphans';
	protected string $_version = '4.0';
	protected string $_category = 'buddypress';
	protected array $_affected_tables = array(
		'bp_messages_meta',
	);

	protected bool $_flag_bulk_network = true;

	public static function instance() : BuddyPressMessagesMetaOrphans {
		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new BuddyPressMessagesMetaOrphans();
		}

		return $instance;
	}

	public function title() : string {
		return __( 'Messages Meta Orphans', 'sweeppress' );
	}

	public function description() : string {
		return __( 'Remove all records from the BuddyPress messages meta database table that are no longer connected to terms.', 'sweeppress' );
	}

	public function help() : array {
		return array(
			__( 'Orphaned meta records are usually product of broken messages deletion, or other issues.', 'sweeppress' ),
		);
	}

	public function prepare() {
		$this->_tasks = array(
			$this->_code => BuddyPress::instance()->messages_meta_orphaned_status(),
		);
	}

	public function sweep( $tasks = array() ) : array {
		$this->register_active_sweeper();
		$this->log_sweep_start();

		$removal = Removal::instance()->bp_messages_meta_orphans();

		return $this->base_sweep( $removal );
	}
}
