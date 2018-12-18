<?php
namespace SwapBoard\Controllers\Auth;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\UsersModel;
use SwapBoard\Controllers\BaseController;
use SwapBoard\Controllers\UsersControllers;
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
		$swapUser = $this->dataExists( $postData['email'], 'email' );

		if ( $swapUser && $this->validate( $postData, $swapUser ) ) :
			sboardSetSession( 'user', $swapUser );

			$return['type'] = 'success';
		else:
			$return['type'] = 'error';
			$return['msg'] = 'Credentials do not match.';
		endif;

		echo json_encode( $return );
	}

	public function validate( $postData, $swapUser )
	{
		return password_verify( $postData['password'], $swapUser->password );
	}
}
