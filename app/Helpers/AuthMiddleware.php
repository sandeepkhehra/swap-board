<?php
namespace SwapBoard\Helpers;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

class AuthMiddleware
{
	public function authenticate()
	{
		$currentUser = wp_get_current_user();
		$caps = $currentUser->caps;

		if ( $currentUser->ID > 0 && in_array( 'administratosr', $caps ) ) :

			echo "<pre>";
			print_r($currentUser);
			echo "</pre>";

			return true;
		endif;

		return false;
	}
}
