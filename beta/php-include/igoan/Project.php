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
 * Table Definition for project
 */
require_once 'DB/DataObject_Igoan.php';

include 'igoan/igoan_db.php';

class DO_Project extends DataObject_Igoan
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table = 'project';                         // table name
    var $id_prj;                          // int4(4)  not_null default_nextval("project_id_prj_seq"::text) unique primary
    var $name_prj;                        // varchar(-1)  not_null
    var $homepage;                        // varchar(-1)  default_
    var $description;                     // varchar(-1)  not_null
    var $screenshot;                      // varchar(-1)  default_
    var $shortname;                       // varchar(-1)  not_null unique
    var $date_prj;                        // date(4)  not_null
    var $valid_prj;                       // int2(2)  not_null default_0

    /* ZE2 compatibility trick*/
    function __clone() { return $this;}

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Project',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    /* Some setter functions redefinitions */

    // TODO put back parent::parentsetmethod() asa overload is available
    function setId_prj($id)                                                             
    {
         $cast = @(int)$id;
         if (is_integer($cast)) {
             $this->id_prj = $cast;
         }
    }
    function setName_prj($prj)
    {
         if (!empty($prj)) {
             $this->name_prj = $prj;
         }
    }
    function setShortname($sn)
    {
        if (!empty($sn))
            $this->shortname = $sn;
    }
    function setDate_prj($date)
    {
        # FIXME: une meilleure verification de la date pour eviter une erreur de postgres
        # IDEA: pear proposes some classes for email, url, date ... verification
        if (!empty($date))
            $this->date_prj = $date;
    }
    /* temporary stuff ... waiting for some fuckers to put overload in their todo list */
    function getName_prj()
    {
        return ($this->name_prj);
    }       
    /* End of temporary stuff */
    function makeValid()
    {
        $this->valid_prj = 1;
    }
    function makeInvalid()
    {
        $this->valid_prj = 0;
    }
/* validate() deprecated : DO uses it to commit changes for the class; use makevalid() instead
        function validate()
        {
                global $igoandb;

                $sql = "UPDATE project SET valid_prj='1' WHERE id_prj='{$this->id_prj}'";
                $igoandb->query($sql);
                $this->set_valid_prj();

                $this->update();
        }
*/
/* write() deprecated : DO provides validate() for this
        function write()
        {
                this->validate()

                $sql = "UPDATE project SET name_prj='{$this->name_prj}',homepage='{$this->homepage}',description='{$this->description}',screenshot='{$this->screenshot}' WHERE id_prj='{$this->id_prj}'";
                $igoandb->query($sql);
                $this->validate();
        }
*/


}
?>
