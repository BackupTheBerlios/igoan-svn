<?php /* $Id: cats.php,v 1.4 2003/12/07 03:33:13 cam Exp $ */ ?>
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
<h2>Gestion des catégories</h2>

<?php flush_errors(); ?>

<h3>Ajout d'une categorie</h3>

<form>
Nom de la catégorie : <input type="text" name="nom" /><br />
Sélectionnez une sous-catégorie : <?= $select2 ?>
<option selected='selected' value=''>TOP-LEVEL</option></select>
<input type='submit' value='Ajouter' name='action' />
</form>

<h3>Suppression d'une categorie</h3>
<h5>Attention toutes les catégories enfants seront automatiquement supprimées</h5>

<form>
Selectionnez la categorie à effacer : <?= $select ?></select>
<input type='submit' value='Effacer' name='action' />
</form>

<hr />
<a href="/admin/">Retour au menu</a>
