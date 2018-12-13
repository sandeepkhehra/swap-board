<?php
namespace SwapBoard\Controllers\Admin;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\ViewTemplateInterface;

class AdminPanelTemplateController implements ViewTemplateInterface
{
	public $title = 'User Dashboard';

	public $css = [
		'style.css',
	];

	public $js = [
		'app.js',
	];

	public function id()
	{
		return $this->getID();
	}

	public function viewPath()
	{
		return 'admin.index';
	}

	public function getID()
	{
		global $swapBoardConfigs;
		return  $swapBoardConfigs->userDash;
	}
}
