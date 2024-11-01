<?php

namespace Dev4Press\Plugin\SweepPress\Sweeper;

use Dev4Press\Plugin\SweepPress\Base\Sweeper;
use Dev4Press\Plugin\SweepPress\Basic\Removal;
use Dev4Press\Plugin\SweepPress\Query\Terms;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class TermRelationshipsTaxonomyOrphans extends Sweeper {
	protected string $_code = 'term-relationships-taxonomy-orphans';
	protected string $_version = '6.0';
	protected string $_category = 'terms';
	protected array $_affected_tables = array(
		'term_relationships',
	);

	protected bool $_flag_auto_cleanup = false;
	protected bool $_flag_bulk_network = true;

	public static function instance() : TermRelationshipsTaxonomyOrphans {
		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new TermRelationshipsTaxonomyOrphans();
		}

		return $instance;
	}

	public function title() : string {
		return __( 'Term Relationships Taxonomy Orphans', 'sweeppress' );
	}

	public function description() : string {
		return __( 'Remove all records from the `term_relationships` database table that are no longer connected to `term_teaxonomy` table.', 'sweeppress' );
	}

	public function help() : array {
		return array(
			__( 'Orphaned object relationship records with are usually product of broken terms or posts deletion, or other issues.', 'sweeppress' ),
		);
	}

	public function prepare() {
		$this->_tasks = array(
			$this->_code => Terms::instance()->term_relationships_taxonomy_orphaned_status(),
		);
	}

	public function sweep( $tasks = array() ) : array {
		$this->register_active_sweeper();
		$this->log_sweep_start();

		$removal = Removal::instance()->term_relationships_taxonomy_orphans();

		return $this->base_sweep( $removal );
	}
}
