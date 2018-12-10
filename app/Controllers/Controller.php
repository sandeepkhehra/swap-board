<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\HookrInterface;

class Controller
{
	static $providers;

	public static function register()
	{
		self::$providers = [
			SwapBoardInstaller::class,
			SwapBoardRouter::class,
			Menus\DashMenusController::class,
			Admin\AdminPanelController::class,
		];

		return new self;
	}

	public static function boot()
	{
		self::register()->trigger();
	}

	public function trigger()
	{
		foreach (self::$providers as $provider) :
			if (class_exists($provider) && new $provider instanceof HookrInterface) (new $provider)->hook();
		endforeach;
	}
}
