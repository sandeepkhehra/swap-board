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
		if (null !== $this->resolveViewPath($viewPath)) {
			$this->viewPath = $viewPath;

			$this->getAssets($viewPath)->enqueue();
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

	public function enqueue()
	{
		add_action('admin_enquque_scripts', [$this, 'loadAssets']);
	}

	public function resolveAssetsPath($assetPath, $assetType, $assets)
	{
		foreach ($assets as $asset) :
			$assetPath = $assetPath . "/{$assetType}/$asset";
			$this->loadAssets($assetPath, $assetType);
		endforeach;
	}

	public function loadAssets(string $assetPath, string $assetType)
	{
		$rand = uniqid();
		if ($assetType == 'css') :
			wp_enqueue_style('yc-' .$rand, $assetPath);
		elseif ($assetType == 'js'):
			wp_enqueue_script('yc-' . $rand, $assetPath, null, false, true);
		endif;
	}
}