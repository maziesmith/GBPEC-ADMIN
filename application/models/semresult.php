 <?php

/**
 * The Sem Results database Model
 *
 * @author Meraj Ahmad Siddiqui
 */

class SemResult extends Shared\Model
{
    /**
     * @column
     * @readwrite
     * @type integer
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Student ID
     */
    protected $_student_id;
    /**
     * @column
     * @readwrite
     * @type text
     * @length 10
     * @index
     * 
     * @validate required, max(10)
     * @label Semster Student had appeared
     */
    protected $_sem;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 100
     * @index
     * 
     * @validate required, max(100)
     * @label Total Marks in Percentage
     */
    protected $_marks;
}
?>
