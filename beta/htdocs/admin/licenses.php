<?php
/* $Header: /cvsroot/igoan/beta/htdocs/admin/licenses.php,v 1.3 2003/12/07 03:33:13 cam Exp $ */

require_once 'igoan/User.class.php';
require_once 'igoan/License.class.php';

// permission de l'user (admin global)
$me = user_get_by_id($_SESSION['id']);
if (!$me || !$me->is_global_admin()) {
	append_error_exit('Permission denied: global admin flag required');
}

/* ajout */
if (isset($_GET['action']) && ($_GET['action'] == "Ajouter") && isset($_GET['nom']) && isset($_GET['url'])) {
  append_error('inserting license: '.$_GET['nom']);
  if (license_new($_GET['nom'], $_GET['url']) == -1) {
    append_error('error');
  }
}

/* suppression */
if (isset($_GET['action']) && ($_GET['action'] == "Effacer") && isset($_GET['idLic'])) {
  append_error('deleting license: '.$_GET['idLic']);
  $lic = license_get_by_id($_GET['idLic']);
  $lic->delete();
}

/* recuperation de la liste */
$list = license_list();
$select = "<select name='idLic'>\n";
while (list(,$tuple) = each ($list)) {
  $select .= "<option value='".$tuple[0]."'>".$tuple[0]." ".$tuple[1]." (".$tuple[2].")</option>\n";
}

?>
<h2>Gestion des licences</h2>

<?php flush_errors(); ?>

<h3>Ajout d'une licence</h3>

<form>
Nom : <input type="text" name="nom" /><br />
URL des termes : <input type="text" name="url" />
<input type='submit' value='Ajouter' name='action' />
</form>

<h3>Suppression d'une licence</h3>

<form>
Selectionnez la licence a effacer : <?= $select ?></select>
<input type='submit' value='Effacer' name='action' />
</form>

<hr />
<a href="/admin/">Retour au menu</a>
