<?php /* $Id: projects.php,v 1.2 2003/12/06 21:49:49 cam Exp $ */ ?>
<?php

require_once 'igoan/User.class.php';
require_once 'igoan/Project.class.php';

$me = user_get_by_id($_SESSION['id']);
if (!$me)
	append_error_exit('User ID inexistent.');

if (!$me->is_global_admin()) {
	append_error_exit('Permission denied: global admin flag required');
}
?>
<h1>Gestion des projets</h1>

<p>
Voici la liste complète des projets.
</p>

<?php
$projs = project_get_all();

if (!count($projs)) {
	echo '<p><em>Il n\'y a pas de projet dans la base actuellement.</em></p>';
} else {
	echo '<table><tr><th>id_prj</th><th>name_prj</th><th>shortname</th><th>homepage</th><th>date_prj</th><th>description</th></tr>';
	foreach ($projs as $id_prj) {
		$prj = project_get_by_id($id_prj);
		echo '<tr><td>'.$id_prj.'</td><td>'.$prj->get_name_prj().'</td><td>'.$prj->get_shortname().'</td><td>'.$prj->get_url_prj().'</td><td>'.$prj->get_date_prj().'</td><td>'.$prj->get_desc_prj().'</td></tr>';
		$admins = $prj->list_admins();
		echo "poof";
		foreach ($admins as $id_adm) {
			$adm = user_get_by_id($id_adm);
			echo '<tr><th>Admin</th><td colspan="5">'.$adm->get_name_user().'</td></tr>';
		}
	}
	echo '</table>';
}
?>
