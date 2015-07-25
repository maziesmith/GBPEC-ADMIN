<?php

/**
 * The Student Parents database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Guardian extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Student Id
     */
    protected $_student_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @validate required
     * @label Father's Name
     */
    protected $_father_name;

     /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @validate required
     * @label Father's Name
     */
    protected $_father_occupation;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @validate required
     * @label Mother's Name
     */
    protected $_mother_name;

     /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @validate required
     * @label Father's Name
     */
    protected $_mother_occupation;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 20
     * @validate required
     * @label Father's Contact Number
     */
    protected $_father_mobile;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 20
     * @index
     * 
     * @label Mother's Contact
     */
    protected $_mother_mobile;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label Annual Income
     */
    protected $_annual_income;
    
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label Permanent Address
     */
    protected $_address;
}
