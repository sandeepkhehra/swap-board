<?php

if (!function_exists('getPostData')) {
	function getPostData(string $type = 'post')
	{
		$postData = new WP_Query([
			'post_type' => $type,
			'post_status' => 'publish'
		]);

		return $postData;
	}
}

if (!function_exists('getSlug')) {
	function getSlug(string $string)
	{
		return str_replace([' ', '_'], '-', strtolower($string));
	}
}

if (!function_exists('menuSlug')) {
	function menuSlug(string $string)
	{
		return PLUGIN_SLUG . '-' . getSlug($string);
	}
}

if (!function_exists('menuTitle')) {
	function menuTitle(string $title)
	{
		return PLUGIN_PAGE_TITLE . $title;
	}
}

if (!function_exists('pathResolver')) {
	function pathResolver(string $path, string $type = 'view', $ext = SB_VIEWS_EXT)
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
