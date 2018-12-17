<?php
namespace SwapBoard\Controllers\Menus;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\SettingsModel;

class SettingsMenuController extends BaseMenuController
{
    protected $title = 'Settings';

    protected $cssAssets = [];

    protected $jsAssets = ['app.js'];

	public function __construct()
	{
		parent::__construct(['css' => $this->cssAssets, 'js' => $this->jsAssets]);
	}

	public function menuView()
	{
		$this->getView('dash.settings.index');
	}

	public function updateData()
	{
		$postData = $_POST;

		if (isset( $postData[ SB_FORM_NONCE ] )
			&& wp_verify_nonce( $postData[ SB_FORM_NONCE ], $postData['sbAction'] ) ) {

			$postData = sboardFilterPostData( $postData );
			update_option( PLUGIN_SETTINGS_KEY, $postData );
		}

		return sboardRedirect();
	}

	public function getData()
	{
		return get_option( PLUGIN_SETTINGS_KEY );
	}
}
