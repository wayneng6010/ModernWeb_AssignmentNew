<?php
	require '../vendor/autoload.php';

	define('SITE_URL', 'http://localhost/modern_web_project/public_html/cart.php');

	$paypal = new \PayPal\Rest\ApiContext(
		new \PayPal\Auth\OAuthTokenCredential(
			'AVoxyNKM_n71O-EQeZLGyv8gmS5RZhxHjylP1KIlKFfXr6fpoQ1HY_5WJagHHBorpKeZ7U-BKsR0v5-f',
			'EAUVXyzPByzCVg1RgfbEVyBaS2zVnX-ol-NgUEk2TNHpEItwhXOeB2dOZsoxjIT47iIc_4pU5qgAZ93X'
		)
	);

	$paypal->setConfig(
      array(
        'log.LogEnabled' => true,
        'log.FileName' => 'PayPal.log',
        'log.LogLevel' => 'DEBUG'
      )
	);
?>