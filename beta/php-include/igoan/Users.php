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
 * Table Definition for users
 */
require_once 'DB/DataObject.php';

class DO_Users extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table = 'users';                           // table name
    var $id_user;                         // int4(4)  not_null default_nextval("users_id_user_seq"::text) unique primary
    var $name_user;                       // varchar(-1)  not_null
    var $mail;                            // varchar(-1)  not_null unique
    var $url;                             // varchar(-1)  default_
    var $date_user;                       // date(4)  not_null
    var $valid_user;                      // int2(2)  not_null default_0
    var $login;                           // varchar(-1)  unique
    var $passwd;                          // varchar(-1)  

    /* ZE2 compatibility trick*/
    function __clone() { return $this;}

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DO_Users',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    function setId_user($id)
    {       
         $cast = @(int)$id;
         if (is_integer($cast)) {
             parent::setId_user($cast);
         }
    }                                                                                    
    function setName_user($user)
    {
         if (!empty($user)) {
             parent::setName_user($user);
         }
    }
    function set_mail($mail)
    {
        if (!empty($mail)) {
            $this->mail = $mail;
        }
    }
    function set_login($login)
    {
        // FIXME: une meilleure vérification, que diantre!
        if (!empty($login)) {
            $this->login = $login;
        }
    }
    function set_passwd($pass)
    {
        if (!empty($pass)) {
            $this->passwd = $pass;
        }
    }
    function set_date_user($date)
    {
        #FIXME: better verification!
        $this->date_user = $date;
    }



}



?>
