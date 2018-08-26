<?php

namespace WOOMC\MultiCurrency\Rate\Provider;

/**
 * Class Provider\FixedRates
 */
class QA extends ProviderAbstract {

	/**
	 * Provider ID.
	 *
	 * @var string
	 */
	const PROVIDER_ID = 'QA';

	/**
	 * Retrieve rates.
	 *
	 * @inheritdoc
	 */
	public function retrieve_rates() {

		// Rates updated now.
		$this->setTimestamp( time() );

		// Return some fake rates.
		return array(
			'CAD' => 0.5,
			'EUR' => 2,
			'GBP' => 3,
			'JPY' => 100,
			'USD' => 1,
		);

	}

	/**
	 * Advertise this provider in the admin area.
	 */
	public static function register() {

		add_filter( 'woocommerce_multicurrency_providers',
			array(
				__CLASS__,
				'filter__woocommerce_multicurrency_providers',
			)
		);

		add_filter( 'woocommerce_multicurrency_providers_credentials_name',
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
		$providers[ self::PROVIDER_ID ] = self::PROVIDER_ID;

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
		$providers_credentials_name[ self::PROVIDER_ID ] = ': keep this blank';

		return $providers_credentials_name;
	}
}
