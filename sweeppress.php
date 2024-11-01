<?php
/**
 * Plugin Name:       SweepPress: Website Cleanup and Optimization
 * Plugin URI:        https://www.dev4press.com/plugins/sweeppress/
 * Description:       Remove unused, orphaned, duplicated data in your WordPress website using 50+ sweepers, manage and clean Options table, optimize database.
 * Author:            Milan Petrovic
 * Author URI:        https://www.dev4press.com/
 * Text Domain:       sweeppress
 * Version:           6.1
 * Requires at least: 5.9
 * Tested up to:      6.6
 * Requires PHP:      7.4
 * License:           GPLv3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package SweepPress
 *
 * == Copyright ==
 * Copyright 2008 - 2024 Milan Petrovic (email: support@dev4press.com)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
   */

use Dev4Press\Plugin\SweepPress\Meta\Monitor;
use Dev4Press\v51\WordPress;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( function_exists( 'sweeppress_fs' ) ) {
	sweeppress_fs()->set_basename( false, __FILE__ );
} else {
	$sweeppress_urlname_basic = plugins_url( '/', __FILE__ );

	define( 'SWEEPPRESS_FILE', __FILE__ );
	define( 'SWEEPPRESS_PATH', __DIR__ . '/' );
	define( 'SWEEPPRESS_D4PLIB_PATH', __DIR__ . '/library/' );
	define( 'SWEEPPRESS_URL', $sweeppress_urlname_basic );

	require_once SWEEPPRESS_PATH . 'core/freemius.php';

	if ( ! defined( 'SWEEPPRESS_SIMULATION' ) ) {
		define( 'SWEEPPRESS_SIMULATION', false );
	}

	if ( ! defined( 'SWEEPPRESS_SWEEPERS_ALLOW_DB' ) ) {
		define( 'SWEEPPRESS_SWEEPERS_ALLOW_DB', true );
	}

	if ( ! defined( 'SWEEPPRESS_MULTISITE_LIMIT_COUNT' ) ) {
		define( 'SWEEPPRESS_MULTISITE_LIMIT_COUNT', 2048 );
	}

	if ( ! defined( 'SWEEPPRESS_METADATA_MONITOR' ) ) {
		define( 'SWEEPPRESS_METADATA_MONITOR', 'off' );
	}

	require_once SWEEPPRESS_D4PLIB_PATH . 'core.php';

	require_once SWEEPPRESS_PATH . 'core/autoload.php';
	require_once SWEEPPRESS_PATH . 'core/bridge.php';
	require_once SWEEPPRESS_PATH . 'core/functions.php';

	if ( SWEEPPRESS_METADATA_MONITOR !== 'off' ) {
		Monitor::instance();
	}

	sweeppress();
	sweeppress_settings();

	if ( WordPress::instance()->is_admin() ) {
		sweeppress_ajax();
		sweeppress_admin();
	}
}
