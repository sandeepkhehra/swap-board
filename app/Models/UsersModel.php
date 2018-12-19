<?php
namespace SwapBoard\Models;

defined('ABSPATH') or die('Not permitted!');

class UsersModel extends BaseModel
{
	protected $table = 'users';

	public function getBy( $value, $type = 'id' )
	{
		return $this->read( $value, $type );
	}

	public function insert( $data )
	{
		$this->create( $data );
	}

	// public function eagerLoad(array $tableNames)
	// {
	// 	echo "SELECT DISTINCT TABLE_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_NAME = '" . self::$tableName ."' AND REFERENCED_COLUMN_NAME = 'id'";
	// 	$relatedTables = $this->dbDriver->get_results("SELECT DISTINCT TABLE_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_NAME = '" . self::getTableName() ."' AND REFERENCED_COLUMN_NAME = 'id'");

	// 	if ( ! empty( $relatedTables ) ) {
	// 		foreach ( $relatedTables as $key => $table ) :
	// 			if ( in_array($table->TABLE_NAME, $tableNames) ) :

	// 				$joins[] = "LEFT JOIN {$table->TABLE_NAME} as b_{$key} ON b_{$key}.userID = a.id";
	// 				$where[] = "b_{$key}.userID IS NOT NULL";

	// 			endif;
	// 		endforeach;

	// 		$joins = implode( ' ', $joins);
	// 		$where = implode( ' OR ', $where);
	// 		echo $sql = "SELECT * FROM wp_sboard_users as a {$innerJoins} WHERE {$where}";
	// 		$res = $this->dbDriver->get_results($sql);

	// 		echo "<pre>";
	// 		print_r($res);
	// 		echo "</pre>";
	// 	}

	// 	return $classes;
	// }
}