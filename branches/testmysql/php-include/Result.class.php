<?php
#
# Copyright (c) 2003-2004 Igoan.
# Please see the file CREDITS supplied with Igoan to see the full list
# of copyright holders.
#
# $Id: Result.class.php,v 1.1.1.1 2004/12/30 22:26:27 cam Exp $
#
# This file is part of the Igoan project.
#
# Igoan is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation in the version 2 of the License.
#
# Igoan is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.	See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with Igoan; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
?>
<?php

class Result
{
	protected $result;

	function __construct($result)
	{
		$this->result = $result;
	}
	function numRows()
	{
		if (IFPG) return pg_num_rows($this->result);
		if (IFMY) return mysql_num_rows($this->result);
	}
	function numCols()
	{
		if (IFPG) return pg_num_fields($this->result);
		if (IFMY) return mysql_num_fields($this->result);
	}
	function fetchRow()
	{
		if (IFPG) return pg_fetch_row($this->result);
		if (IFMY) return mysql_fetch_row($this->result);
	}
	function fetchOne()
	{
		if (IFPG) return pg_fetch_result($this->result, 0, 0);
		if (IFMY) return mysql_result($this->result, 0);
	}
}
