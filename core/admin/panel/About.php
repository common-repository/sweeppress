<?php

namespace Dev4Press\Plugin\SweepPress\Admin\Panel;

use Dev4Press\v51\Core\UI\Admin\PanelAbout;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class About extends PanelAbout {
	protected bool $history = true;
}
