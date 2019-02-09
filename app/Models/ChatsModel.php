<?php
namespace SwapBoard\Models;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

class ChatsModel extends BaseModel
{
	protected $table = 'sboard_chats';

	public function getBy( $value, $type = 'id' )
	{
		return $this->read( $value, $type );
	}

	public function getAllBy( $values, $type = 'id' )
	{
		return $this->readMulti( $values, $type );
	}

	public function getByFrom( $tblName, $value, $type = 'id' )
	{
		return $this->readFrom( $tblName, $value, $type );
	}

	public function getAllFrom( $tblName, $value, $type = 'id' )
	{
		return $this->readFromMulti( $tblName, $value, $type );
	}

	public function insert( $data )
	{
		$this->create( $data );
	}
}