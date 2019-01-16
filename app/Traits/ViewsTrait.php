<?php
namespace SwapBoard\Traits;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\ViewsErrorException;

trait ViewsTrait
{
	protected $viewPath;
	/**
	 * CSS assets for current class.
	 *
	 * @var array
	 */
	protected $cssAssets = [];

	/**
	 * JS assets for current class.
	 *
	 * @var array
	 */
    protected $jsAssets = [];

	public function getView(string $viewPath)
	{
		$viewType = '';

		if (null !== $this->resolveViewPath($viewPath)) {
			$this->viewPath = $viewPath;

			if (strpos($this->viewPath, 'dash') === false) {
				$viewType = 'template';
			}

			$this->getAssets($viewPath)->enqueue($viewType);
			include_once $this->resolveViewPath($viewPath);
		}
	}

	public function resolveViewPath(string $viewPath)
	{
		$filePath = sboardPathResolver($viewPath);

		try {
			if (!file_exists($filePath)) :
				throw new ViewsErrorException($filePath);
			else:
				return $filePath;
			endif;
		} catch (ViewsErrorException $e) {
			echo $e->msg();
		}
	}

	public function getAssets(string $viewPath)
	{
		$allAssets = array_combine(['css', 'js'], [$this->cssAssets, $this->jsAssets]);
		foreach ($allAssets as $assetType => $assets) :
			if (!empty($assets)) :
				$assetsPath = sboardPathResolver($viewPath, 'asset', ".{$assetType}");
				$this->resolveAssetsPath($assetsPath, $assetType, $assets);
			endif;
		endforeach;

		return $this;
	}

	public function enqueue($viewType)
	{
		add_action('admin_enquque_scripts', [$this, 'loadAssets']);

		if ($viewType === 'template') :
			add_action('wp_enquque_scripts', [$this, 'loadAssets']);
			add_action('wp_enqueue_scripts', [$this, 'removeWPViewAssets'], 100);
		endif;
	}

	public function resolveAssetsPath($assetPath, $assetType, $assets)
	{
		foreach ($assets as $asset) :
			$fullAssetPath = $assetPath . "/{$assetType}/$asset";
			$this->loadAssets($fullAssetPath, $assetType);
		endforeach;
	}

	public function loadAssets(string $assetPath, string $assetType)
	{
		$handle = uniqid();
		if ($assetType == 'css') :
			wp_enqueue_style(PLUGIN_SLUG .'-'. $handle, $assetPath);
		elseif ($assetType == 'js'):
			wp_enqueue_script(PLUGIN_SLUG .'-'.  $handle, $assetPath, ['jquery'], false, true);
		endif;
	}

	/**
	 * Get rid of unwanted WP styles and scripts.
	 *
	 * @return void
	 */
	public function removeWPViewAssets() {
		global $wp_scripts, $wp_styles;

		foreach($wp_scripts->registered as $handle => $registered):
			if (strpos($registered->src, '/wp-admin/') === false
				&& strpos($handle, PLUGIN_SLUG) === false
				&& strpos($handle, 'jquery') === false
			) :
				wp_deregister_script($registered->handle);
			endif;
		endforeach;

		foreach($wp_styles->registered as $handle => $registered):
			if (strpos($registered->src, '/wp-admin/') === false
				&& strpos($handle, PLUGIN_SLUG) === false
			) :
				wp_deregister_style($registered->handle);
			endif;
		endforeach;
	}
}