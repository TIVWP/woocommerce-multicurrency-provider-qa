<?php

namespace WOOMC;

use WOOMC\MultiCurrency\Rate\Provider\QA;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'woocommerce_multicurrency_before_loading',
	function () {
		require_once __DIR__ . '/MultiCurrency/Rate/Provider/QA.php';
		QA::register();
	}
);
