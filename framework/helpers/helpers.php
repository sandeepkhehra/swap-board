<?php

if (!function_exists('sboardGetPostData')) {
	function sboardGetPostData(string $type = 'post')
	{
		$postData = new WP_Query([
			'post_type' => $type,
			'post_status' => 'publish'
		]);

		return $postData;
	}
}

if (!function_exists('sboardGetSlug')) {
	function sboardGetSlug(string $string)
	{
		return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
	}
}

if (!function_exists('sboardMenuSlug')) {
	function sboardMenuSlug(string $string)
	{
		return PLUGIN_SLUG . '-' . sboardGetSlug($string);
	}
}

if (!function_exists('sboardMenuTitle')) {
	function sboardMenuTitle(string $title)
	{
		return PLUGIN_PAGE_TITLE . $title;
	}
}

if (!function_exists('sboardPathResolver')) {
	function sboardPathResolver(string $path, string $type = 'view', $ext = SB_VIEWS_EXT)
	{
		$dir = SB_VIEWS_DIR;
		$pathData = explode('.', $path);
		$lastElm = end($pathData);

		if ($type === 'asset') :
			$dir = SB_VIEWS_URL;
			$ext = '';
			$lastElm = 'assets';
		endif;

		$fileName = $lastElm . $ext;
		$resolvedPath = str_replace(['.', end($pathData)], ['/', $fileName], $path);

		return $filePath = $dir . $resolvedPath;
	}
}

if (!function_exists('sboardDefineFormAction')) {
	/**
	 * Outputs fields for "POST" action with WP NONCE data.
	 *
	 * @param string $action
	 * @param object $controller
	 * @return void
	 */
	function sboardDefineFormAction($action, $controller)
	{
		if (method_exists($controller, $action)) :
			wp_nonce_field($action, SB_FORM_NONCE);
			$fields = "<input type='hidden' value='{$action}' name='sbAction'>
			<input type='hidden' value='sboardPOST' name='action'>
			<input type='hidden' value='". str_replace('\\', ':', get_class($controller)) ."' name='sbController'>";

			echo $fields;
		endif;
	}
}

if (!function_exists('sboardFilterPostData')) {
	/**
	 * Unsets unwanted indexes/variables from the data array.
	 *
	 * @param array $array
	 * @return void
	 */
	function sboardFilterPostData($array)
	{
		unset(
			$array[SB_NONCE],
			$array['action'],
			$array['sbAction'],
			$array['sbController'],
			$array['_wp_http_referer']
		);

		return $array;
	}
}

if (!function_exists('sboardRedirect')) {
	/**
	 * Performs a redirect back to the referer source.
	 *
	 * @return void
	 */
	function sboardRedirect()
	{
		if (wp_get_referer()) {
			$redirect = wp_get_referer();
		} else {
			$redirect = $_SERVER['HTTP_REFERER'];
		}

		header("Location: {$redirect}");
		exit;
	}
}

if (!function_exists('sboardInclude')) {
	function sboardInclude($filePath, $context = null)
	{
		$filePath = sboardPathResolver($filePath, 'view', SB_INCL_EXT);

		if (file_exists($filePath)):
			include_once $filePath;
		endif;
		// Do the error handling.
	}
}

if (!function_exists('sboardGetImage')) {
	function sboardGetImage($imagePath)
	{
		echo SB_VIEWS_URL . $imagePath;
	}
}

if (!function_exists('sboardCoreAssets')) {
	/**
	 * Need a lot of reworking!
	 *
	 * @param string $assetType
	 * @param array $assets
	 * @return void
	 * @todo Fix the whole goddamn thing.
	 */
	function sboardCoreAssets($assetType, array $assets)
	{
		$weird = func_get_args()[2];

		if (!empty($weird)) :
			$newPath = "$weird/assets/$assetType/$assets[0]";
			sboardGetImage($newPath);
		endif;

		if (in_array($assetType, ['css', 'js', 'images', 'fonts'])) :

			foreach ($assets as $asset) :
				$dirPath = SB_ASSETS_DIR . $assetType . DS . $asset;

				if (file_exists($dirPath)):
					$assetPath = str_replace(SB_ASSETS_DIR, SB_ASSETS_URL, $dirPath);

					switch ($assetType) :
						case 'css':
						$embed = "<link rel='stylesheet' href='{$assetPath}'>";
						break;

						case 'js':
						$embed = "<script src='{$assetPath}'></script>";
						break;

						case 'images':
						$embed = $assetPath;
						break;
					endswitch;

					echo $embed;
				endif;
			endforeach;

		endif;
	}
}
