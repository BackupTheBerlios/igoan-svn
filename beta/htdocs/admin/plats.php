<?php /* $Header: /cvsroot/igoan/beta/htdocs/admin/plats.php,v 1.4 2003/12/07 03:33:13 cam Exp $ */ ?>
<?php

require_once 'igoan/User.class.php';
require_once 'igoan/Platform.class.php';

// permission de l'user (admin global)
$me = user_get_by_id($_SESSION['id']);
if (!$me || !$me->is_global_admin()) {
	append_error_exit('Permission denied: global admin flag required');
}

/* ajout */
if (isset($_GET['action']) && ($_GET['action'] == "Ajouter") && isset($_GET['nom'])) {
  append_error('inserting platform: '.$_GET['nom']);
  if (platform_new($_GET['nom']) == -1) {
    append_error('error');
  }
}

/* suppression */
if (isset($_GET['action']) && ($_GET['action'] == "Effacer") && isset($_GET['idPf'])) {
  append_error('deleting platform: '.$_GET['idPf']);
  $pf = platform_get_by_id($_GET['idPf']);
  $pf->delete();
}

/* recuperation de la liste */
$list = platform_list();
$select = "<select name='idPf'>\n";
while (list(,$tuple) = each ($list)) {
  $select .= "<option value='".$tuple[0]."'>".$tuple[0]." ".$tuple[1]."</option>\n";
}


?>
<h2>Gestion des plateformes</h2>

<?php flush_errors(); ?>

<h3>Ajout d'une plateforme</h3>

<form>
Nom : <input type="text" name="nom" /><br />
<input type='submit' value='Ajouter' name='action' />
</form>

<h3>Suppression d'une plateforme</h3>

<form>
Selectionnez la plateforme a effacer : <?= $select ?></select>
<input type='submit' value='Effacer' name='action' />
</form>

<a href="/admin/">Retour au menu</a>
