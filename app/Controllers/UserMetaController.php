<?php
namespace SwapBoard\Controllers;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

use SwapBoard\Models\UsersModel;

class UserMetaController extends BaseController
{
	public function __construct()
	{
		parent::__construct( new UsersModel );
	}

	public function create()
	{
		$postData = sboardFilterPostData( $_POST );
		/** @todo fix this lmao */
		$return['type'] = 'success';
		echo json_encode( $return );
	}

	public function check()
	{
		$return['type'] = 'success';

		echo json_encode($return);
	}
}