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
	abstract class Section
	{
		protected $_body, $_template, $_title, $_class;
		
		public function generateBody()
		{
			global $smarty;
			
			$this->_body = $smarty->fetch($this->_template);
		}
		
		public function getBody()
		{
			if (empty($this->_body) && !empty($this->_template))
				$this->generateBody();
			return $this->_body;
		}
		
		public function getTitle()
		{
			if (!empty($this->_title))
				return $this->_title;
			else
				return 'Home';
		}
		
		public function getBodyClass()
		{
			if (!empty($this->_class))
				return $this->_class;
			else
				return 'section';
		}
	}
?>