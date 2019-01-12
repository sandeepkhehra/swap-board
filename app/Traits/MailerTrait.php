<?php
namespace SwapBoard\Traits;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\ViewsErrorException;

trait MailerTrait
{
	public function sendEmail( string $to, string $subject, string $content )
	{
		wp_mail( $to, $subject, $content, $this->getHeaders() );
	}

	private function getHeaders()
	{
		return "From: ". SB_SITE_NAME ." Team <no-reply@". SB_SITE_URL ."> \r\n
			MIME-Version: 1.0\r\n
			Content-Type: text/html; charset=UTF-8\r\n";
	}
}