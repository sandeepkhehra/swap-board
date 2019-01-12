<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Models\CompaniesModel;
use SwapBoard\Models\InviteMembersModel;
use SwapBoard\Controllers\BaseController;
use SwapBoard\Helpers\ViewTemplateInterface;

class LandingTemplateController extends BaseController implements ViewTemplateInterface
{
	public $title = 'SwapBoard';

	public $css = [
		'style.css',
	];

	public $js = [
		'app.js',
	];

	public $model;

	public function __construct()
	{
		parent::__construct(new CompaniesModel);
	}

	public function id()
	{
		return $this->getID();
	}

	public function viewPath()
	{
		return 'landing.index';
	}

	public function getID()
	{
		global $swapBoardConfigs;
		return $swapBoardConfigs->landing;
	}

	public function authenticate()
	{
		return true;
	}

	public function validateInvite( string $inviteCode )
	{
		return ( new InviteMembersModel )->getBy( $inviteCode, 'hash' );
	}
}
