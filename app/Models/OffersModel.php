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

	public function insert( array $data )
	{
		$this->create( $data );
	}

	public function customQuery( array $data )
	{
		$where = "companyID='$data[companyID]'";
		$date = $data['datetime']['date'];
		$startTime = $data['datetime']['time']['start'];
		$endTime = $data['datetime']['time']['end'];

		if ( ! empty( $data['position'] ) ) $where .= " AND position='$data[position]'";
		if ( ! empty( $data['location'] ) ) $where .= " AND location='$data[location]'";
		if ( ! empty( $date ) ) $where .= " AND datetime REGEXP '.*\"date\";s:[0-9]+:\".*$date.*\".*'";
		if ( ! empty( $startTime ) ) $where .= " AND datetime REGEXP '.*\"start\";s:[0-9]+:\".*$startTime.*\".*'";
		if ( ! empty( $endTime ) ) $where .= " AND datetime REGEXP '.*\"end\";s:[0-9]+:\".*$endTime.*\".*'";

		$where .= " AND type='$data[type]'";

		return $this->dbDriver->get_results("SELECT location, position, type, datetime FROM {$this->table} WHERE $where");
	}

	public function delete( int $id)
	{
		parent::delete( $id );
	}
}