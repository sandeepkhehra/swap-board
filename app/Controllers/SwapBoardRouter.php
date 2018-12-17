<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\HookrInterface;

class SwapBoardRouter implements HookrInterface
{
	public function hook()
	{
		add_action( 'wp_ajax_sboardAJAX', [$this, 'sboardAJAX'] );
		add_action( 'wp_ajax_nopriv_sboardAJAX', [$this, 'sboardAJAX'] );
		add_action( 'admin_post_sboardPOST', [$this, 'sboardPOST'] );
	}

	public function sboardAJAX()
	{
		/** @todo check the nonce validation for change actions */
		// if ( $this->validate( $_POST ) ) $this->resolveFormAction( $_POST );
		$this->resolveFormAction( $_POST );
		wp_die();
	}

	public function sboardPOST()
	{
		if ( $this->validate( $_POST ) ) $this->resolveFormAction( $_POST );
	}

	public function validate( $formData )
	{
		if (isset( $formData[ SB_FORM_NONCE ] )
			&& wp_verify_nonce( $formData[ SB_FORM_NONCE ], $formData['sbAction'] ) ) {
			return true;
		}

		return false;
	}

	public function resolveFormAction( $actionData )
	{
		// echo "<pre>";
		// echo ';sadsa';
		// print_r($actionData);
		// echo "</pre>";

		$controller = str_replace( ':', '\\', $actionData['sbController'] );
		$method = $actionData['sbAction'];

		if ( class_exists( $controller ) ) :
			$controllerClass = new $controller;

			if ( method_exists( $controllerClass, $method ) ) {
				$controllerClass->$method();
			}
		endif;
	}
}
