<?php

/**
 * The Result database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Mark extends Shared\Model {
    

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 5
     * @index
     * 
     * @validate required, max(5)
     * @label Course ID
     */
    protected $_student_id;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 5
     * @index
     * 
     * @validate required, max(5)
     * @label Course ID
     */
    protected $_subject_id;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 5
     * @index
     * 
     * @validate required, max(5)
     * @label Course ID
     */
    protected $_internal;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 5
     * @index
     * 
     * @validate required, max(5)
     * @label Course ID
     */
    protected $_external;
    
}
