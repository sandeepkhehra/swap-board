<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\BaseModel;

abstract class BaseController
{
	protected $model;

	protected function setModel(BaseModel $model)
	{
		$this->model = $model;
	}
}
