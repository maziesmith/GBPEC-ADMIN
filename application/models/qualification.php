<?php

/**
 * The Qualification  database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Qualification extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label User Type {Student/Employee}
     */
    protected $_property;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label User ID
     */
    protected $_property_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Course Name
     */
    protected $_course;
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Institute Name
     */
    protected $_institute;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 10
     * @index
     * 
     * @validate required, max(100)
     * @label Passing Year
     */
    protected $_year;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Marks In percentage (%)
     */
    protected $_marks;
}
