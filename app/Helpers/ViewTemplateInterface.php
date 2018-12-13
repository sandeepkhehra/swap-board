<?php
namespace SwapBoard\Helpers;

defined('ABSPATH') or die('Not permitted!');

interface ViewTemplateInterface
{
	public function id();

	public function getID();

	public function viewPath();
}
