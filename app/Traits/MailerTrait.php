<?php
namespace SwapBoard\Traits;

defined('ABSPATH') or die('Not permitted!');

trait MailerTrait
{
	public function sendEmail( string $to, string $subject, string $content )
	{
		return wp_mail( $to, $subject, $content, $this->getHeaders() );
	}

	private function getHeaders()
	{
		return "Content-Type: text/html; charset=UTF-8\r\n
				From: SwapBoard Team <no-reply@swapboard.com> \r\n
				MIME-Version: 1.0\r\n";
	}
}