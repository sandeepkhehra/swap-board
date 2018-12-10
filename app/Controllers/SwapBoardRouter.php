<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\HookrInterface;

class SwapBoardRouter implements HookrInterface
{
	public function hook()
	{
		add_action('wp_ajax_sboardAJAX', [$this, 'sboardAJAX']);
		add_action('wp_ajax_sboardAJAX', [$this, 'sboardAJAX']);
	}

	public function sboardAJAX()
	{
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
	}
}
