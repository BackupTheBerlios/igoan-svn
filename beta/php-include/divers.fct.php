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

require_once 'DB.php';

class igoandb extends PEAR 
{
  var $db;
  var $dsn = '';

  function igoandb() 
  {
    $this->PEAR();
    include 'db.php';
  }
  function _igoandb()
  {
    if (is_a($this->db,'DB')) {
      $this->db(query('ROLLBACK'));
      $this->db->disconnect();
    }
    $this->_PEAR();
  }
  function connect() 
  {
    if (!is_a($this->db, 'DB')) {
      $this->db = DB::connect($this->dsn);
      if (DB::isError($this->db)) {
        append_error_exit($this->db->getMessage());
      }
    }
  }
  function query($sql)
  {
    $this->connect();
    $result = $this->db->query($sql);
    if (DB::isError($result)) {
      append_error_exit($result->getMessage().' ('.$result->getDebugInfo().')');
    }
    return ($result);
  }
}

$igoandb = new igoandb();

function http_redir($str) {
	header('Location: http://'.$_SERVER['SERVER_NAME'].$str);
	exit;
}

function get_array_by_query($sql) {
	global $igoandb;
	$tab = array();
	
	$result = $igoandb->query($sql);

	for ($i = 0; $i < $result->numRows(); $i++) {
		$row = $result->fetchRow();
		$alone = ($result->numCols() == 1);
		$tab[$i] = $alone
			? $row[0]
			: $row;
	}

	return ($tab);
}

function sql_do($sql) {
	global $igoandb;

	return ($igoandb->query($sql));
}

function pick_id($seq) {
	// FIXME: check $seq
	$result = sql_do('SELECT nextval(\''.$seq.'\')');
	if ($result->numRows() != 1) {
		append_error('Unable to fetch a fresh ID.');
		return (0);
	}
	$row = $result->fetchRow();
	return ($row[0]);
}

function int($int)
{
	return (intval($int));
}
function str($string)
{
	return addslashes($string);
}

?>
