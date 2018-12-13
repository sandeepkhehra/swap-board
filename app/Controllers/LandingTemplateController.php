<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\ViewTemplateInterface;

class LandingTemplateController implements ViewTemplateInterface
{
	public $title = 'SwapBoard';

	public $css = [
		'style.css',
	];

	public $js = [
		'app.js',
	];

	public function id()
	{
		return $this->getID();
	}

	public function viewPath()
	{
		return 'landing.index';
	}

	public function getID()
	{
		global $swapBoardConfigs;
		return $swapBoardConfigs->landing;
	}
}
