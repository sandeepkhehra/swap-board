<?php
namespace SwapBoard\Models;

defined('ABSPATH') or die('Not permitted!');

abstract class BaseModel
{
	protected $dbDriver;

	public function __construct()
	{
		global $wpdb;

		$this->dbDriver = $wpdb;
		$this->table = $this->dbDriver->prefix . $this->table;
	}

	protected function create($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	protected function read($id)
	{
		echo "<pre>";
		print_r($id);
		echo "</pre>";
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
}