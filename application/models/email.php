<?php

/**
 * The Email  List database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Email extends Shared\Model {
    
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
     * @label Domain Email ID
     */
    protected $_domain_email;
   
}
