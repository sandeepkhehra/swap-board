<?php
namespace SwapBoard\Models;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

class AppliedOffersModel extends BaseModel
{
	protected $table = 'sboard_applied_offers';

	public function getBy( $value, $type = 'id' )
	{
		return $this->read( $value, $type );
	}

	public function getAllBy( $offerIDs )
	{
		return $this->readMulti( $offerIDs, 'offerID' );
	}

	public function getOpenOffers( $offerID )
	{
		return $this->dbDriver->get_results( "SELECT * FROM {$this->table} WHERE offerID='{$offerID}' AND status=0" );
	}

	public function getUsersOffers( $userID )
	{
		return $this->dbDriver->get_results( "SELECT * FROM {$this->table} WHERE userID='{$userID}'" );
	}

	public function insert( $data )
	{
		$this->create( $data );
	}

	public function getAppliedOffers( $offerID )
	{
		return $this->readFromMulti( 'sboard_offers', $offerID );
	}

	public function acceptOffer( array $data )
	{
		return $this->update( $data );
	}

	public function declineOffer( array $data )
	{
		return $this->update( $data );
	}

	public function offerStatus( int $offerID )
	{
		return $this->dbDriver->get_results( "SELECT * FROM {$this->table} WHERE offerID='{$offerID}' AND status = 1" );
	}
}