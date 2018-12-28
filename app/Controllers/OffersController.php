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

	public function findOffers()
	{
		$postData = sboardFilterPostData( $_POST );

		$offers = $this->model->customQuery( $postData );

		array_map( function( $offer ) {
			return $offer->datetime = unserialize( $offer->datetime );
		}, $offers );

		if ( ! empty( $this->hasErrors() ) ) {
			$return['type'] = 'error';
			$return['msg'] = $this->hasErrors();
		} else {
			$return['type'] = 'success';
			$return['data'] = $offers;
		}

		echo json_encode($return);
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
}
