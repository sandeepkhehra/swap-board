<?php
namespace SwapBoard\Models;

defined('ABSPATH') or die('Not permitted!');

class UsersModel extends BaseModel
{
	protected $table = 'sboard_users';

	public function getBy( $value, $type = 'id' )
	{
		return $this->read( $value, $type );
	}

	public function insert( $data )
	{
		return $this->create( $data );
	}
}