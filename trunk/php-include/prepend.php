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

	ini_set('session.use_cookies', 1);
	
	define ('IGOAN_SECTION_PATH', dirname(__FILE__) . '/sections/');
	define ('IGOAN_SMARTY_PATH',  dirname(__FILE__) . '/smarty/');
	define('SMARTY_DIR', "/home/cam/public_html/igoan/www/Smarty/");
	
	require_once dirname(__FILE__) . '/helpers/stripslashes.php';
	require_once dirname(__FILE__) . '/helpers/usersession.php';
	require_once dirname(__FILE__) . '/helpers/divers.fct.php';
	require_once dirname(__FILE__) . '/helpers/error.fct.php';
	require_once dirname(__FILE__) . '/config/db.php';
	require_once dirname(__FILE__) . '/config/smarty.php';
	require_once dirname(__FILE__) . '/db/Igoandb.class.php';
	$igoandb = new Igoandb();
?>
