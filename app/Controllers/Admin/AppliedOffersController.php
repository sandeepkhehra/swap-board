<?php
namespace SwapBoard\Controllers\Admin;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

use SwapBoard\Models\AppliedOffersModel;
use SwapBoard\Controllers\BaseController;

class AppliedOffersController extends BaseController
{
	public function __construct()
	{
		parent::__construct( new AppliedOffersModel );
	}

	public function applyOffer()
	{
		global $user_ID;

		$postData = sboardFilterPostData( $_POST );
		$postData['userID'] = $user_ID;

		$this->model->insert( $postData );

		if ( ! empty( $this->hasErrors() ) ) {
			$return['type'] = 'error';
			$return['msg'] = $this->hasErrors();
		} else {
			$return['type'] = 'success';
			$return['msg'] = 'Applied successfully!';
		}

		echo json_encode( $return );
	}

	public function acceptOffer()
	{
		$postData = sboardFilterPostData( $_POST );
		$postData['status'] = 1;

		if ( ! $this->isOfferActive( $postData['offerID'] ) ) :
			unset( $postData['offerID'], $postData['userID'] );

			$this->model->acceptOffer( $postData );

			if ( ! empty( $this->hasErrors() ) ) {
				$return['type'] = 'error';
				$return['msg'] = $this->hasErrors();
			} else {
				$data['id'] = $_POST['offerID'];
				$data['status'] = 1;
				( new OffersController )->updateOfferStatus( $data );

				$this->sendConfirmationEmail( $_POST['userID'] );

				$return['type'] = 'success';
				$return['msg'] = 'Offer accepted successfully!';
			}
		else:
			$return['type'] = 'error';
			$return['msg'] = 'Someone is already assigned for this offer!';
		endif;

		echo json_encode( $return );
	}

	private function sendConfirmationEmail( $userID )
	{
		$userData = get_userdata( $userID );

		if ( $userData ) $this->sendEmail( $userData->user_email, 'Your offer is accepted!', 'Yes.' );
	}

	public function declineOffer()
	{
		$postData = sboardFilterPostData( $_POST );
		$postData['status'] = 2;

		$this->model->declineOffer( $postData );

		if ( ! empty( $this->hasErrors() ) ) {
			$return['type'] = 'error';
			$return['msg'] = $this->hasErrors();
		} else {
			$return['type'] = 'success';
			$return['msg'] = 'Offer declined successfully!';
		}

		echo json_encode( $return );
	}

	public function get( int $offerID )
	{
		return $this->model->getOpenOffers( $offerID );
	}

	public function isOfferActive( int $offerID )
	{
		$activeOffers = $this->model->offerStatus( $offerID );

		return empty( $activeOffers ) ? false : true;
	}
}