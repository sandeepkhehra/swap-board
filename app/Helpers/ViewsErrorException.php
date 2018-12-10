<?php
namespace SwapBoard\Helpers;

class ViewsErrorException extends \Exception
{
	public function msg()
	{
		return 'The view at <strong>' . $this->getMessage() . '</strong> doesn\'t exist!';
	}
}
