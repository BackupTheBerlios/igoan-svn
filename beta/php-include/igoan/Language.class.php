<?php /* $Header: /cvsroot/igoan/beta/php-include/igoan/Language.class.php,v 1.3 2004/01/05 00:41:45 cam Exp $ */ ?>
<?php

require_once 'PEAR.php';

class Language extends PEAR {
	// private
	var $_id_lang;
	var $_name_lang;
	var $_valid_lang;

	function Language()
	{
		$this->PEAR();
	}

	// public
	function set_id_lang($id)
	{
		$this->_id_lang = int($id);
	}
	function get_id_lang()
	{
		return ($this->_id_lang);
	}
	function set_name_lang($name)
	{
		$this->_name_lang = $name;
	}
	function get_name_lang()
	{
		return ($this->_name_lang);
	}
	function set_valid_lang($valid)
	{
		$this->_valid_lang = (bool)$valid;
	}
	function get_valid_lang()
	{
		return ((bool)$this->_valid_lang);
	}
	function delete()
	{
		sql_do('DELETE FROM languages WHERE id_lang=\''.int($this->get_id_lang()).'\'');
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

function language_get_by_id($id)
{
	$result = sql_do('SELECT id_lang,name_lang,valid_lang FROM languages WHERE id_lang=\''.int($id).'\'');

	if ($result->numRows() != 1) {
		return (0);
	}
	$row = $result->fetchRow();
	$lang = new Language;
	$lang->set_id_lang($row[0]);
	$lang->set_name_lang($row[1]);
	$lang->set_valid_lang($row[2]);

	return ($lang);
}

function language_new($nom)
{
	$id_lang = pick_id('languages_id_lang_seq');
	$result = sql_do('INSERT INTO languages (id_lang,name_lang) VALUES ('.int($id_lang).',\''.str($nom).'\')');
	return (is_a($result, 'DB-Error') ? 0 : $id_lang;
}

function language_list()
{
	return get_array_by_query('SELECT id_lang,name_lang FROM languages ORDER BY name_lang');
}
