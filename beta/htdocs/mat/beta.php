<?php /* $Id: index.php,v 1.3 2003/10/04 12:43:56 cam Exp $ */ ?>
<?php
error_reporting(E_ALL);
require_once 'user/verify_login.php';

// est-on logué ?
if ($_SESSION['id'] != 0) {
	echo '<a href="/user/view_user.php">My account</a>';
} else {
	echo '<a href="/user/login.php">Login</a> || ';
	echo '<a href="/user/new_user.php">Register</a>';
}
?>

<br/>
<br/>
<br/>
<?php flush_errors(); ?>
<br/>
<h2>Projects of the month:</h2>
<ul>
<li><a href="/project/view_project.php?idPrj=1">Igoan</a></li>
<li><a href="/project/view_project.php?idPrj=456789">GraphTool</a></li>
</ul>
