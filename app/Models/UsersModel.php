<?php
namespace SwapBoard\Models;

defined('ABSPATH') or die('Not permitted!');

class UsersModel extends BaseModel
{
	protected $table = 'users';

	public function getBy( $value, $type = 'id' )
	{
		return $this->read( $value, $type );
	}

	public function insert( $data )
	{
		$userTel = $data['phone'];
		unset( $data['phone'] );

		$userID = wp_insert_user( $data );

		if ( is_wp_error( $userID ) ) {
			$return['type'] = 'error';
			$return['msg'] = $userID->get_error_message();
		} else {
			wp_signon( ['user_login' => $data['user_login'], 'user_password' => $data['user_pass'] ] );
			$return['type'] = 'success';
			$return['data'] = $userID;
		}

		echo json_encode( $return );
		wp_die();
	}
}