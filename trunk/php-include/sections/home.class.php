<?php
#
# Copyright (c) 2003-2005 Igoan.
# Please see the file CREDITS supplied with Igoan to see the full list
# of copyright holders.
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
	require_once IGOAN_SECTION_PATH . 'section.class.php';
	
	class HomeSection extends Section
	{
		function __construct($argv)
		{
			global $smarty;
			
			/*
			$projets = new ProjectList(); # la on dit que ca sqlise pour chopper les projets, et que ca remplit un tableau dans cet objet
			$array = $projets->getList(); # la ca retourne un tableau
			$smarty->assign_by_ref('tab', $array);
			*/

			// on assigne des trucs à la main pour développer le template smarty
			$logged = 'no';
			$smarty->assign_by_ref('logged', $logged);
			$view_user_name = 'Camille Huot';
			$smarty->assign_by_ref('view_user_name', $view_user_name);
			$view_user_id =  '1';
			$smarty->assign_by_ref('view_user_id', $view_user_id);
			$view_user_date = '2005-03-12 23:43:29';
			$smarty->assign_by_ref('view_user_date', $view_user_date);
			$view_user_desc = '';
			$smarty->assign_by_ref('view_user_desc', $view_user_desc);
			$view_user_projects = array(array('Igoan the Free directory', 1, '-', '-'));
			$smarty->assign_by_ref('view_user_projects', $view_user_projects);

			$this->_template = $smarty->fetch('view_user.tpl');
		}
	}
?>
