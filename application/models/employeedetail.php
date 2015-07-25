<?php

/**
 * The Employee Personal database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class EmployeeDetail extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 100
     * @index
     * 
     * @validate required, max(100)
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
     * @label Blood Group
     */
    protected $_blood_group;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label Category
     */
    protected $_category;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 10
     * @index
     * 
     * @label Gender
     */
    protected $_gender;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label Religion
     */
    protected $_religion;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label Father or Spouse
     */
    protected $_contact;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label Father/ Spouse Mobile No.
     */
    protected $_mobile;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 20
     * @index
     * 
     * @label Marital Status
     */
    protected $_marital_status;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label Designation
     */
    protected $_designation;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label Address
     */
    protected $_address;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 60
     * @index
     * 
     * @label Joining Date
     */
    protected $_joining_date;

}
