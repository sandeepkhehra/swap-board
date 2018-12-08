<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\SwapBoardConstants;
use SwapBoard\Controllers\BaseController;
use SwapBoard\Traits\MenuTrait;


/**
 * Base functions for WP Admin Dashboard Menu.
 *
 * @package SwapBoard
 * @author Adictonator <adityabhaskarsharma@gmail.com>
 * @since 1.0
 * @abstract
 */
abstract class BaseMenuController
{
	use MenuTrait;

	/**
	 * Access level to the plugin.
	 *
	 * @var string
	 */
	protected $accessLevel = 'administrator';

	/**
	 * Controller for the current class.
	 *
	 * @var object BaseController
	 */
	public $controller;

	/**
	 * Slug for the menu/submenu.
	 *
	 * @var string
	 */
	public $slug = SwapBoardConstants::PLUGIN_SLUG;

	/**
	 * Type of menu. Can be "main" or "sub".
	 *
	 * @var string
	 */
	protected $menuType;

	/**
	 * Tells weather to use main menu's slug as submenu's slug.
	 *
	 * @var boolean
	 */
	protected $useMainMenu;

	/**
	 * CSS assets array for the menu/submenu.
	 *
	 * @var array
	 */
	protected $cssAssets = [];

	/**
	 * JS assets array for menu/submenu.
	 *
	 * @var array
	 */
    protected $jsAssets = [];

	/**
	 *
	 * @param array $assets
	 * @param string $title
	 * @param string $menuType
	 * @param boolean $useMainMenu
	 */
	public function __construct(array $assets, string $menuType = 'sub', bool $useMainMenu = false)
	{
		$this->menuType = $menuType;
		$this->useMainMenu = $useMainMenu;
		$this->slug = $this->menuType == 'main' ? $this->slug : (
			$this->useMainMenu ? $this->slug : $this->menuSlug($this->title)
		);
		// $this->slug = $this->menuType == 'main' ? $this->slug : $this->menuSlug($this->title);
		$this->cssAssets = $assets['css'];
		$this->jsAssets = $assets['js'];

		method_exists($this, 'controller') ? $this->controller() : false;
	}

	/**
	 * Generates the view for WP menu/submenu.
	 *
	 * @param object $menuInstance
	 * @return void
	 */
    protected function menuView($menuInstance)
    {
        MenuViewGeneratorController::setView($menuInstance)->getAssets($this->menuAssets());
    }

	/**
	 * Gathers menu related assets.
	 *
	 * @return void
	 */
    protected function menuAssets()
    {
        return [
            'css' => $this->cssAssets,
            'js' => $this->jsAssets
        ];
	}

	/**
	 * Initializes WP menu page.
	 *
	 * @return void
	 */
	protected function mainMenu()
	{
		add_menu_page(
			'',
			SwapBoardConstants::PLUGIN_LONG_NAME,
			$this->accessLevel,
			$this->slug,
			[$this, 'menuFunction'],
			'none'
		);
	}

	/**
	 * Initializes WP Submenu page.
	 *
	 * @return void
	 */
	protected function subMenu()
	{
		add_submenu_page(
			SwapBoardConstants::PLUGIN_SLUG,
			$this->menuTitle($this->title),
			$this->title,
			$this->accessLevel,
			$this->slug,
			[$this, 'menuFunction']
		);
	}

	/**
	 * Set the controller for current class.
	 *
	 * @param BaseController $controller
	 * @return void
	 */
	protected function setController(BaseController $controller)
	{
		$this->controller = $controller;
	}

	/**
	 * Prepare admin menu.
	 *
	 * @return void
	 */
	public function menu()
    {
		if ($this->menuType === 'main') :
			$this->mainMenu();
		else:
			$this->subMenu();
		endif;
	}

	/**
	 * Triggers function to generate menu view.
	 *
	 * @return void
	 */
    public function menuFunction()
    {
		$this->menuView($this);
    }
}