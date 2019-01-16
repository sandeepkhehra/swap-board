<?php
namespace SwapBoard\Controllers;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

use SwapBoard\Models\UsersModel;
use SwapBoard\Controllers\Admin\InviteMembersController;

class UsersController extends BaseController
{
	public function __construct()
	{
		parent::__construct( new UsersModel );
	}

	public function create()
	{
		$postData = sboardFilterPostData( $_POST );

		if ( empty( $postData['user_login'] ) || empty( $postData['user_pass'] ) ) :
			$return['type'] = 'error';
			$return['msg'] = 'Some fields are missing!';
		else:
			$postData['role'] = 'swap-admin'; /** Make it the admin */
			$postData['user_email'] = $postData['user_login'];

			// if ( $this->validateData( $userData ) && ! $this->dataExists( $userData['email'], 'user_email' ) ) :
			if ( ! $this->dataExists( $postData['user_login'], 'user_login' ) ) :
				$this->model->insert( $postData ); /** @todo work on error handling */

				if ( ! empty( $this->hasErrors() ) ) :
					$return['type'] = 'error';
					$return['msg'] = $this->hasErrors();
				endif;

			else:
				$return['type'] = 'error';
				$return['msg'] = 'The email address already exists!';
			endif;
		endif;

		echo json_encode($return);
	}

	public function check()
	{
		$postData = sboardFilterPostData( $_POST );

		/** @todo defer the ajax call */
		if ( ! $this->dataExists( $postData['user_login'], 'user_login' ) ) :
			$return['type'] = 'success';
		else:
			$return['type'] = 'error';
			$return['msg'] = 'The email address already exists!';
		endif;

		echo json_encode( $return );
	}

	public function createInvitedUser()
	{
		$postData = sboardFilterPostData( $_POST );

		if ( ! $this->dataExists( $postData['invEmail'], 'user_email' ) ) :
			$userData = [
				'user_login' => $postData['invEmail'],
				'user_pass' => $postData['invPassword'],
				'user_email' => $postData['invEmail'],
				'first_name' => $postData['firstName'],
				'last_name' => $postData['lastName'],
				'description' => $postData['invDescription'],
			];
			$userID = wp_insert_user( $userData );

			if ( ! empty( $this->hasErrors() ) ) {
				$return['type'] = 'error';
				$return['msg'] = $this->hasErrors();
			} else {
				update_user_meta( $userID, '__swap-user', $postData );
				( new InviteMembersController )->inviteeResponded( $postData['hash'], 1 );

				$return['type'] = 'success';
			}
		else:
			$return['type'] = 'error';
			$return['msg'] = 'Email address already exists!';
		endif;

		echo json_encode( $return );
	}

	public function userDetails()
	{
		$postData = sboardFilterPostData( $_POST );
		$user = $this->model->getBy( $postData['id'] );

		if ( $user ) :
			$user->meta_data = get_user_meta( $user->ID, '__swap-user', true );
			$return['type'] = 'success';
			$return['data'] = $user;
		else:
			$return['type'] = 'error';
			$return['msg'] = 'Something Happened!';
		endif;

		echo json_encode( $return );
	}
}