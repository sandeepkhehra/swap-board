<?php
namespace SwapBoard\Controllers\Admin;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Controllers\BaseController;
use SwapBoard\Models\Admin\FindOfferModel;
use SwapBoard\Helpers\HookrInterface;
use SwapBoard\Traits\ViewsTrait;

class AdminPanelController extends BaseController implements HookrInterface
{
	use ViewsTrait;

	public function __construct()
	{
		parent::setModel(new FindOfferModel);
	}

	public function adminPanelMenus()
	{
		echo "<pre>";
		print_r('here');
		echo "</pre>";
	}

	public function view()
	{
		$this->getView('admin.index');
	}

	public function hook()
	{
		add_action('init', [$this, 'urlRewrite']);
	}

	public function urlRewrite()
	{
		if (isset($_GET['sboardAdmin']) && $_GET['sboardAdmin'] === 'admin') :
			$this->view();
			exit;
		endif;
	}
}
