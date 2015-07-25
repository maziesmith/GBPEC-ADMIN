<?php

/**
 * The Bank database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Bank extends Shared\Model
{
	/**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Bank Name
     */
    protected $_bank_name;
}
?>