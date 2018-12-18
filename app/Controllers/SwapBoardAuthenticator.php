<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\HookrInterface;

class SwapBoardAuthenticator implements HookrInterface
{
	public function getUser()
	{
		global $swapUser;

		if ( isset( $_SESSION[ SB_SESS_KEY ]['user'] ) &&
			! empty($_SESSION[ SB_SESS_KEY ]['user']) ) :

			$swapUser = $_SESSION[ SB_SESS_KEY ]['user'];
		endif;

		return $swapUser;
	}

	public function initSession()
	{
		if ( ! session_id() ) session_start();
	}

	public function hook()
	{
		add_action( 'init', [$this, 'initSession'] );
		add_action( 'init', [$this, 'getUser'] );
	}
}
