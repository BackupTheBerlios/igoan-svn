<?php /* $Id: users.php,v 1.1 2003/10/24 09:43:16 cam Exp $ */ ?>
<?php

require_once 'igoan/User.class';

$me = user_get_by_id($_SESSION['id']);
if (!$me)
	append_error_exit('User ID inexistent.');

if (!$me->is_global_admin()) {
	append_error_exit('Permission denied: global admin flag required');
}
?>
<h1>Gestion des users</h1>

<p>
Voici la liste complète des utilisateurs.
</p>

<?php
$users = user_get_all();

if (!count($users)) {
	echo '<p><em>Il n\'y a pas d\'utilisateur dans la base actuellement.</em></p>';
} else {
	echo '<table><tr><th>id_user</th><th>name_user</th><th>mail</th><th>url</th><th>login</th><th>passwd</th></tr>';
	foreach ($users as $user) {
		echo "<tr><td>{$user->id_user}</td><td>{$user->name_user}</td><td>{$user->mail}</td><td>{$user->url}</td><td>{$user->login}</td><td>{$user->passwd}</td></tr>";
	}
	echo '</table>';
}
?>
