<?php
namespace SwapBoard\Models;

defined('ABSPATH') or die('Not permitted!');

class UsersModel extends BaseModel
{
	protected $table = 'sboard_users';

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