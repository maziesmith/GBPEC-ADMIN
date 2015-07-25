 <?php

/**
 * The Book List database Model
 *
 * @author Meraj Ahmad Siddiqui
 */

class BookList extends Shared\Model
{
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Bank Name
     */
    protected $_book_id;
    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Access Number
     */
    protected $_accession_number;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label ISBN Number
     */
    protected $_isbn;
}
?>
