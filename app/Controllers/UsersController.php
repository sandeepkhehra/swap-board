<?php
namespace SwapBoard\Controllers;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

use SwapBoard\Models\UsersModel;

class UsersController extends BaseController
{
	public function __construct()
	{
		parent::__construct( new UsersModel );
	}

	public function create()
	{
		$postData = sboardFilterPostData( $_POST );
		$userDataArr = $this->extractUserMeta( $postData );
		$userData = $userDataArr['rest'];
		$userMeta = $userDataArr['meta'];
		$userData['password'] = password_hash( $userDataArr['rest']['password'], PASSWORD_BCRYPT );
		$userData['fullName'] = $userDataArr['meta']['firstName'] .' '. $userDataArr['meta']['lastName'];
		$userData['position'] = $userData['location'] = 'empty'; /** @todo fix this shit */

		if ( $this->validateData( $userData ) && ! $this->dataExists( $userData['email'], 'email' ) ) :
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
		if ( ! $this->dataExists( $postData['email'], 'email' ) ) :
			$return['type'] = 'success';
		else:
			$return['type'] = 'error';
			$return['msg'] = 'The email address already exists!';
		endif;

		echo json_encode( $return );
	}

	public function extractUserMeta( $data )
	{
		$userTblCols = $this->model->tblCols();
		unset( $userTblCols['id'] );
		$userData['rest'] = [];

		if ( ! empty( $userTblCols ) ) :
			foreach ( $userTblCols as $col ) :
				if ( ! empty( $data[ $col ] ) ) :

					$userData['rest'][ $col ] = $data[ $col ];
					unset( $data[ $col ] );

				endif;
			endforeach;
		endif;

		$userData['meta'] = $data;

		return $userData;
	}
}