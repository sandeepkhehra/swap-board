<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\UsersModel;

class UsersMenuController extends BaseMenuController
{
    protected $title = 'All Users';

    protected $cssAssets = [];

    protected $jsAssets = [];

	public function __construct()
	{
		parent::__construct(['css' => $this->cssAssets, 'js' => $this->jsAssets], 'sub', true);
	}

	public function menuView()
	{
		$this->getView('dash.users.index');
	}

	public function model()
	{
		$this->setModel(new UsersModel);
	}

	public function getAllUsers()
	{
		return $this->model->readAll();
	}
}
