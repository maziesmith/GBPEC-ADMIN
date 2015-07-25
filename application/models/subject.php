<?php

/**
 * The Subjects List database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Subject extends Shared\Model {
    

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 10
     * @index
     * 
     * @validate required, max(100)
     * @label Branch ID
     */
    protected $_branch_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Subject name
     */
    protected $_subject_name;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Subject Code
     */
    protected $_subject_code;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Paper Id
     */
    protected $_paper_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 5
     * @index
     * 
     * @label Credits of Subject
     */
    protected $_credits;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 10
     * @index
     * 
     * @validate required, max(10)
     * @label Semester in which subject is Taught
     */
    protected $_sem;

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
