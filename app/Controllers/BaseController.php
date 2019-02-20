<?php
namespace SwapBoard\Controllers;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

use SwapBoard\Models\BaseModel;
use SwapBoard\Traits\MailerTrait;
use SwapBoard\Traits\NotificationTrait;

abstract class BaseController
{
	use NotificationTrait, MailerTrait;

	protected $model;

	public function __construct( BaseModel $model )
	{
		$this->model = $model;
	}

	public function dataExists( $value, $column = 'id' )
	{
		return $this->model->getBy( $value, $column );
	}

	public function dataExistsIn( $tblName, $value, $column = 'id' )
	{
		return $this->model->getByFrom( $tblName, $value, $column );
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

	// public function eagerLoadData( array $tableNames )
	// {
	// 	return $this->model->eagerLoad( $tableNames );
	// }
}