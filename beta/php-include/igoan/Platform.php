<?php
/* $Id: Platform.php,v 1.3 2003/11/11 14:54:15 frediz Exp $ */
/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */

/**
 * Table Definition for platform
 */
require_once 'DB/DataObject.php';

class DO_Platform extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table = 'platform';                        // table name
    var $id_pf;                           // int4(4)  not_null default_nextval("platform_id_pf_seq"::text) unique primary
    var $name_pf;                         // varchar(-1)  not_null unique
    var $valid_pf;                        // int2(2)  not_null default_0

    /* ZE2 compatibility trick*/
    function __clone() { return $this;}

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Platform',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
?>
