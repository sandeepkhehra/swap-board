<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\CompaniesModel;

class CompaniesController extends BaseController
{
	public function __construct()
	{
		parent::__construct( new CompaniesModel );
	}

	public function create()
	{
		$postData = sboardFilterPostData( $_POST );

		if ( $this->validateData( $postData ) && ! $this->dataExists( $postData['url'], 'url' ) ) :

			$postData['details'] = serialize( $postData['details'] );

			$this->model->insert( $postData ); /** @todo work on error handling */

			if ( ! empty( $this->hasErrors() ) ) {
				$return['type'] = 'error';
				$return['msg'] = $this->hasErrors();
			} else {
				$return['type'] = 'success';
			}

		else:
			$return['type'] = 'error';
			$return['msg'] = 'Something is wrong!';
		endif;

		echo json_encode( $return );
	}

	public function check()
	{
		$postData = $_POST;

		/** @todo defer the ajax call */
		if ( ! $this->dataExists( $postData['url'], 'url' ) ) :
			$return['type'] = 'success';
		else:
			$return['type'] = 'error';
			$return['msg'] = 'The company URL already exists!';
		endif;

		echo json_encode( $return );
	}

	public function update()
	{
		$postData = sboardFilterPostData( $_POST );

		if ( isset( $postData['id'] ) ) :
			$postData['details'] = serialize( $postData['details'] );
			$postData['positions'] = serialize( $postData['positions'] );
			$postData['locations'] = serialize( $postData['locations'] );

			$this->model->update( $postData );

			$return['type'] = 'success';
		else:
			$return['type'] = 'error';
		endif;

		echo json_encode( $return );
	}

}