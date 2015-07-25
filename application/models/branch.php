<?php

/**
 * The Branch List database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Branch extends Shared\Model {
    

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Course ID
     */
    protected $_course_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Branch name
     */
    protected $_branch_name;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 5
     * @index
     * @label Currently is or not
     */
    protected $_active;
    
}
