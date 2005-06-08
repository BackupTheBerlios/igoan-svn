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
	# we'll just display the homepage when PATH_INFO is not set
	if (!empty($_SERVER['PATH_INFO']))
		$argv = explode('/', substr($_SERVER['PATH_INFO'], 1));
	else
		$argv = array(0 => 'home');
	
	switch ($argv[0])
	{
		case 'home':
		default:
			require_once IGOAN_SECTION_PATH . 'home.class.php';
			$rubrique = new HomeSection($argv);
			break;
	}
	
	$smarty->assign_by_ref('rubrique', $rubrique);
	$smarty->display('index.tpl');
?>
