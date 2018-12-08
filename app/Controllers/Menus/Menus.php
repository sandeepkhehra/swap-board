<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

/**
 *
 */
abstract class Menus
{
	protected $menus = [
		SwapBoardMenuController::class,
		// SwapBoardMembersMenuController::class,
		// SwapBoardEmailTemplatesMenuController::class,
		// SwapBoardSettingsMenuController::class,
	];
}