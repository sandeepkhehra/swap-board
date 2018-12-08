<?php
namespace SwapBoard\Helpers;

defined('ABSPATH') or die('Not permitted!');

interface HookrInterface
{
	public function hook();

	public static function talk();
}
