<?php
namespace SwapBoard\Models;

defined('ABSPATH') or die('Not permitted!');

class PlansModel extends BaseModel
{
	public $table = 'sboard_plans';

	public function getBy( $value, $type = 'id' )
	{
		return $this->read( $value, $type );
	}

	public function insert( array $data )
	{
		return $this->create( $data );
	}
}