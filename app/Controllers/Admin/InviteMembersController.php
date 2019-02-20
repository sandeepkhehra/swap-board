<?php
namespace SwapBoard\Controllers\Admin;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

use SwapBoard\Models\InviteMembersModel;
use SwapBoard\Controllers\BaseController;
use SwapBoard\Controllers\Menus\EmailTemplatesMenuController;

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
			if ( ! $this->dataExists( $email, 'email' ) && ! $this->dataExistsIn( 'users', $email, 'user_email' ) ) :
				$postData['email'] = $email;
				$postData['firstName'] = $postData['firstName'][ $index ];
				$postData['lastName'] = $postData['lastName'][ $index ];
				$getHash = $this->sendInvite( $email );

				if ( $getHash ) :
					$postData['hash'] = $getHash;
					$this->model->insert( $postData );
				endif;
			else:
				$return['type'] = 'error';
				$return['msg'] = 'You\'ve already sent the invite to ' . $email;

				echo json_encode( $return );
				wp_die();
			endif;
		endforeach;

		$return['type'] = 'success';
		$return['msg'] = 'Invites sent successfully!';

		echo json_encode( $return );
		wp_die();
	}

	public function sendInvite( string $email )
	{
		$emailTempController = new EmailTemplatesMenuController;
		$emailContent = $emailTempController->getTemplateData( 'inviteUser' );

		/** @todo work on exception case. */
		if ( $emailContent && ! empty( $emailContent->content ) ) :
			$inviteData = $this->getInviteLink( $email );
			$inviteLink = $inviteData->link;
			$hasInviteTag = preg_match( '/(\%invite_link\%)/', $emailContent->content );

			if ( ! $hasInviteTag ) $inviteLink = 'NO LINK WAS PROVIDED. PLEASE CONTACT ADMIN';

			$emailContent->content = str_replace( '%invite_link%', $inviteLink, $emailContent->content );

			if ( $this->sendEmail( $email, $emailContent->subject, $emailContent->content ) ) :

				return is_object( $inviteData ) ? $inviteData->hash : false;
			endif;

			return;
		else:
			$return['type'] = 'error';
			$return['msg'] = 'No email template has been set!';

			echo json_encode( $return );
			wp_die();
		endif;

		return false;
	}

	private function getInviteLink( string $email )
	{
		global $user_ID;

		if ( 0 !== $user_ID ) :
			$companyData = $this->model->withOne( 'sboard_companies', 'userID', $user_ID );

			return $this->generateInviteLink( $companyData->id, $email );
		endif;

		return; // link based on company ID or maybe the one who invited
	}

	private function generateInviteLink( int $companyID, string $userEmail )
	{
		$hash = md5( $companyID . $userEmail );
		$link = "http://localhost/swap/sample-page/";
		$link = $link . "?invite={$hash}";

		/** @todo maybe make `hash` column unique in db schema */
		return ( object ) [  /*  | */
			'hash' => $hash,/*<--| */
			'link' => $link,
		];
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

	public function inviteeResponded( string $hash, int $status, int $userID )
	{
		return $this->model->setInviteeStatus( $hash, $status, $userID );
	}
}
