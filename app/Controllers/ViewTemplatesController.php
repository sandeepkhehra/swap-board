<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Traits\ViewsTrait;
use SwapBoard\Helpers\HookrInterface;
use SwapBoard\Helpers\ViewTemplateInterface;

class ViewTemplatesController implements HookrInterface
{
	use ViewsTrait;

	public $template;

	private $templates = [
		LandingTemplateController::class,
		Admin\AdminPanelTemplateController::class,
	];

	public function loadTemplates($templatePath)
	{
		global $post;

		foreach ($this->templates as $template) :
			if (class_exists($template) && new $template instanceof ViewTemplateInterface) {
				$this->template = new $template;
				$this->cssAssets = $this->template->css;
				$this->jsAssets = $this->template->js;

				if ( $this->template->authenticate() && $post->ID == $this->template->id() ) :
					$this->getView($this->template->viewPath());
					exit;
				endif;
			}
		endforeach;

		return $templatePath;
	}

	public function setRedirection()
	{
		global $post;

		if ( $post && is_object( $post ) ) :
			$user = wp_get_current_user();

			if ( $post->ID == PLUGIN_ADMIN_LAND_PAGE ) :
				if ( in_array( 'swap-admin', (array) $user->roles ) || in_array( 'swap-member', (array) $user->roles ) ) :
					wp_redirect( get_permalink( PLUGIN_ADMIN_DASH_PAGE ) );
					exit;
				endif;

			elseif ( $post->ID == PLUGIN_ADMIN_DASH_PAGE ) :
				if ( ! in_array( 'swap-admin', (array) $user->roles ) && ! in_array( 'swap-member', (array) $user->roles ) ) :
					wp_redirect( get_permalink( PLUGIN_ADMIN_LAND_PAGE ) );
					exit;
				endif;
			endif;
		endif;
	}

	public function hook()
	{
		add_action( 'wp', [$this, 'setRedirection'] );
		add_filter( 'show_admin_bar', '__return_false' );
		add_filter( 'page_template', [$this, 'loadTemplates'] );
	}
}
