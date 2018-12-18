<?php
namespace SwapBoard\Models;

defined('ABSPATH') or die('Not permitted!');

class UsersModel extends BaseModel
{
	protected $table = 'sboard_users';

	public function getBy( $value, $type = 'id' )
	{
		return $this->read( $value, $type );
	}

	public function insert( $data )
	{
		$this->create( $data );

		if ( $this->dbDriver->last_error !== '' ) :
			$this->errorsBag[] = $this->dbDriver->last_error;
		else:
			$this->insertID = $this->dbDriver->insert_id;
		endif;
	}

	public function eagerLoad()
	{
		$relatedTables = $this->dbDriver->get_results("SELECT DISTINCT TABLE_NAME, REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_NAME = '{$this->table}' AND REFERENCED_COLUMN_NAME = 'id'");
		$classes = [];

		if ( ! empty( $relatedTables ) ) {
			foreach ( $relatedTables as $table ) :
				$res[] = $this->dbDriver->get_results("SELECT * FROM {$table->TABLE_NAME} WHERE userID='12'");
				$replacer = [ucwords( $this->dbDriver->prefix . 'sboard_', '_' ), '_']; /** @todo maybe improve this shit */

				$class = 'SwapBoard\\Models\\' . sboardClassName( $table->TABLE_NAME, $replacer, '_' ) . 'Model';

				if ( class_exists( $class ) ) :
					$classes[] = new $class;
				endif;

			endforeach;
		}

		return $classes;
	}
}