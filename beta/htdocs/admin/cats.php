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

require_once 'igoan/User.class.php';
require_once 'igoan/Category.class.php';

// permission de l'user (admin global)
$me = user_get_by_id($_SESSION['id']);
if (!$me || !$me->is_global_admin()) {
	append_error_exit('Permission denied: global admin flag required');
}

/* ajout d'une categorie */
if (isset($_GET['action']) && ($_GET['action'] == "Ajouter") && isset($_GET['index']) && isset($_GET['nom'])) {
  append_error("inserting category ".$_GET['nom']." (".$_GET['index'].')');
  if (category_new($_GET['index'], $_GET['nom']) == -1) {
    append_error('Error: parent category is full');
  }
}
/* suppression d'une categorie */
if (isset($_GET['action']) && ($_GET['action'] == "Effacer") && isset($_GET['idCat'])) {
  append_error("deleting category ".$_GET['idCat']);
  $cat = category_get_by_id($_GET['idCat']);
  if ($cat) $cat->delete();
}

/* recuperation de la liste */
$all_cats = category_list_all();
$select = "<select name='idCat'>\n";
$select2 = "<select name='index'>\n";
for ($i=0; $i<count($all_cats); $i++) {
  $select  .= "<option value='".$all_cats[$i][0]."'>".$all_cats[$i][1]." ".$all_cats[$i][2]."</option>\n";
  $select2 .= "<option value='".$all_cats[$i][1]."'>".$all_cats[$i][1]." ".$all_cats[$i][2]."</option>\n";
}

?>
<h2>Gestion des cat�gories</h2>

<?php flush_errors(); ?>

<h3>Ajout d'une categorie</h3>

<form>
Nom de la cat�gorie : <input type="text" name="nom" /><br />
S�lectionnez une sous-cat�gorie : <?= $select2 ?>
<option selected='selected' value=''>TOP-LEVEL</option></select>
<input type='submit' value='Ajouter' name='action' />
</form>

<h3>Suppression d'une categorie</h3>
<h5>Attention toutes les cat�gories enfants seront automatiquement supprim�es</h5>

<form>
Selectionnez la categorie � effacer : <?= $select ?></select>
<input type='submit' value='Effacer' name='action' />
</form>

<hr />
<a href="/admin/">Retour au menu</a>
