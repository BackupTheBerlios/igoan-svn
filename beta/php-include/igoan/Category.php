<?php
/* $Id: Category.php,v 1.4 2003/11/11 14:54:15 frediz Exp $ */
/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */

/**
 * Table Definition for category
 */
require_once 'DB/DataObject_Igoan.php';

class DO_Category extends DB_DataObject_Igoan
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table = 'category';                        // table name
    var $id_cat;                          // int4(4)  not_null default_nextval("category_id_cat_seq"::text) unique primary
    var $name_cat;                        // varchar(-1)  not_null unique
    var $index;                           // varchar(-1)  default_
    var $parent;                          // int4(4)  
    var $valid_cat;                       // int2(2)  not_null default_0

    /* ZE2 compatibility trick*/
    function __clone() { return $this;}

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Category',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

}
?>
