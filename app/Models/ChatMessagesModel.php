<?php
namespace SwapBoard\Models;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

class ChatMessagesModel extends BaseModel
{
	protected $table = 'sboard_chat_messages';

	public function getBy( $value, $type = 'id' )
	{
		return $this->read( $value, $type );
	}

	public function getByFrom( $tblName, $value, $type = 'id' )
	{
		return $this->readFrom( $tblName, $value, $type );
	}

	public function insert( $data )
	{
		$this->create( $data );
	}

	public function updateChatStatus( $data )
	{
		return $this->dbDriver->query("UPDATE $this->table SET status = 1 WHERE chatID = $data[chatID] AND userID = $data[userID]");
	}
}