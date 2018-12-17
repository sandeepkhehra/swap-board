<?php
namespace SwapBoard\Models;

defined('ABSPATH') or die('Not permitted!');

abstract class BaseModel
{
	protected $dbDriver;

	public $errorsBag = [];

	public function __construct()
	{
		global $wpdb;

		$this->dbDriver = $wpdb;
		$this->table = $this->dbDriver->prefix . $this->table;
	}

	protected function create( $data )
	{
		return $this->dbDriver->insert( $this->table, $data );
	}

	protected function read($value, string $column = 'id')
	{
		return $this->dbDriver->get_row("SELECT * FROM {$this->table} WHERE {$column}='{$value}' LIMIT 1");
	}

	protected function readMulti($values, string $column = 'id')
	{
		return $this->dbDriver->get_results("SELECT * FROM {$this->table} WHERE {$column} IN ({$id})");
	}

	protected function readAll()
	{
		return $this->dbDriver->get_results("SELECT * FROM {$this->table}");
	}

	protected function readOptionsTable(string $key)
	{
		return get_option($key);
	}

	protected function update($id)
	{
		echo "<pre>";
		print_r($id);
		echo "</pre>";
	}
	protected function delete($id)
	{
		echo "<pre>";
		print_r($id);
		echo "</pre>";
	}

	public function tblCols()
	{
		$tblCols = $this->dbDriver->get_col("DESC {$this->table}");

		return $tblCols;
	}
}