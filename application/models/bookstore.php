<?php

/**
 * The Books List database Model
 *
 * @author Meraj Ahmad Siddiqui
 */
class BookStore extends Shared\Model {
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label User Book Title
     */
    protected $_title;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 10
     * @index
     * 
     * @validate required, max(100)
     * @label Edition
     */
    protected $_edition;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Publication
     */
    protected $_publication;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Books Category
     */
    protected $_category;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * 
     * @label Sub Category
     */
    protected $_sub_category;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 5
     * @index
     * 
     * @validate required, max(100)
     * @label Total Stock
     */
    protected $_stock;

    /**
     * @column
     * @readwrite
     * @type integer
     * @length 10
     * @index
     * 
     * @label Cost of Book
     */
    protected $_cost;
}
