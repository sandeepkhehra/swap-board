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
		$userDataArr = [];
		$userData = $userDataArr['rest'];
		$userMeta = $userDataArr['meta'];
		$userData['password'] = password_hash( $userDataArr['rest']['password'], PASSWORD_BCRYPT );
		$userData['fullName'] = $userDataArr['meta']['firstName'] .' '. $userDataArr['meta']['lastName'];
		$userData['position'] = $userData['location'] = 'empty'; /** @todo fix this shit */

		if ( $this->validateData( $userData ) && ! $this->dataExists( $userData['email'], 'user_email' ) ) :
			$this->model->insert( $userData ); /** @todo work on error handling */

			if ( ! empty( $this->hasErrors() ) ) {
				$return['type'] = 'error';
				$return['msg'] = $this->hasErrors();
			} else {
				$return['type'] = 'success';
				$return['data'] = $this->getInsertID();
			}

		else:
			$return['type'] = 'error';
		endif;

		echo json_encode($return);
	}

	public function check()
	{
		$postData = $_POST;

		/** @todo defer the ajax call */
		if ( ! $this->dataExists( $postData['email'], 'user_email' ) ) :
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