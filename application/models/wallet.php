<?php

/**
 * The SecureWallet database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Wallet extends Shared\Model {

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_user_type;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_user_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 200
     * @index
     * 
     * @validate required
     * @label password
     */
    protected $_password;

    
    /**
     * @column
     * @readwrite
     * @type text
     * 
     * @label access_token
     */
    protected $_access_token;

    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_login_count;
    
    
}
