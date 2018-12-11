<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Controllers\Admin\Menus\FindOfferController;

class SwapBoardMenuController extends BaseMenuController
{
    protected $title = PLUGIN_LONG_NAME;

    protected $cssAssets = [];

    protected $jsAssets = [];

	public function __construct()
	{
		parent::__construct(['css' => $this->cssAssets, 'js' => $this->jsAssets], 'main');
	}

	protected function controller()
	{
		$this->setController(new FindOfferController);
	}

	public function menuView()
	{
		// Don't need a different view here.
	}
}
