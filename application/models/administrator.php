<?php

/**
 * The Administrator database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Administrator extends Shared\Model {
    /**
     * @column
     * @readwrite
     * @type integer
     * @length 100
     * 
     * @label Employee Id
     */
    protected $_employee_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label Authorized Department
     */
    protected $_department;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 100
     * @index
     *
     * @label Autorization Level
     */
    protected $_auth_level;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_active;
}
