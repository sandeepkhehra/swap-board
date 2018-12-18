<?php
namespace SwapBoard\Models;

defined('ABSPATH') or die('Not permitted!');

class CompaniesModel extends BaseModel
{
	protected $table = 'sboard_companies';

	public function getBy( $value, $column = 'id' )
	{
		return $this->read( $value, $column );
	}

	public function insert( $data )
	{
		$this->create( $data );

		if ( $this->dbDriver->last_error !== '' ) :
			$this->errorsBag[] = $this->dbDriver->last_error;
		else:
			$this->insertID = $this->dbDriver->insert_id;
		endif;
	}
}