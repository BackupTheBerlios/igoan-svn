<?php /* $Header: /cvsroot/igoan/beta/php-include/igoan/License.class.php,v 1.3 2004/01/05 00:41:45 cam Exp $ */ ?>
<?php

require_once 'PEAR.php';

class License extends PEAR {
	// private
	var $_id_lic;
	var $_name_lic;
	var $_valid_lic;

	function License()
	{
		$this->PEAR();
	}

	// public
	function set_id_lic($id)
	{
		$this->_id_lic = int($id);
	}
	function get_id_lic()
	{
		return ($this->_id_lic);
	}
	function set_name_lic($name)
	{
		$this->_name_lic = $name;
	}
	function get_name_lic()
	{
		return ($this->_name_lic);
	}
	function set_valid_lic($valid)
	{
		$this->_valid_lic = (bool)$valid;
	}
	function get_valid_lic()
	{
		return ((bool)$this->_valid_lic);
	}
	function delete()
	{
		sql_do('DELETE FROM licenses WHERE id_lic=\''.int($this->get_id_lic()).'\'');
	}
#  function dumpXML()
#  {
#    $xml = "<!-- THIS FILE IS AUTO-GENERATED. PLEASE DO NOT EDIT IT BY HAND -->\n\n<".$this->is."s>\n";
#
#    $list = $this->listAll();
#    
#    while (list(,$tuple) = each ($list)) {
#      print_r($tuple);
#      $xml .= "<".$this->is." id='".$tuple[0]."' name='".$tuple[1]."'";
#      for ($i=0; $i<count($this->options); $i++) {
#	$xml .= " ".$this->options[$i]."='".$tuple[$i+2]."'";
#      }
#      $xml .= "/>\n";
#    }
#    
#    return ($xml . "</".$this->is."s>\n");
#  }
}

function license_get_by_id($id)
{
	$result = sql_do('SELECT id_lic,name_lic,valid_lic FROM licenses WHERE id_lic=\''.int($id).'\'');

	if ($result->numRows() != 1) {
		return (0);
	}
	$row = $result->fetchRow();
	$lic = new License;
	$lic->set_id_lic($row[0]);
	$lic->set_name_lic($row[1]);
	$lic->set_valid_lic($row[2]);

	return ($lic);
}

function license_new($nom, $term)
{
	$id_lic = pick_id('licenses_id_lic_seq');
	return (is_a(sql_do('INSERT INTO licenses (id_lic,name_lic,terms) VALUES (\''.int($id_lic).'\',\''.str($nom).'\',\''.str($term).'\')'), 'DB-Error') ? 0 : $id_lic);
}

function license_list()
{
	return get_array_by_query('SELECT id_lic,name_lic,terms FROM licenses ORDER BY name_lic');
}
