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
		global $swapUser;

		if ( null === $swapUser && isset( $_GET['viewMode'] )
			&& $_GET['viewMode'] == 'admin' ) {

			$currentUser = wp_get_current_user();
			$caps = $currentUser->caps;

			if ( $currentUser->ID > 0 && array_key_exists( 'administrator', $caps ) ) return true;

		} else {
			$checkUser = $this->dataExists( $swapUser->id );

			if ( ! $checkUser ) {
				unset( $_SESSION[ SB_SESS_KEY ]['user'] );
				return false;
			}

			return true;
		}

		return false;
	}
}
