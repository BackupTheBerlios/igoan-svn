<?php
/* $Id: DataObject_Igoan.php,v 1.7 2003/11/11 20:44:30 frediz Exp $ */
/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */


/**
 * Object Based Database Query Builder and data store
 * with some personnal optimization by frediz -hope it works-
 *
 * frediz@igoan.org
 *
 * @package  DB_DataObject
 * @category DB
 *
 */

/**
 * Needed classes
 */
require_once 'DB/DataObject.php';


/**
 *  This class aims to avoid unecessary connections to the database
 */
Class DataObject_Igoan extends DB_DataObject
{
    /* =========================================================== */
    /*  Public methods overidden for more efficient connectivity */
    /* =========================================================== */
    function fetch()
    {
        global $_DB_DATAOBJECT;

        if (empty($_DB_DATAOBJECT['CONFIG'])) {
            DB_DataObject::_loadConfig();
        }
        if (!@$this->N) {
	    //fred
	    $this->_disconnect();
	    //fred/
            DB_DataObject::raiseError("fetch: No Data Available", DB_DATAOBJECT_ERROR_NODATA);
            return false;
        }
        $result = &$_DB_DATAOBJECT['RESULTS'][$this->_DB_resultid];
        $array = $result->fetchRow(DB_FETCHMODE_ASSOC);
        if (@$_DB_DATAOBJECT['CONFIG']['debug']) {
            $this->debug(serialize($array),"FETCH", 3);
        }

        if (!is_array($array)) {
            // this is probably end of data!!
	    //fred
            //$this->debug("Fetch DONE", "fetchrow");
	    $this->_disconnect();
	    //fred/
            //DB_DataObject::raiseError("fetch: no data returned", DB_DATAOBJECT_ERROR_NODATA);
            return false;
        }

	foreach($array as $k=>$v) {
            $kk = str_replace(".", "_", $k);
            $kk = str_replace(" ", "_", $kk);
             if (@$_DB_DATAOBJECT['CONFIG']['debug']) {
                $this->debug("$kk = ". $array[$k], "fetchrow LINE", 3);
            }
            $this->$kk = $array[$k];
        }
        if (!empty($this->_data_select)) {
            foreach(array('_join','_group_by','_order_by', '_having', '_limit','_condition') as $k) {
                $this->$k = '';
            }
            $this->_data_select = '*';
        }
        // set link flag
        $this->_link_loaded=false;
        if (@$_DB_DATAOBJECT['CONFIG']['debug']) {
            $this->debug("{$this->__table} DONE", "fetchrow");
        }

        return true;
    }

    function insert()
    {
       $result=parent::insert();
       $this->_disconnect();
       return $result;
    }

    /* =========================================================== */
    /*  Additional personnal convenient public methods :) */
    /* =========================================================== */
    function fetchToArray()
    {
       $results = array();
       while ($this->fetch()) {
         /* store the results in an array */
         //$results[] = $this->__clone(); //this also include a bunch of internal parameters...
         $results[] = $this->toArray();
       }
       return $results;
    }


    /* =========================================================== */
    /*  Major Private Methods - the core part!*/
    /* =========================================================== */

    /**
     * disconnects from database
     *
     * @access private
     * @return void
     */

    //fred
    function _disconnect()
    {
	global $_DB_DATAOBJECT;

        $_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]->disconnect();
        $this->debug(serialize($_DB_DATAOBJECT['CONNECTIONS']), "DISCONNECT",5);
	if($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]) unset($_DB_DATAOBJECT['CONNECTIONS'][$this->_database_dsn_md5]);
	// restore to defaults
	$this->_database='';
	$this->_database_dsn_md5='';

	return true;
    }
    //fred/

}

?>
