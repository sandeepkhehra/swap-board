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
		$userdata = [
			'user_login'  =>  'login_name',
			'user_pass'   =>  NULL
		];

		$userID = wp_insert_user( $userdata );
	}
}