<?php
#
# Copyright (c) 2003-2005 Igoan.
# Please see the file CREDITS supplied with Igoan to see the full list
# of copyright holders.
#
# $Id: prepend.php,v 1.1.1.1 2004/12/30 21:48:40 cam Exp $
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

if (get_magic_quotes_gpc())
{
	foreach($_GET as $k => $v)
	{
		if (is_array($v))
			continue;
		$_GET[$k] = stripslashes($v);
	}
    
	foreach($_POST as $k => $v)
	{
		if (is_array($v))
			continue;
		$_POST[$k] = stripslashes($v);
	}
	
	foreach($_COOKIE as $k => $v)
	{
		if (is_array($v))
			continue;
		$_COOKIE[$k] = stripslashes($v);
	}
}

?>