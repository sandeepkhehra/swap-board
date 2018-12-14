<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\HookrInterface;

class SwapBoardRouter implements HookrInterface
{
	public function hook()
	{
		add_action('wp_ajax_sboardAJAX', [$this, 'sboardAJAX']);
		add_action('wp_ajax_nopriv_sboardAJAX', [$this, 'sboardAJAX']);
		add_action('admin_post_sboardPOST', [$this, 'sboardPOST']);
		// add_action('init', [$this, 'urlRewrite']);
	}

	public function sboardAJAX()
	{
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

		wp_die();
	}

	public function sboardPOST()
	{
		$controller = str_replace(':', '\\', $_POST['sbController']);
		$method = $_POST['sbAction'];

		if (class_exists($controller)):
			$controllerClass = new $controller;

			if (method_exists($controllerClass, $method)) {
				$controllerClass->$method();
			}

		endif;
	}

	// public function urlRewrite()
	// {
	// 	switch ($_GET) :
	// 		case isset($_GET['new']) && $_GET['new'] == 'user' :
	// 		break;

	// 		case isset($_GET['sboardAdmin']) && $_GET['sboardAdmin'] == $_GET['admin'] :
	// 		break;

	// 		default:
	// 	endswitch;
	// }
}
