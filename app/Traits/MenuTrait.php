<?php
namespace SwapBoard\Traits;

use SwapBoard\Helpers\SwapBoardConstants;

trait MenuTrait
{
	public function prepareString(string $string)
	{
		return str_replace([' ', '_'], '-', strtolower($string));
	}

	public function menuSlug(string $string)
	{
		return SwapBoardConstants::PLUGIN_SLUG . '-' . $this->prepareString($string);
	}

	public function menuTitle(string $title)
	{
		return SwapBoardConstants::PLUGIN_PAGE_TITLE . $title;
	}
}