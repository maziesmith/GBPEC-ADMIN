<?php

/**
 * The Student Personal database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class StudentDetail extends Shared\Model {

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
     * @length 20
     * @validate required
     * @label CET Rank
     */
    protected $_cet_rank;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 20
     * @validate required
     * @label CET Roll Number
     */
    protected $_cet_roll;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 20
     * @validate required
     * @label Branch Id
     */
    protected $_branch_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 20
     * @validate required
     * @label Date Ob Birth
     */
    protected $_dob;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 20
     * @validate required
     * @label Entry Type
     */
    protected $_entry_type;

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
     * @label Alternate Contact No.
     */
    protected $_mobile;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @label Region 
     */
    protected $_region;

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
     * @length 100
     * @index
     * 
     * @label Admission Year
     */
    protected $_admission_year;

}
