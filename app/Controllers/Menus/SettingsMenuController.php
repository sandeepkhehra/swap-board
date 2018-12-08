<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

class SettingsMenuController extends BaseMenuController
{
    public $title = 'Settings';

    protected $cssAssets = [];

    protected $jsAssets = [];

	public function __construct()
	{
		parent::__construct(['css' => $this->cssAssets, 'js' => $this->jsAssets]);
	}
}
