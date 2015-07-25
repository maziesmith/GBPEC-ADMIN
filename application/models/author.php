<?php

/**
 * The Author List database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class Author extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type integer
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Author Id
     */
    protected $_author_id;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Book Id
     */
    protected $_book_id;
   
}
