<?php /* $Id: index.php,v 1.4 2003/12/07 03:33:13 cam Exp $ */ ?>
<?php

require_once 'igoan/User.class.php';

// permission de l'user (admin global)
$me = user_get_by_id($_SESSION['id']);
if (!$me || !$me->is_global_admin()) {
	append_error_exit('Permission denied: global admin flag required');
}
?>
<h2>IGOAdmiN</h2>

<ul>
<li><a href="/admin/cats.php">Gestion des categories</a></li>
<li><a href="/admin/plats.php">Gestion des plateformes</a></li>
<li><a href="/admin/langs.php">Gestion des langages de prog</a></li>
<li><a href="/admin/licenses.php">Gestion des licences</a></li>
</ul>
