<?php
/* $Id: License.php,v 1.3 2003/11/11 14:54:15 frediz Exp $ */
/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */

/**
 * Table Definition for license
 */
require_once 'DB/DataObject.php';

class DO_License extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table = 'license';                         // table name
    var $id_lic;                          // int4(4)  not_null default_nextval("license_id_lic_seq"::text) unique primary
    var $name_lic;                        // varchar(-1)  not_null unique
    var $terms;                           // varchar(-1)  not_null
    var $valid_lic;                       // int2(2)  not_null default_0

    /* ZE2 compatibility trick*/
    function __clone() { return $this;}

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_License',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
?>
