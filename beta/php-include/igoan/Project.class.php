<?php /* $Header: /cvsroot/igoan/beta/php-include/igoan/Project.class.php,v 1.7 2004/01/05 00:41:45 cam Exp $ */ ?>
<?php

require_once 'PEAR.php';

class Project extends PEAR
{
	// private
	var $_id_prj;
	var $_name_prj;
	var $_url_prj;
	var $_desc_prj;
	var $_screenshot;
	var $_shortname;
	var $_date_prj;
	var $_valid_prj;
	var $_default_branch;
	var $_owner;
	function Project()
	{
		$this->PEAR();
	}

	// public
	function set_id_prj($id)
	{
		$this->_id_prj = int($id);
	}
	function get_id_prj()
	{
		return ($this->_id_prj);
	}
	function set_name_prj($prj)
	{
		if (!empty($prj)) {
			$this->_name_prj = $prj;
		}
	}
	function get_name_prj()
	{
		return ($this->_name_prj);
	}
	function set_url_prj($homepage)
	{
		$this->_url_prj = $homepage;
	}
	function get_url_prj()
	{
		return ($this->_url_prj);
	}
	function set_desc_prj($desc)
	{
		$this->_desc_prj = $desc;
	}
	function get_desc_prj()
	{
		return ($this->_desc_prj);
	}
	function set_screenshot($ss)
	{
		$this->_screenshot = $ss;
	}
	function get_screenshot()
	{
		return ($this->_screenshot);
	}
	function set_shortname($sn)
	{
		if (!empty($sn))
			$this->_shortname = $sn;
	}
	function get_shortname()
	{
		return ($this->_shortname);
	}
	function set_date_prj($date)
	{
		# FIXME: une meilleure verification de la date pour eviter une erreur de postgres
		if (!empty($date)) 
			$this->_date_prj = $date;
	}
	function get_date_prj()
	{
		return ($this->_date_prj);
	}
	function set_valid_prj($valid)
	{
		$this->_valid_prj = (bool)$valid;
	}
	function get_valid_prj()
	{
		return ($this->valid_prj);
	}
	function set_default_branch($id_branch)
	{
		$this->_default_branch = int($id_branch);
	}
	function get_default_branch()
	{
		return ($this->_default_branch);
	}
	function set_owner($owner)
	{
	  $this->_owner = str($owner);
	}
	function get_owner()
	{
	  return ($this->_owner);
	}
	function validate()
	{
		if (!$this->get_valid_prj()) {
			sql_do('UPDATE projects SET valid_prj=\'1\' WHERE id_prj=\''.int($this->get_id_prj()).'\'');
			$this->set_valid_prj(1);
		}
	}
	// FIXME: owner not implemented
	function write()
	{
		sql_do('UPDATE projects SET name_prj=\''.str($this->get_name_prj()).'\',url_prj=\''.str($this->get_url_prj()).
			'\',desc_prj=\''.str($this->get_desc_prj()).'\',screenshot=\''.str($this->get_screenshot()).
			'\',default_branch=\''.int($this->get_default_branch()).'\' WHERE id_prj=\''.int($this->get_id_prj()).'\'');
		$this->validate();
	}
	function add_admin($id_user, $owner = 0)
	{
		sql_do('INSERT INTO admins (id_user,id_prj,is_owner) VALUES (\''.int($id_user).'\',\''.int($this->get_id_prj()).'\',\''.int($owner).'\')');
	}
	function del_admin($id_user)
	{
		sql_do('DELETE FROM admins WHERE id_prj=\''.int($this->get_id_prj()).'\' AND id_user=\''.int($id_user).'\'');
	}
	function is_admin($id_user) {
		$result = sql_do('SELECT id_user FROM admins WHERE id_prj=\''.int($this->get_id_prj()).'\' AND id_user=\''.int($id_user).'\'');
		return ($result->numRows() == 1);
	}
	function list_authors()
	{
		return get_array_by_query('SELECT distinct(id_user) FROM authors JOIN releases USING (id_rel) JOIN branches USING(id_branch) WHERE id_prj=\''.int($this->get_id_prj()).'\'');
	}
	function list_platforms()
	{
		return get_array_by_query('SELECT distinct(id_pf) FROM runson JOIN releases USING (id_rel) JOIN branches USING(id_branch) WHERE id_prj=\''.int($this->get_id_prj()).'\'');
	}
	function list_languages()
	{
		return get_array_by_query('SELECT distinct(id_lang) FROM written JOIN releases USING (id_rel) JOIN branches USING(id_branch) WHERE id_prj=\''.int($this->get_id_prj()).'\'');
	}
	function list_categories()
	{
		return get_array_by_query('SELECT distinct(id_cat) FROM belongsto JOIN releases USING (id_rel) JOIN branches USING(id_branch) WHERE id_prj=\''.int($this->get_id_prj()).'\'');
	}
	function list_admins()
	{
		return (get_array_by_query('SELECT id_user,is_owner FROM admins WHERE id_prj=\''.int($this->get_id_prj()).'\''));
	}
	function list_maintainers()
	{
		return (get_array_by_query('SELECT distinct(id_user) FROM branches USING(id_branch) WHERE id_prj=\''.int($this->get_id_prj()).'\''));
	}
	function list_branches($id_branch=0)
	{
		return (get_array_by_query('SELECT id_branch FROM branches WHERE id_prj=\''.int($this->get_id_prj()).'\' AND id_branch<>'.int($id_branch)));
	}
	function get_last_release()
	{
	  $result = sql_do('select id_rel from releases join branches using (id_branch) join projects using (id_prj) where id_branch=default_branch and id_prj=\''.int($this->get_id_prj()).'\' order by date_rel desc limit 1');
	  if ($result->numRows() == 0)
	    return (0);
	  else {
	    $row = $result->fetchRow();
	    return ($row[0]);
	  }
	}
}

function project_get_by_id($id_prj)
{
	$result = sql_do('SELECT id_prj,name_prj,url_prj,desc_prj,screenshot,shortname,date_prj,valid_prj,default_branch FROM projects WHERE id_prj=\''.int($id_prj).'\'');
	if ($result->numRows() != 1) {
		return (0);
	}
	$row = $result->fetchRow();
	$prj = new Project;
	$prj->set_id_prj($row[0]);
	$prj->set_name_prj($row[1]);
	$prj->set_url_prj($row[2]);
	$prj->set_desc_prj($row[3]);
	$prj->set_screenshot($row[4]);
	$prj->set_shortname($row[5]);
	$prj->set_date_prj($row[6]);
	$prj->set_valid_prj($row[7]);
	$prj->set_default_branch($row[8]);
	// FIXME:
	$prj->set_owner(-1);

	return ($prj);
}

// FIXME: owner not implemented
function project_new($name_prj, $shortname, $description, $homepage)
{
	$result = sql_do('SELECT id_prj FROM projects WHERE shortname=\''.str($shortname).'\'');
	if ($result->numRows()) {
		append_error("Shortname '$shortname' already taken.");
		return (0);
	}

	$id_prj = pick_id('projects_id_prj_seq');

	$result = sql_do('INSERT INTO projects (id_prj,name_prj,shortname,desc_prj,url_prj,date_prj,valid_prj) VALUES (\''.int($id_prj).'\',\''.str($name_prj).'\',\''.str($shortname).'\',\''.str($description).'\',\''.str($homepage).'\',\''.date('Y-m-d H:i:s').'\',0)');
	if (is_a($result, 'DB-Error')) {
		//append_error("Unknown error executing [$sql].");
		return (0);
	}
	return ($id_prj);
}

function project_get_all($valid = -1)
{
	return (get_array_by_query('SELECT id_prj FROM projects'.(($valid != -1) ? (' WHERE valid_user=\''.(bool)$valid.'\'') : '')));
}

?>
