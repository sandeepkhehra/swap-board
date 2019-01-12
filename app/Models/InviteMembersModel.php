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

	public function getByFrom( $tblName, $value, $type = 'id' )
	{
		return $this->readFrom( $tblName, $value, $type );
	}

	public function insert( array $data )
	{
		$this->create( $data );
	}

	public function delete( int $id)
	{
		parent::delete( $id );
	}

	public function setInviteeStatus( string $hash, int $status )
	{
		return $this->dbDriver->query( "UPDATE {$this->table} SET isMember = $status WHERE hash='$hash'" );
	}
}