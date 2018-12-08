<?php

defined('ABSPATH') or die('Not permitted!');

require_once __DIR__ . '/../vendor/autoload.php';

use SwapBoard\Controllers\Controller as ServiceProvider;

final class SwapBoard
{
	private static $_instance;

	/**
	 * Check for the instance status.
	 *
	 * @return object SwapBoard Class instance.
	 */
    private static function instance()
    {
        if (null === self::$_instance) :
            self::$_instance = new self;
		endif;

		return self::$_instance;
	}

	/**
	 * Let's make sure we have everything.
	 *
	 * @return object
	 */
	public static function start()
	{
		self::instance();
		ServiceProvider::boot();
	}
}

SwapBoard::start();