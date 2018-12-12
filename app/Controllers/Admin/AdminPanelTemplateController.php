<?php
namespace SwapBoard\Controllers\Admin;

defined('ABSPATH') or die('Not permitted!');

class AdminPanelTemplateController
{
	public $title = 'User Dashboard';

	public static $css = [
		'style.css',
	];

	public static $js = [
		'app.js',
	];

	public static function id()
	{
		return self::getID();
	}

	public static function viewPath()
	{
		return 'admin.index';
	}

	public static function getID()
	{
		global $swapBoardConfigs;
		return $swapBoardConfigs->userDash;
	}
}
