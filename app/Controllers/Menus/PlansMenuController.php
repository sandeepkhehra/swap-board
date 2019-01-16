<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\PlansModel;

class PlansMenuController extends BaseMenuController
{
    protected $title = 'Plans & Pricings';

    protected $cssAssets = [];

    protected $jsAssets = [];

	public function __construct()
	{
		parent::__construct(['css' => $this->cssAssets, 'js' => $this->jsAssets], 'sub', true);
	}

	public function menuView()
	{
		$this->getView('dash.plans.index');
	}

	public function model()
	{
		$this->setModel(new PlansModel);
	}

	public function all()
	{
		return $this->model->readAll();
	}

	public function create()
	{
		$postData = sboardFilterPostData( $_POST );

		$this->model->insert( $postData );

		return sboardRedirect();
	}
}
