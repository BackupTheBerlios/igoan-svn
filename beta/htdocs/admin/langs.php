<?php
  /* $Header: /cvsroot/igoan/beta/htdocs/admin/langs.php,v 1.3 2003/12/07 03:33:13 cam Exp $ */

require_once 'igoan/User.class.php';
require_once 'igoan/Language.class.php';

// permission de l'user (admin global)
$me = user_get_by_id($_SESSION['id']);
if (!$me || !$me->is_global_admin()) {
	append_error_exit('Permission denied: global admin flag required');
}

/* ajout */
if (isset($_GET['action']) && ($_GET['action'] == "Ajouter") && isset($_GET['nom'])) {
  append_error('inserting language: '.$_GET['nom']);
  if (language_new($_GET['nom']) == -1) {
    append_error('error');
  }
}

/* suppression */
if (isset($_GET['action']) && ($_GET['action'] == "Effacer") && isset($_GET['idLang'])) {
  append_error('deleting language: '.$_GET['idLang']);
  $lang = language_get_by_id($_GET['idLang']);
  $lang->delete();
}

/* recuperation de la liste */
$list = language_list();
$select = "<select name='idLang'>\n";
while (list(,$tuple) = each ($list)) {
  $select .= "<option value='".$tuple[0]."'>".$tuple[0]." ".$tuple[1]."</option>\n";
}


?>
<h2>Gestion des langages de prog</h2>

<?php flush_errors(); ?>

<h3>Ajout d'un langage</h3>

<form>
Nom : <input type="text" name="nom" /><br />
<input type='submit' value='Ajouter' name='action' />
</form>

<h3>Suppression d'un langage</h3>

<form>
Selectionnez le langage a effacer : <?= $select ?></select>
<input type='submit' value='Effacer' name='action' />
</form>

<hr />
<a href="/admin/">Retour au menu</a>
