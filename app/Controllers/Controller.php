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
			Menus\AdminMenusController::class,
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
			if (class_exists($provider) && new $provider instanceof HookrInterface) :
				$provider::talk();
			endif;
		endforeach;
	}
}
