<?php
/* $Id: Users.php,v 1.4 2003/11/11 14:54:15 frediz Exp $ */
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
