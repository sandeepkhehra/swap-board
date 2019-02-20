<?php
namespace SwapBoard\Controllers\Admin;

defined( 'ABSPATH' ) or die( 'Not permitted!' );

use SwapBoard\Models\PlansModel;
use SwapBoard\Controllers\BaseController;

class PlansController extends BaseController
{
	public function __construct()
	{
		parent::__construct( new PlansModel );
	}

	public function purchasePlan()
	{
		$postData = sboardFilterPostData( $_POST );
		$plan = $this->model->getBy( $_POST['id'] );

		if ( $plan ) :
			$return['type'] = 'success';
			$return['data'] = $plan;
		else :
			$return['type'] = 'error';
		endif;

		echo json_encode( $return );
		wp_die();
	}

	public function saveTransactionData()
	{
		global $user_ID;

		$postData = sboardFilterPostData( $_POST );
		$planData = get_user_meta( $user_ID, '__sboard_plan_data', true );

		if ( ! $planData ) $planData = [];

		$planData[ $postData['planID'] ] = json_decode( stripslashes_deep($_POST['transactionData']), true );
		update_user_meta( $user_ID, '__sboard_plan_data', $planData );

		$return['type'] = 'success';
		echo json_encode( $return );
	}
}