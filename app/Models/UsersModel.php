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
			$swapUserData = [
				'firstName' => $data['first_name'],
				'lastName' => $data['last_name'],
				'userEmail' => $data['user_email'],
				'phone' => $userTel,
				'employeeID' => '',
				'position' => null,
				'location' => null,
				'description' => null,
			];

			update_user_meta( $userID, '__swap-user', $swapUserData );
			$return['type'] = 'success';
			$return['data'] = $userID;
		}

		echo json_encode( $return );
		wp_die();
	}

	public function getByFrom( $tblName, $value, $type = 'id' )
	{
		return $this->readFrom( $tblName, $value, $type );
	}
}