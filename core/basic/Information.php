<?php

namespace Dev4Press\Plugin\SweepPress\Basic;

use Dev4Press\v51\Core\Plugins\Information as BaseInformation;
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
class Information extends BaseInformation {
    public $code = 'sweeppress';

    public $version = '6.1';

    public $build = 6100;

    public $updated = '2024.10.24';

    public $status = 'stable';

    public $edition = 'free';

    public $released = '2022.03.03';

    public function __construct() {
        parent::__construct();
    }

}
