<?php
/* $Id: Maintainer.php,v 1.3 2003/11/11 14:54:15 frediz Exp $ */
/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */

/**
 * Table Definition for maintainer
 */
require_once 'DB/DataObject.php';

class DO_Maintainer extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table = 'maintainer';                      // table name
    var $id_branch;                       // int4(4)  not_null unique primary multiple_key
    var $id_user;                         // int4(4)  not_null unique primary multiple_key

    /* ZE2 compatibility trick*/
    function __clone() { return $this;}

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Maintainer',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
?>
