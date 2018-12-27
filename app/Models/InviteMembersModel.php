<?php
namespace SwapBoard\Models;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

class InviteMembersModel extends BaseModel
{
	protected $table = 'sboard_members';

	public function getBy( $value, $type = 'id' )
	{
		return $this->read( $value, $type );
	}

	public function insert( array $data )
	{
		$this->create( $data );
	}

	public function delete( int $id)
	{
		parent::delete( $id );
	}
}