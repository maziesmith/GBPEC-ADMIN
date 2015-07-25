<?php

/**
 * The Fee database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Fee extends Shared\Model {

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
     * @type integer
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Course Id
     */
    protected $_course_id;

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
     * @type integer
     * @length 10
     * @index
     * 
     * @validate required, max(10)
     * @label Bank Id
     */
    protected $_bank_id;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 10
     * @index
     * 
     * @validate required, max(10)
     * @label DD Number
     */
    protected $_dd_number;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label DD Issue Date
     */
    protected $_issue_date;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Fee Payment Date
     */
    protected $_payment_date;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Fee paid for Session 
     */
    protected $_session;
    
    /**
     * @column
     * @readwrite
     * @type integer
     * @length 100
     * @index
     * 
     * @label Late Penalty
     */
    protected $_late_fee;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Fee Reciept Number
     */
    protected $_fee_reciept;

}
