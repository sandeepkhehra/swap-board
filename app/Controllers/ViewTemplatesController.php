<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\HookrInterface;
use SwapBoard\Traits\ViewsTrait;

class ViewTemplatesController implements HookrInterface
{
	use  ViewsTrait;

	protected $templateID;

	protected $templates = [
		LandingTemplateController::class,
		Admin\AdminPanelTemplateController::class,
	];

	public function loadTemplates($template)
	{
		global $post;

		foreach ($this->templates as $template) :
			if (class_exists($template)) {

				$this->templateID = $template::id();
				$this->cssAssets = $template::$css;
				$this->jsAssets = $template::$js;

				if ($post->ID == $this->templateID) :
					$this->getView($template::viewPath());
					exit;
				endif;
			}
		endforeach;

		return $template;
	}

	public function hook()
	{
		add_filter('show_admin_bar', '__return_false');
		add_filter('page_template', [$this, 'loadTemplates']);
	}
}
