<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

class AdminPanelMenus
{
	public $menus = [
		Menus\FindOfferController::class,
	];

	public function initMenus()
	{
		foreach ($this->menus as $menu) :

			echo "<pre>";
			print_r($menu);
			echo "</pre>";

			// $menusData[$sboardMenuSlug] = [
			// 	'title' => $menu,
			// 	'controller' => $menuController,
			// ];
		endforeach;
	}
}
