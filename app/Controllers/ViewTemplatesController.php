<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\HookrInterface;
use SwapBoard\Helpers\ViewTemplateInterface;
use SwapBoard\Traits\ViewsTrait;

class ViewTemplatesController implements HookrInterface
{
	use  ViewsTrait;

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

				if ($post->ID == $this->template->id()) :
					$this->getView($this->template->viewPath());
					exit;
				endif;
			}
		endforeach;

		return $templatePath;
	}

	public function hook()
	{
		add_filter('show_admin_bar', '__return_false');
		add_filter('page_template', [$this, 'loadTemplates']);
	}
}
