<?php
namespace SwapBoard\Controllers;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

use SwapBoard\Models\BaseModel;

abstract class BaseController
{
	protected $model;

	public function __construct( BaseModel $model )
	{
		$this->model = $model;
	}

	public function dataExists( $value, $column = 'id' )
	{
		return $this->model->getBy( $value, $column );
	}

	protected function hasErrors()
	{
		return $this->model->errorsBag;
	}

	protected function getInsertID()
	{
		return $this->model->insertID;
	}

	protected function validateData( $data )
	{
		$tblCols = $this->model->tblCols();

		/** @todo only loop the columns that are NOT NULL or something */
		if ( ! empty( $tblCols ) ) :
			foreach ( $tblCols as $col ) :

				if ( $col !== 'id' && $col !== 'createdAt' && $col !== 'modifiedAt' ) :

					if ( ! isset( $data[ $col ] ) || empty( $data[ $col ] ) ) return false;

				endif;
			endforeach;
		endif;

		return true;
	}

	public function eagerLoadData()
	{
		return $this->model->eagerLoad();
	}
}