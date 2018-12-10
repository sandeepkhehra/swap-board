<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\HookrInterface;
use SwapBoard\Controllers\BaseController;

class DashMenusController extends BaseController implements HookrInterface
{
	protected $menus = [
		SwapBoardMenuController::class,
		SettingsMenuController::class,
	];

	/**
	 * Iterates through menu/submenu classes and passes it on for
	 * initialization.
	 *
	 * @return void
	 */
	public function initMenus()
	{
		foreach ($this->menus as $menu) :
			if (new $menu instanceof BaseMenuController) (new $menu)->menu();
		endforeach;
	}

	// public function initMenusAssets()
	// {
	// 	foreach ($this->menus as $menu) :
	// 		if (new $menu instanceof BaseMenuController && method_exists($menu, 'menuAssets')) {
	// 			(new $menu)->menuAssets()->enqueue();
	// 		}
	// 	endforeach;
	// }

	/**
	 * Hooks registered menus to WP Admin Dashboard.
	 *
	 * @return mixed
	 */
	public function hook()
	{
		add_action('admin_menu', [$this, 'initMenus']);
	}
}
