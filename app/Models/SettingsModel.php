<?php
namespace SwapBoard\Models;

defined('ABSPATH') or die('Not permitted!');

class SettingsModel extends BaseModel
{
	protected $table = 'options';

	public function getAllData()
	{
		return $this->readAll();
	}

	public function getData()
	{
		# code...
	}

	public function findInOptionsTbl()
	{
		$ll = $this->readOptionsTable('sboard_settings');

		echo "<pre>";
		print_r($ll);
		echo "</pre>";
	}

	public function create($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}