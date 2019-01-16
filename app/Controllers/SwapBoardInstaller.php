<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\HookrInterface;

class SwapBoardInstaller implements HookrInterface
{
	protected static $dbDriver;

	private static function resolveSQLPath(string $filePath)
	{
		$sqlContent = file_get_contents($filePath);
		$sqlContent = trim($sqlContent, '\n\r\0x20;');

		$sqlCommands = explode(';', $sqlContent);
		$sqlCommands = array_filter($sqlCommands);

		foreach ($sqlCommands as $sqlCommand) :

			$sqlCommand = self::resolveSQL($sqlCommand);
			self::$dbDriver->query("{$sqlCommand};");

		endforeach;
	}

	private static function resolveSQL(string $sqlData)
	{
		$correctSQLData = trim($sqlData, '\n\r\0x20;');
		$correctSQLData = str_replace('###', self::$dbDriver->prefix, $correctSQLData);
		$correctSQLData = str_replace('~~~COLLATE', self::$dbDriver->get_charset_collate(), $correctSQLData);

		return $correctSQLData;
	}

	public static function swapUserRoles()
	{
		add_role( 'swap-admin', __( 'SwapBoard Admin' ),
			[
				'read'         => true,
				'edit_posts'   => true,
				'delete_posts' => true,
			]
		);

		add_role( 'swap-member', __( 'SwapBoard Member' ) );
	}

	public function hook()
	{
		global $wpdb;
		self::$dbDriver = $wpdb;

		register_activation_hook( SB_ROOT_FILE, [__CLASS__, 'swapUserRoles'] );
		register_activation_hook( SB_ROOT_FILE, [__CLASS__, 'installDB'] );
		register_uninstall_hook( SB_ROOT_FILE, [__CLASS__, 'uninstallDB'] );
	}

	public static function installDB()
	{
		self::resolveSQLPath(SB_DB_DIR . 'installer.sql');
	}

	public static function uninstallDB()
	{
		self::resolveSQLPath(SB_DB_DIR . 'uninstaller.sql');
	}
}
