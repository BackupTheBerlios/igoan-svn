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
/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */

// this is the common configuration code - place in a general site wide include file.
// this  the code used to load and store DataObjects Configuration. 
  $options = &PEAR::getStaticProperty('DB_DataObject','options');

// the simple examples use parse_ini_file, which is fast and efficient.
// however you could as easily use wddx, xml or your own configuration array.
  $config = parse_ini_file('/data/www/org/n/a/igoan.org/a/t/beta/php-include/igoan/igoan_db.ini',TRUE);

// because PEAR::getstaticProperty was called with and & (get by reference)
// this will actually set the variable inside that method (a quasi static variable)
  $options = $config['DB_DataObject'];
?>
