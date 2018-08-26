<?php
/**
 * Plugin Name: QA Rates Provider for WooCommerce Multi-currency
 * Plugin URI: https://github.com/TIVWP/woocommerce-multicurrency-provider-qa
 * Description: Returns a set of fake currency rates, useful for QA automation scripts.
 * Version: 0.0.1
 * Author: TIV.NET INC.
 * Author URI: https://www.tiv.net/
 * WC requires at least: 3.0.0
 * WC tested up to: 3.4.4
 * License: GPL-3.0-or-later
 * License URI: https://spdx.org/licenses/GPL-3.0-or-later.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Silently refuse to work below PHP 5.3.
if ( ! defined( 'PHP_VERSION_ID' ) || PHP_VERSION_ID < 50300 ) {
	return;
}

// Continue with the 53+ loader.
/* @noinspection dirnameCallOnFileConstantInspection */
require_once dirname( __FILE__ ) . '/src/loader.php';
