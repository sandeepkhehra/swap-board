<?php
namespace SwapBoard\Models;

defined('ABSPATH') or die('Not permitted!');

class EmailTemplatesModel extends BaseModel
{
	public $table = 'sboard_email_templates';

	public function getBy( $value, $type = 'id' )
	{
		return $this->read( $value, $type );
	}

	public function insert( array $data )
	{
		if ( isset( $data['tempID'] ) && ! $this->getBy( $data['tempID'], 'tempID' ) ) :
			$this->create( $data );
		else:
			$data['subject'] = nl2br( esc_html( stripslashes ($data['subject'] ) ) );
			$data['content'] = nl2br( esc_html( $data['content'] ) );
			$this->update( $data );
		endif;
	}
}