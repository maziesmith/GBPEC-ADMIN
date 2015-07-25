<?php
/**
 * Blank Class for connecting to MySQL
 * 
 * @package Main
 * @subpackage Basic
 * @author Faizan Ayubi
 */
class Blank extends DatabaseObject
{
	protected static $table_name = "blanks";
	public $id;
	public $created;
	public $updated;

	protected static $db_fields = array('id', 'created', 'updated');
	
}
?>