<?php
namespace SwapBoard\Controllers;

defined('ABSPATH') or die('Not permitted!');

use SwapBoard\Helpers\HookrInterface;

class SwapBoardInstaller implements HookrInterface
{
	protected $dbDriver;

	private function resolveSQLPath(string $filePath)
	{
		$sqlContent = file_get_contents($filePath);
		$sqlContent = trim($sqlContent, '\n\r\0x20;');

		$sqlCommands = explode(';', $sqlContent);
		$sqlCommands = array_filter($sqlCommands);

		foreach ($sqlCommands as $sqlCommand) :

			$sqlCommand = $this->resolveSQL($sqlCommand);

			$this->dbDriver->query("{$sqlCommand};");

		endforeach;
	}

	private function resolveSQL(string $sqlData)
	{
		$correctSQLData = trim($sqlData, '\n\r\0x20;');
		$correctSQLData = str_replace('###', $this->dbDriver->prefix, $correctSQLData);
		$correctSQLData = str_replace('~~~COLLATE', $this->dbDriver->get_charset_collate(), $correctSQLData);

		return $correctSQLData;
	}

	public function hook()
	{
		global $wpdb;
		$this->dbDriver = $wpdb;

		register_activation_hook(SB_ROOT_FILE, [$this, 'installDB']);
		register_uninstall_hook(SB_ROOT_FILE, [$this, 'uninstallDB']);
	}

	public function installDB()
	{
		$this->resolveSQLPath(SB_DB_DIR . 'installer.sql');
	}

	public function uninstallDB()
	{
		$this->resolveSQLPath(SB_DB_DIR . 'uninstaller.sql');
	}
}
