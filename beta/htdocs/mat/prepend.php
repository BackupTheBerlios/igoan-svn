<?php /* $Id: prepend.php,v 1.4 2003/08/02 22:58:59 cam Exp $ */ ?>
<?php
error_reporting(E_ALL);
function errors() {
	return (isset($_SESSION['error']) && !empty($_SESSION['error']));
}
function flush_errors() {
	if (errors()) {
		echo '<strong>'.$_SESSION['error']."</strong>\n";
		$_SESSION['error'] = '';
	}
}
function append_error($str) {
	if (!empty($str)) {
		$_SESSION['error'] .= $str.'<br/>';
	}
}
function flush_errors_exit() {
	flush_errors();
	if ($_SESSION['id'] != 0) {
		echo '<a href="/user/view_user.php">Back to user configuration</a> || ';
	}
	echo '<a href="/">Back home</a>';
	exit;
}
function append_error_exit($str) {
	append_error($str);
	flush_errors_exit();
}
function http_redir($str) {
	header('Location: http://'.$_SERVER['SERVER_NAME'].$str);
	exit;
}
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['login']) || !isset($_SESSION['error'])) {
	$_SESSION['id'] = 0;
	$_SESSION['login'] = 'Anonymous';
	$_SESSION['error'] = '';
}
?>
