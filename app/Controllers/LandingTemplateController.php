<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

class LandingTemplateController
{
	public $title = 'SwapBoard';

	public static $css = [
		'bootstrap.min.css',
		'animate.css',
		'style.css',
	];

	public static $js = [
		'bootstrap.min.js',
		'wow.js',
		'app.js',
	];

	public static function id()
	{
		return self::getID();
	}

	public static function viewPath()
	{
		return 'landing.index';
	}

	public static function getID()
	{
		global $swapBoardConfigs;
		return $swapBoardConfigs->landing;
	}
}
