<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\EmailTemplatesModel;

class EmailTemplatesMenuController extends BaseMenuController
{
    protected $title = 'Email Templates';

    protected $cssAssets = [];

    protected $jsAssets = ['app.js'];

	public function __construct()
	{
		parent::__construct( ['css' => $this->cssAssets, 'js' => $this->jsAssets] );
	}

	public function menuView()
	{
		$this->getView('dash.email-temps.index');
	}

	public function model()
	{
		$this->setModel(new EmailTemplatesModel);
	}

	public function create()
	{
		$postData = sboardFilterPostData( $_POST );

		$this->model->insert( $postData );

		return sboardRedirect();
	}

	public function loadTemplateData()
	{
		$postData = sboardFilterPostData( $_POST );

		if ( isset( $postData['tempID'] ) && $data = $this->getTemplateData( $_POST['tempID'] ) ) :
			$return['type'] = 'success';
			$return['data'] = $data;

			echo json_encode( $return );
		endif;
	}

	public function getTemplateData( string $tempID )
	{
		$data = $this->model->getBy( $tempID, 'tempID' );

		if ( $data ) :
			return ( object ) [
				'id' => $data->id,
				'subject' => stripcslashes( html_entity_decode( $data->subject, ENT_QUOTES ) ),
				'content' => stripcslashes( html_entity_decode( $data->content ) ),
			];
		endif;

		return;
	}
}
