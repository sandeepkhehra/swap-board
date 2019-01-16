<?php
namespace SwapBoard\Controllers\Auth;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\UsersModel;
use SwapBoard\Controllers\BaseController;
// use SwapBoard\Controllers\UsersControllers;
use SwapBoard\Controllers\SwapBoardAuthenticator;

class LoginController extends BaseController
{
	public function __construct()
	{
		parent::__construct( new UsersModel );
	}

	public function authenticate()
	{
		$postData = sboardFilterPostData( $_POST );

		if ( empty( $postData['user_login'] ) || empty( $postData['user_pass'] ) ) :
			$return['type'] = 'error';
			$return['msg'] = 'Some fields are missing!';
		else:
			$swapUser = $this->dataExists( $postData['user_login'], 'user_login' );

			// if ( $swapUser && $this->validate( $postData, $swapUser ) ) :
			if ( $swapUser ) :
				wp_signon( ['user_login' => $swapUser->user_login, 'user_password' => $_POST['user_pass'] ] );
				sboardSetSession( 'user', $swapUser );

				$return['type'] = 'success';
				$return['redirect'] = get_permalink( PLUGIN_ADMIN_DASH_PAGE );

			else:
				$return['type'] = 'error';
				$return['msg'] = 'Credentials do not match.';
			endif;
		endif;

		echo json_encode( $return );
	}

	public function validate( $postData, $swapUser )
	{
		return password_verify( $postData['password'], $swapUser->password );
	}
}
