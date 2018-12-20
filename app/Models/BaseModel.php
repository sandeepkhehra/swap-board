<?php
namespace SwapBoard\Models;

defined('ABSPATH') or die('Not permitted!');

abstract class BaseModel
{
	protected $dbDriver;

	public $errorsBag = [];

	public $insertID;

	public function __construct()
	{
		global $wpdb;

		$this->dbDriver = $wpdb;
		$this->table = $this->dbDriver->prefix . $this->table;
	}

	protected function create( array $data )
	{
		$this->dbDriver->insert( $this->table, $data );

		if ( $this->dbDriver->last_error !== '' ) :
			$this->errorsBag[] = $this->dbDriver->last_error;
		else:
			$this->insertID = $this->dbDriver->insert_id;
		endif;
	}

	protected function read($value, string $column = 'id')
	{
		return $this->dbDriver->get_row("SELECT * FROM {$this->table} WHERE {$column}='{$value}' LIMIT 1");
	}

	protected function readMulti($values, string $column = 'id')
	{
		return $this->dbDriver->get_results("SELECT * FROM {$this->table} WHERE {$column} IN ({$values})");
	}

	public function readAll()
	{
		return $this->dbDriver->get_results("SELECT * FROM {$this->table}");
	}

	protected function readOptionsTable( string $key )
	{
		return get_option( $key );
	}

	public function update( $data )
	{
		return $this->dbDriver->update( $this->table, $data, ['id' => $data['id']] );
	}

	protected function delete( $id )
	{
		// action
	}

	public function tblCols()
	{
		$tblCols = $this->dbDriver->get_col("DESC {$this->table}");

		return $tblCols;
	}

	public function with( $table, $colName, $value )
	{
		$tblData = [];
		if ( is_array( $table ) ) :
			foreach ( $table as $tbl ) :
				$tblData[$tbl] = $this->processEagerLoadData( $tbl, $colName, $value );
			endforeach;
		else:

			$tblData[$table] = $this->processEagerLoadData( $table, $colName, $value );

		endif;

		return (object) $tblData;
	}

	public function withOne( $table, $colName, $value )
	{
		$tblData = [];
		if ( is_array( $table ) ) :
			foreach ( $table as $tbl ) :
				$tblData[$tbl] = $this->processSingleEagerLoadData( $tbl, $colName, $value );
			endforeach;
		else:

			$tblData[$table] = $this->processSingleEagerLoadData( $table, $colName, $value );

		endif;

		return (object) $tblData[ $table ];
	}

	private function processEagerLoadData( $table, $colName, $value )
	{
		$tableName = $this->dbDriver->prefix . $table;

		return $this->dbDriver->get_results("SELECT * FROM {$tableName} WHERE {$colName} IN ({$value})");
	}

	private function processSingleEagerLoadData( $table, $colName, $value )
	{
		$tableName = $this->dbDriver->prefix . $table;

		return $this->dbDriver->get_row("SELECT * FROM {$tableName} WHERE {$colName} IN ({$value})");
	}
}