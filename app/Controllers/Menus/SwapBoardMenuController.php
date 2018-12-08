<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Controllers\Admin\FindOfferController;

class SwapBoardMenuController extends BaseMenuController
{
    public $title = '';

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
}
