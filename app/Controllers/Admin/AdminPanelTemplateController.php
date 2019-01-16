<?php
namespace SwapBoard\Controllers\Admin;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\UsersModel;
use SwapBoard\Controllers\BaseController;
use SwapBoard\Helpers\ViewTemplateInterface;

class AdminPanelTemplateController extends BaseController implements ViewTemplateInterface
{
	public $title = 'User Dashboard';

	public $css = [
		'style.css',
	];

	public $js = [
		'app.js',
	];

	public $model;

	public $controller;

	public function __construct()
	{
		parent::__construct(new UsersModel);
	}

	public function id()
	{
		return $this->getID();
	}

	public function viewPath()
	{
		return 'admin.index';
	}

	public function getID()
	{
		global $swapBoardConfigs;
		return  $swapBoardConfigs->userDash;
	}

	public function authenticate()
	{
		$user = wp_get_current_user();

		if ( $user && $user->ID > 0 ) :
			if ( in_array( 'swap-admin', (array) $user->roles ) || in_array( 'swap-member', (array) $user->roles ) ) :
				return true;
			else:
				return false;
			endif;
		endif;

		return false;
	}
}
