<?php
#
# Copyright (c) 2003-2004 Igoan.
# Please see the file CREDITS supplied with Igoan to see the full list
# of copyright holders.
#
# $Id$
#
# This file is part of the Igoan project.
#
# Igoan is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation in the version 2 of the License.
#
# Igoan is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with Igoan; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
?>
<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/**
 * Table Definition for branch
 */
require_once 'DB/DataObject_Igoan.php';

class DO_Branch extends DB_DataObject_Igoan
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table = 'branch';                          // table name
    var $id_branch;                       // int4(4)  not_null default_nextval("branch_id_branch_seq"::text) unique primary
    var $name_branch;                     // varchar(-1)  not_null
    var $id_prj;                          // int4(4)  not_null

    /* ZE2 compatibility trick*/
    function __clone() { return $this;}

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Branch',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
        
function branch_get_all_by_project_id($id_prj)
{
    $branch = new DO_Branch;
    $branch->setId_prj($id_prj);
    $branch->selectAdd();
    $branch->selectAdd('id_branch');
    $branch->find();
    return ($branch->fetchToArray());
}

function branch_get_by_id($id_branch)
{       
    $branch = new DO_Branch;
    $branch->setId_branch($id_branch);
    $branch->selectAdd();
    $branch->selectAdd('name_branch,id_branch');
    if ($branch->find() != 1) {
        return (0);
    } else {
        $branch->fetch();
        $rel = new DO_Project;
        $rel->setId_branch($branch->getId_branch());
        $rel->setId_prj($branch->getId_prj());
        return ($rel);
    }
}

?>
