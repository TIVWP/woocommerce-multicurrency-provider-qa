<?php

namespace WOOMC\MultiCurrency\Rate\Provider;

use WOOMC\MultiCurrency\DAO\Factory;

/**
 * Class Provider\FixedRates
 */
class QA extends ProviderAbstract {

	/**
	 * The provider ID.
	 *
	 * @return string
	 * @since 0.0.2 Compatible with WOOMC 1.15.0
	 */
	public static function id() {
		return 'QA';
	}

	/**
	 * Retrieve rates.
	 *
	 * @inheritdoc
	 */
	public function retrieve_rates() {

		// Rates updated now.
		$this->setTimestamp( time() );

		/**
		 * Retrieval status is always true.
		 *
		 * @since 0.0.2
		 */
		if ( method_exists( '\WOOMC\MultiCurrency\DAO\IDAO', 'getRatesRetrievalStatus' ) ) {
			Factory::getDao()->setRatesRetrievalStatus( true );
		}

		// Return some fake rates.
		return array(
			'CAD' => 0.5,
			'EUR' => 2,
			'GBP' => 3,
			'JPY' => 100,
			'USD' => 1,
			'AUD' => 4,
		);

	}

	/**
	 * Advertise this provider in the admin area.
	 */
	public static function register() {

		add_filter(
			'woocommerce_multicurrency_providers',
			array(
				__CLASS__,
				'filter__woocommerce_multicurrency_providers',
			)
		);

		add_filter(
			'woocommerce_multicurrency_providers_credentials_name',
			array(
				__CLASS__,
				'filter__woocommerce_multicurrency_providers_credentials_name',
			)
		);
	}

	/**
	 * Add a dropdown entry.
	 *
	 * @internal filter.
	 *
	 * @param string[] $providers The list of providers.
	 *
	 * @return string[]
	 */
	public static function filter__woocommerce_multicurrency_providers( $providers ) {
		$providers[ self::id() ] = self::id();

		return $providers;
	}

	/**
	 * Add label for the credentials input.
	 *
	 * @internal filter.
	 *
	 * @param string[] $providers_credentials_name
	 *
	 * @return string[]
	 */
	public static function filter__woocommerce_multicurrency_providers_credentials_name( $providers_credentials_name ) {
		$providers_credentials_name[ self::id() ] = ': keep this blank';

		return $providers_credentials_name;
	}
}
