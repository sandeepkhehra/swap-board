<?php
namespace SwapBoard\Controllers\Admin;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

use SwapBoard\Models\InviteMembersModel;
use SwapBoard\Controllers\BaseController;

class InviteMembersController extends BaseController
{
	public function __construct()
	{
		parent::__construct( new InviteMembersModel );
	}

	public function create()
	{
		$postData = sboardFilterPostData( $_POST );

		if ( empty( $postData['email'] ) || count( $postData['email'] ) <= 0 ) return;

		foreach ( $postData['email'] as $index => $email ) :
			if ( ! $this->dataExists( $email, 'email' ) ) :
				$postData['email'] = $email;
				$postData['firstName'] = $postData['firstName'][ $index ];
				$postData['lastName'] = $postData['lastName'][ $index ];

				$this->sendInvite( $email );
				$this->model->insert( $postData );
			endif;
		endforeach;
	}

	public function sendInvite( string $email )
	{
		wp_mail( $email, 'subject', 'message', $headers );
	}

	public function delete()
	{
		$postData = sboardFilterPostData( $_POST );

		if ( ! $this->dataExists( $postData['id'] ) ) return;

		$this->model->delete( $postData['id'] );

		if ( ! empty( $this->hasErrors() ) ) {
			$return['type'] = 'error';
			$return['msg'] = $this->hasErrors();
		} else {
			$return['type'] = 'success';
			$return['msg'] = 'Member deleted successfully!';
		}

		echo json_encode( $return );
	}

	public function resendInvite()
	{
		$postData = sboardFilterPostData( $_POST );
		$memberData = $this->dataExists( $postData['id'] );

		if ( ! $memberData ) return;

		$this->sendInvite( $memberData->email );
	}
}
