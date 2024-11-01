<?php

namespace Dev4Press\Plugin\SweepPress\Sweeper;

use Dev4Press\Plugin\SweepPress\Base\Sweep\MetaDuplicates;
use Dev4Press\Plugin\SweepPress\Basic\DB;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class UsermetaDuplicates extends MetaDuplicates {
	protected string $_code = 'usermeta-duplicates';
	protected string $_category = 'users';
	protected string $table = 'usermeta';
	protected array $db_columns = array(
		'id'    => 'umeta_id',
		'ref'   => 'user_id',
		'key'   => 'meta_key',
		'value' => 'meta_value',
	);
	protected array $_affected_tables = array(
		'usermeta',
	);

	public function __construct() {
		parent::__construct();

		$this->db_table   = DB::instance()->usermeta;
		$this->exceptions = sweeppress_settings()->get( 'dupe_allow_usermeta', 'sweepers' );
	}

	public static function instance() : UsermetaDuplicates {
		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new UsermetaDuplicates();
		}

		return $instance;
	}

	public function title() : string {
		return __( 'Usermeta Duplicates', 'sweeppress' );
	}

	public function description() : string {
		return __( 'Remove all duplicated records from the `usermeta` database table.', 'sweeppress' );
	}

	public function help() : array {
		$list = parent::help();

		array_unshift( $list, __( 'Duplicated record in usermeta table is the record with same `user_id`, `meta_key` and `meta_value`.', 'sweeppress' ) );

		return $list;
	}
}
