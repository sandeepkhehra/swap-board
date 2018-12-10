<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Controllers\SettingsController;
use SwapBoard\Models\SettingsModel;

class SettingsMenuController extends BaseMenuController
{
    protected $title = 'Settings';

    protected $cssAssets = [];

    protected $jsAssets = ['app.js'];

	public function __construct()
	{
		parent::__construct(['css' => $this->cssAssets, 'js' => $this->jsAssets], 'sub', true);
	}

	public function menuView()
	{
		$this->getView('dash.settings.index');
	}

	// public function menuAssets() {
	// 	$this->getAssets('dash.settings.assets');

	// 	return $this;
	// }

	public function model()
	{
		$this->setModel(new SettingsModel);
	}

	// public function getAllData()
	// {
	// 	$data = $this->model->getAllData();

	// 	echo "<pre>";
	// 	print_r($data);
	// 	echo "</pre>";
	// }

	public function save()
	{
		$data = $_POST;

		$this->model->create($data);
	}
}
