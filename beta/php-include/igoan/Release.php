<?php
/* $Id: Release.php,v 1.4 2003/11/11 14:54:15 frediz Exp $ */
/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */

/**
 * Table Definition for release
 */
require_once 'DB/DataObject_Igoan.php';

class DO_Release extends DB_DataObject_Igoan
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table = 'release';                         // table name
    var $id_rel;                          // int4(4)  not_null default_nextval("release_id_rel_seq"::text) unique primary
    var $version;                         // varchar(-1)  not_null
    var $date_rel;                        // date(4)  not_null
    var $status;                          // int4(4)  not_null default_0
    var $nb_proj;                         // int4(4)  not_null default_0
    var $changes;                         // varchar(-1)  default_
    var $download;                        // varchar(-1)  default_
    var $valid_rel;                       // int2(2)  not_null default_0
    var $id_branch;                       // int4(4)  
    var $id_lic;                          // int4(4)  

    /* ZE2 compatibility trick*/
    function __clone() { return $this;}

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Release',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

function release_get_all_by_branch_id($id_branch)
{   
    $release = new DO_Release;
    $release->setId_branch($id_branch);
    $release->selectAdd();
    $release->selectAdd('id_rel');
    $release->find();
    return ($release->fetchToArray());
}

function release_get_by_id($id_rel)
{
    $release = new DO_Release;
    $release->setId_rel($id_rel);
    // $release->selectAdd();
    // $release->selectAdd('version,date_rel,status,nb_proj,changes,download,valid_rel,id_branch,id_lic FROM release');
    if ($release->find() != 1) {
        return (0);
    } else {
        $release->fetch();
        $rel = new DO_Project;
        $rel->setId_rel($release->getId_rel());
        $rel->setVersion($release->getVersion());
        $rel->setDate_rel($release->getDate_rel());
        $rel->setStatus($release->getStatus());
        $rel->setNb_proj($release->getNb_proj());
        $rel->setChanges($release->getChanges());
        $rel->setDownload($release->getDownload());
        $rel->setValid_rel($release->getValid_rel());
        return ($rel);
    }

}
}
?>
