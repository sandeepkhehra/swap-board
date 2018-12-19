<?php
namespace SwapBoard\Controllers\Admin;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\UsersModel;
use SwapBoard\Controllers\UsersController;
// use SwapBoard\Controllers\BaseController;
use SwapBoard\Helpers\ViewTemplateInterface;

class AdminPanelTemplateController implements ViewTemplateInterface
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
		$this->model = new UsersModel;
		// $this->controller = new UsersController;
		// parent::__construct(new UsersModel);
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
		global $user_ID;

		if ( 0 == $user_ID && isset( $_GET['viewMode'] )
			&& $_GET['viewMode'] == 'admin' ) {

			$currentUser = wp_get_current_user();
			$caps = $currentUser->caps;

			if ( $currentUser->ID > 0 && array_key_exists( 'administrator', $caps ) ) return true;

		} else {
			// $checkUser = $this->dataExists( $swapUser->id );

			// if ( ! $checkUser ) {
			// 	unset( $_SESSION[ SB_SESS_KEY ]['user'] );
			// 	return false;
			// }

			return true;
		}

		return false;
	}
}
