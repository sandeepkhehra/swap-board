<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

class PlansMenuController extends BaseMenuController
{
    protected $title = 'Plans & Pricings';

    protected $cssAssets = [];

    protected $jsAssets = [];

	public function __construct()
	{
		parent::__construct(['css' => $this->cssAssets, 'js' => $this->jsAssets]);
	}

	public function menuView()
	{
		$this->getView('dash.plans.index');
	}
}
