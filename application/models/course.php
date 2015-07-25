<?php

/**
 * The Course List database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Course extends Shared\Model {
    


    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Course name
     */
    protected $_course_name;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Fee Of the Course
     */
    protected $_fee;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Head Of Course
     */
    protected $_head;

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
