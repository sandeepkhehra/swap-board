<?php
namespace SwapBoard\Controllers\Admin;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

use SwapBoard\Models\ChatMessagesModel;
use SwapBoard\Controllers\BaseController;

class ChatMessagesController extends BaseController
{
	public function __construct()
	{
		parent::__construct( new ChatMessagesModel );
	}

	public function sendChat()
	{
		$postData = sboardFilterPostData( $_POST );

		$this->model->insert( $postData );

		if ( ! empty( $this->hasErrors() ) ) :
			$return['type'] = 'error';
			$return['msg'] = $this->hasErrors();
		else:
			$return['type'] = 'success';
			$return['html'] = $this->bubbleHTML( $postData['content'] );
		endif;

		echo json_encode( $return );
	}

	public function readChat()
	{
		$postData = sboardFilterPostData( $_POST );

		$this->model->updateChatStatus( $postData );

		$return['type'] = 'success';

		echo json_encode( $return );
	}

	private function bubbleHTML( $chatContent )
	{
		$html = '<div class="chat-bbl client-chat"><div class="img-chat"><img src="#" alt=""></div><div class="bubble me">'. $chatContent .'</div></div>';

		return $html;
	}
}