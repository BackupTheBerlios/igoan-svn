<?php /* $Header: /cvsroot/igoan/beta/php-include/igoan/Platform.class.php,v 1.3 2004/01/05 00:41:45 cam Exp $ */ ?>
<?php

require_once 'PEAR.php';

class Platform extends PEAR {
	// private
	var $_id_pf;
	var $_name_pf;
	var $_valid_pf;

	function Platform()
	{
		$this->PEAR();
	}

	// public
	function set_id_pf($id)
	{
		$this->_id_pf = int($id);
	}
	function get_id_pf()
	{
		return ($this->_id_pf);
	}
	function set_name_pf($name)
	{
		$this->_name_pf = $name;
	}
	function get_name_pf()
	{
		return ($this->_name_pf);
	}
	function set_valid_pf($valid)
	{
		$this->_valid_pf = (bool)$valid;
	}
	function get_valid_pf()
	{
		return ((bool)$this->_valid_pf);
	}
	function delete()
	{
		sql_do('DELETE FROM platforms WHERE id_pf=\''.int($this->get_id_pf()).'\'');
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

function platform_get_by_id($id)
{
	$result = sql_do('SELECT id_pf,name_pf,valid_pf FROM platforms WHERE id_pf=\''.int($id).'\'');

	if ($result->numRows() != 1) {
		return (0);
	}
	$row = $result->fetchRow();
	$pf = new Platform;
	$pf->set_id_pf($row[0]);
	$pf->set_name_pf($row[1]);
	$pf->set_valid_pf($row[2]);

	return ($pf);
}

function platform_new($nom)
{
	$id_pf = pick_id('platforms_id_pf_seq');
	$result = sql_do('INSERT INTO platforms (id_pf,name_pf) VALUES ('.int($id_pf).',\''.int($nom).'\')');
	return (is_a($result, 'DB-Error') ? 0 : $id_pf;
}

function platform_list()
{
	return get_array_by_query("SELECT id_pf,name_pf FROM platforms ORDER BY name_pf");
}
