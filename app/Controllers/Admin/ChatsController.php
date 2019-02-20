<?php
namespace SwapBoard\Controllers\Admin;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

use SwapBoard\Models\ChatsModel;
use SwapBoard\Controllers\BaseController;
use SwapBoard\Controllers\UsersController;

class ChatsController extends BaseController
{
	public function __construct()
	{
		parent::__construct( new ChatsModel );
	}

	public function chat()
	{
		$postData = sboardFilterPostData( $_POST );
		$postData['clientID'] = $postData['id'];
		unset( $postData['id'] );

		/** We need to check if the user is trying to create a new chat with the old client
		 * So, check if the current user ID AND the client ID doesn't exist already in same row.
		 */
		if ( ! $this->dataExists( $postData['clientID'], 'clientID' ) ) $this->model->insert( $postData );

		if ( ! empty( $this->hasErrors() ) ) :
			$return['type'] = 'error';
			$return['msg'] = $this->hasErrors();
		else:
			$return['type'] = 'success';
			// $return['html'] = $this->bubbleHTML( $postData['content'] );
		endif;

		echo json_encode( $return );
	}

	public function viewChat()
	{
		$postData = sboardFilterPostData( $_POST );
		$clientData = get_userdata( $postData['clientID'] );
		$chatData = $this->model->getAllFrom( 'sboard_chat_messages', $postData['chatID'], 'chatID' );

		if ( ! $clientData ) :
			$return['type'] = 'error';
			$return['msg'] = 'User no longer exist!';

		else :
			$return['type'] = 'success';
			$return['html'] = $this->showChatHTML( $clientData, $chatData );
		endif;

		echo json_encode($return);
	}

	public function unreadChats( $chatID, $userID )
	{
		$tblName = $this->model->dbDriver->prefix . 'sboard_chat_messages';
		$count = $this->model->dbDriver->query("SELECT id FROM $tblName WHERE chatID = $chatID AND userID = $userID AND status = 0");

		return $count;
	}

	public function allUnreadChats( $chatIDs )
	{
		global $user_ID;

		$tblName = $this->model->dbDriver->prefix . 'sboard_chat_messages';
		// echo "SELECT id,userID,content,ts FROM $tblName WHERE chatID IN ($chatIDs) AND userID <> $user_ID AND status = 0";
		$chatsData = $this->model->dbDriver->get_results("SELECT id,userID,content,ts FROM $tblName WHERE chatID IN ($chatIDs) AND userID <> $user_ID AND status = 0");

		return $chatsData;
	}

	public function fetchChats()
	{
		$postData = sboardFilterPostData( $_POST );
		$chats = $this->model->getAllBy( $postData['userID'], 'userID' );

		if ( ! $chats ) $chats = $this->model->getAllBy( $postData['userID'], 'clientID' );

		if ( $chats ) :
			$chatIDs = [];
			foreach ( $chats as $chat ) :
				$chatIDs[] = $chat->id;
			endforeach;

			$chatIDs = implode( ',', $chatIDs );

			$chatsData = $this->allUnreadChats( $chatIDs );
			$chatsCount = count( $chatsData );

			if ( $chatsCount > $postData['cacheCount'] ) :
				$return['type'] = 'success';
				$return['hasChats'] = true;
				$return['chats'] = $chatsData;
			endif;
		else:
			$chatsCount = 0;
		endif;

		$return['cacheCount'] = $chatsCount;

		echo json_encode( $return );
	}

	private function showChatHTML( $clientData, $chatData )
	{
		global $user_ID;

		$userController = new UsersController;

		$html['header'] = $clientData->display_name;
		$html['body'] = '';

		if ( $chatData ) :
			foreach ( $chatData as $chat ) :
				$avatar = $userController->getUserMeta( $chat->userID )['avatar'];

				$html['body'] .= '<div class="chat-bbl'. ($chat->userID == $user_ID ? " client-chat" : "") .'"  data-chat-content-id="'. $chat->id .'">
					<div class="img-chat"><img src="'. $avatar .'" alt="user"></div>
					<div class="bubble '. ($chat->userID == $user_ID ? "me" : "you") .'">'. $chat->content .'</div>
				</div>';
			endforeach;
		else:
			$html['body'] .= '<p>Start a chat with ' . $clientData->display_name . '</p>';
		endif;

		return $html;
	}
}