<?php
namespace SwapBoard\Controllers\Admin\Menus;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Controllers\BaseController;
use SwapBoard\Models\Admin\FindOfferModel;

class FindOfferController extends BaseController
{
	public function __construct()
	{
		parent::setModel(new FindOfferModel);
	}
}
