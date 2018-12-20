<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\OffersModel;

class OffersController extends BaseController
{
	public function __construct()
	{
		parent::__construct( new OffersModel );
	}

	public function create()
	{
		$postData = sboardFilterPostData( $_POST );
		$postData['datetime'] = serialize( $postData['datetime'] );

		$this->model->insert( $postData ); /** @todo work on error handling */

		if ( ! empty( $this->hasErrors() ) ) {
			$return['type'] = 'error';
			$return['msg'] = $this->hasErrors();
		} else {
			$return['type'] = 'success';
			$return['data'] = $this->getInsertID();
		}

		echo json_encode($return);
	}

	public function get()
	{
		$this->model->readAll();
	}

	public function offers()
	{
		$this->model->getOffers();
	}
}
