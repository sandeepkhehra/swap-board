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
}