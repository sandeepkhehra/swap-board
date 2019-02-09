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
				'role' => 'swap-member',
				'description' => $postData['invDescription'],
			];
			$userID = wp_insert_user( $userData );

			if ( ! empty( $this->hasErrors() ) ) {
				$return['type'] = 'error';
				$return['msg'] = $this->hasErrors();
			} else {
				$this->updateUserMeta( $userID, $postData );
				( new InviteMembersController )->inviteeResponded( $postData['hash'], 1, $userID );

				$return['type'] = 'success';
			}
		else:
			$return['type'] = 'error';
			$return['msg'] = 'Email address already exists!';
		endif;

		echo json_encode( $return );
	}

	public function updateUserMeta( $userID = null, $metaData = null )
	{
		$postData = sboardFilterPostData( $_POST );

		$userID = $userID ? $userID : $_POST['userID'];
		$metaData = $metaData ? $metaData : $postData;

		if ( isset( $_FILES['avatar'] ) && $_FILES['avatar']['size'] > 0 ) {
			$fileTmpPath = $_FILES['avatar']['tmp_name'];
			$fileName = $_FILES['avatar']['name'];
			$fileSize = $_FILES['avatar']['size'];
			$fileType = $_FILES['avatar']['type'];
			$fileNameCmps = explode(".", $fileName);
			$ext = strtolower( end( $fileNameCmps ) );
			$allowedFileExtensions = ['jpg', 'gif', 'png'];
			$uploadFileDir = wp_upload_dir()['basedir'].'/swap/users/';
			if ( ! file_exists( $uploadFileDir ) ) {
				mkdir( $uploadFileDir, 0777, true );
			}
			$newFileName = md5(time() . $fileName) . '.' . $ext;
			$dest_path = $uploadFileDir . $newFileName;
			$fullURL = wp_upload_dir()['baseurl'].'/swap/users/'.$newFileName;

			if ( in_array( $ext, $allowedFileExtensions ) ) {
				if (move_uploaded_file($fileTmpPath, $dest_path)) :
					$metaData['avatar'] = $fullURL;
					$return['type'] = 'success';
				else:
					$return['type'] = 'error';
					$return['msg'] = 'Couldn\'t upload file!';
				endif;
			}
		} else {
			echo 'loo';
			// $postData['details'] = $prevDetails;
		}

		update_user_meta( $userID, '__swap-user', $metaData );

		$return['type'] = 'success';
		$return['msg'] = 'Details updated successfully!';

		echo json_encode( $return );
	}

	public function userDetails()
	{
		$postData = sboardFilterPostData( $_POST );
		$user = $this->model->getBy( $postData['id'] );
		$membersData = (object) $this->model->withOne('sboard_members', 'userID', $postData['id']);

		if ( $user ) :
			$user->meta_data = get_user_meta( $user->ID, '__swap-user', true );
			$return['type'] = 'success';
			$return['data'] = $user;
			$return['memberData'] = $membersData;
		else:
			$return['type'] = 'error';
			$return['msg'] = 'Something Happened!';
		endif;

		echo json_encode( $return );
	}

	public function getUserMeta( int $userID )
	{
		$userMeta = get_user_meta( $userID, '__swap-user', true );
		$userMeta = $userMeta ? $userMeta : [];

		if ( ! isset( $userMeta ) || empty( $userMeta ) || ! isset( $userMeta['avatar'] ) || empty( $userMeta['avatar'] ) ) :
			$userMeta['avatar'] = SB_ASSETS_URL . 'images/def-user.png';
		endif;

		return $userMeta;
	}
}