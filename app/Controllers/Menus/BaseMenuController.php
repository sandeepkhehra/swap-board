<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\BaseModel;
use SwapBoard\Traits\ViewsTrait;

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
	use ViewsTrait;

	/**
	 * Access level to the plugin.
	 *
	 * @var string
	 */
	protected $accessLevel = 'administrator';

	/**
	 * Model of the current menu.
	 *
	 * @var object BaseModel
	 */
	protected $model;

	/**
	 * Slug for the menu/submenu.
	 *
	 * @var string
	 */
	public $slug = PLUGIN_SLUG;

	/**
	 * Type of menu. Can be "main" or "sub".
	 *
	 * @var string
	 */
	protected $menuType;

	/**
	 * Tells whether to use main menu's slug as submenu's slug.
	 *
	 * @var boolean
	 */
	protected $useMainMenu;

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
			$this->useMainMenu ? $this->slug : sboardMenuSlug($this->title)
		);
		$this->cssAssets = $assets['css'];
		$this->jsAssets = $assets['js'];

		method_exists($this, 'model') ? $this->model() : false;
	}

	/**
	 * Generates the view for WP menu/submenu.
	 *
	 * @param object $menuInstance
	 * @return void
	 */
	abstract protected function menuView();

	/**
	 * Initializes WP menu page.
	 *
	 * @return void
	 */
	protected function mainMenu()
	{
		add_menu_page(
			$this->title,
			PLUGIN_LONG_NAME,
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
			PLUGIN_SLUG,
			sboardMenuTitle($this->title),
			$this->title,
			$this->accessLevel,
			$this->slug,
			[$this, 'menuFunction']
		);
	}

	/**
	 * Set the model for current menu.
	 *
	 * @param BaseModel $model
	 * @return void
	 */
	protected function setModel(BaseModel $model)
	{
		$this->model = $model;
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