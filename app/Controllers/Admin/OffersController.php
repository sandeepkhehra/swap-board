<?php
namespace SwapBoard\Controllers\Admin;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\OffersModel;
use SwapBoard\Controllers\BaseController;

class OffersController extends BaseController
{
	const SHIFT_TYPES = [
		1 => 'Post a Shift',
		2 => 'Swift Swap',
		3 => 'Permanent Swift Swap',
	];

	public function __construct()
	{
		parent::__construct( new OffersModel );
	}

	public function create()
	{
		$postData = sboardFilterPostData( $_POST );
		$startDateTime = date(  'Y-m-d H:i:s', strtotime( $_POST['date']. ' ' .$_POST['startTime'] ) );
		$endDateTime = date( 'Y-m-d H:i:s', strtotime( $_POST['date']. ' ' .$_POST['endTime'] ) );
		$postData['startDatetime'] = $startDateTime;
		$postData['endDatetime'] = $endDateTime;
		unset( $postData['date'], $postData['startTime'], $postData['endTime'] );

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
		$this->model->getActiveOffers();
	}

	public function findOffers()
	{
		$postData = sboardFilterPostData( $_POST );

		$offers = $this->model->customQuery( $postData );

		array_map( function( $offer ) {
			$offer->date = date( 'Md, Y', strtotime( $offer->startDatetime ) );
			$offer->startTime = date( 'g:i A', strtotime( $offer->startDatetime ) );
			$offer->endTime = date( 'g:i A', strtotime( $offer->endDatetime ) );
			$offer->type = self::SHIFT_TYPES[ $offer->type ];
		}, $offers );

		$appliedTo = (new AppliedOffersController)->getUsersOffers( $postData['userID'] );
		$appliedToIDs = [];

		foreach ( $appliedTo as $applied ) :
			$appliedToIDs[] = $applied->offerID;
		endforeach;

		if ( ! empty( $this->hasErrors() ) ) {
			$return['type'] = 'error';
			$return['msg'] = $this->hasErrors();
		} else {
			$return['type'] = 'success';
			$return['data'] = $offers;
			$return['appliedTo'] = $appliedToIDs;
		}

		echo json_encode($return);
	}

	public function updateOfferStatus( $data )
	{
		return $this->model->update( $data );
	}

	public function update()
	{
		$postData = sboardFilterPostData( $_POST );

		$startDateTime = date(  'Y-m-d H:i:s', strtotime( $postData['date']. ' ' .$postData['startTime'] ) );
		$endDateTime = date( 'Y-m-d H:i:s', strtotime( $postData['date']. ' ' .$postData['endTime'] ) );
		$postData['startDatetime'] = $startDateTime;
		$postData['endDatetime'] = $endDateTime;
		unset( $postData['date'], $postData['startTime'], $postData['endTime'] );

		$this->model->update( $postData );

		if ( ! empty( $this->hasErrors() ) ) {
			$return['type'] = 'error';
			$return['msg'] = $this->hasErrors();
		} else {
			$return['type'] = 'success';
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

	public function edit()
	{
		$postData = sboardFilterPostData( $_POST );

		if ( ! $data = $this->dataExists( $postData['id'] ) ) return;

		$return['type'] = 'success';
		$return['data'] = $data;

		echo json_encode( $return );
	}

	public function toggleOfferVisibility()
	{
		$postData = sboardFilterPostData( $_POST );

		if ( ! $this->dataExists( $postData['id'] ) ) return;

		$this->model->toggleOfferVisibility( $postData );

		$return['type'] = 'success';
		echo json_encode( $return );
	}
}
