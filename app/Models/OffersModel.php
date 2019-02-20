<?php
namespace SwapBoard\Models;

defined('ABSPATH') or die('Not permitted!');

class OffersModel extends BaseModel
{
	public $table = 'sboard_offers';

	public function getBy( $value, $type = 'id' )
	{
		return $this->read( $value, $type );
	}

	public function getActiveOffers()
	{
		return $this->dbDriver->get_results( "SELECT * FROM {$this->table} WHERE status = 0" );
	}

	public function insert( array $data )
	{
		$this->create( $data );
	}

	public function customQuery( array $data )
	{
		$where = "userID != 0";
		if ( ! empty( $_POST['startTime'] ) )
			$startDateTime = date(  'Y-m-d H:i:s', strtotime( $_POST['date']. ' ' .$_POST['startTime'] ) );

		if ( ! empty( $_POST['endTime'] ) )
			$endDateTime = date( 'Y-m-d H:i:s', strtotime( $_POST['date']. ' ' .$_POST['endTime'] ) );

		if ( ! empty( $data['position'] ) ) $where .= " AND position='$data[position]'";
		if ( ! empty( $data['location'] ) ) $where .= " AND location='$data[location]'";
		if ( ! empty( $startDateTime ) ) $where .= " AND startDatetime BETWEEN '$startDateTime' AND '$endDateTime'";
		if ( ! empty( $data['type'] ) ) $where .= " AND type='$data[type]'";
		$where .= " AND status != 1";

		// echo "SELECT location, position, type, startDatetime, endDatetime FROM {$this->table} WHERE $where";
		return $this->dbDriver->get_results("SELECT id,location,description,position,type,startDatetime,endDatetime FROM {$this->table} WHERE $where");
	}

	public function delete( int $id)
	{
		parent::delete( $id );
	}
}