<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\HookrInterface;
use SwapBoard\Controllers\BaseController;

class AdminMenusController extends BaseController implements HookrInterface
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
	public function prepareMenus()
	{
		foreach ($this->menus as $menu) :
			$this->initMenu(new $menu);
		endforeach;
	}

	/**
	 * Registers menu/submenu for WP Admin Dashboard.
	 *
	 * @param BaseMenuController $menu
	 * @return void
	 */
    public function initMenu(BaseMenuController $menu)
    {
		$menu->menu();
	}

	/**
	 * Hooks registered menus to WP Admin Dashboard.
	 *
	 * @return mixed
	 */
	public function hook()
	{
		add_action('admin_menu', [$this, 'prepareMenus']);
	}

	/**
	 * Don't know yet.
	 *
	 * @return void
	 */
	public static function talk()
	{
		static::listen(new self);
	}
}
