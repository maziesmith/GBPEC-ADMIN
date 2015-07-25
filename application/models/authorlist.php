<?php

/**
 * The Author List database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class AuthorList extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Author Name
     */
    protected $_author_name;

}
