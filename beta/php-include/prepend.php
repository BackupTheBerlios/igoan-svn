<?php /* $Header: /cvsroot/igoan/beta/php-include/prepend.php,v 1.13 2003/12/08 00:44:55 cam Exp $ */ ?>
<?php

// stripslashing des arguments
if (!empty($_GET)) foreach ($_GET as $key => $value) {
	$_GET[$key] = stripslashes($value);
	if (substr($key, 0, 3) == "id_") {
		$_GET[$key] = (int)$value;
	}
}

// config PHP
ini_set('session.use_cookies', 1);
if (ereg("igoan.org", $_SERVER['SERVER_NAME'])) {
	ini_set('session.save_path', '/data/www/org/n/a/igoan.org/a/t/beta/tmp');
}

// sessions
session_start();
if (!isset($_SESSION['id']))
	$_SESSION['id'] = 0;
if (!isset($_SESSION['error']))
	$_SESSION['error'] = '';

require_once 'error.fct.php';
require_once 'layout.fct.php';
require_once 'divers.fct.php';
?>
