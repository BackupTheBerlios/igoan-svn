<?php
/* $Id: Belongsto.php,v 1.3 2003/11/11 14:54:15 frediz Exp $ */
/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */

/**
 * Table Definition for belongsto
 */
require_once 'DB/DataObject.php';

class DO_Belongsto extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table = 'belongsto';                       // table name
    var $id_rel;                          // int4(4)  not_null unique primary multiple_key
    var $id_cat;                          // int4(4)  not_null unique primary multiple_key

    /* ZE2 compatibility trick*/
    function __clone() { return $this;}

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Belongsto',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
?>
