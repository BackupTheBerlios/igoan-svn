<?php /* $Header: /cvsroot/igoan/beta/php-include/error.fct.php,v 1.4 2003/12/08 00:44:55 cam Exp $ */ ?>
<?php

require_once 'PEAR.php';

function errors() {
	return (isset($_SESSION['error']) && !empty($_SESSION['error']));
}
function flush_errors($show_div = 1) {
	if (errors()) {
		if ($show_div)
			echo '<div class="abstract error">	';
	?>
	<p>
			There is a problem, please correct these issues:
		</p>
		<ol><?php
		echo $_SESSION['error']; ?>
		</ol>
		<?php
		if ($show_div)
			echo '</div>';
		$_SESSION['error'] = '';
	}
}
function append_error($str) {
	if (!empty($str)) {
		$_SESSION['error'] .= '<li><strong>'.$str.'</strong></li>';
	}
}
function flush_errors_exit() {
/*	flush_errors();
	if ($_SESSION['id'] != 0) {
		echo '<a href="/user/view_user.php">Back to user configuration</a> || ';
	}
	echo '<a href="/">Back home</a>';
	exit; */
	include($_SERVER['DOCUMENT_ROOT'].'/error.php');
	exit;
}
function append_error_exit($str) {
	append_error($str);
	flush_errors_exit();
}


### Handling PHP errors
error_reporting(E_ALL);

// error handler function
function myErrorHandler($errno, $errstr, $errfile, $errline) {
  switch ($errno) {
  case E_ERROR:
    echo("<b>FATALIGOAN</b> [$errno] $errstr<br/>Fatal error in line ".$errline." of file ".$errfile.PHP_VERSION." (".PHP_OS.")<br/>Aborting...<br/>");
    break;
  case E_WARNING:
    append_error('Error: '.$errstr);
    break;
  case E_NOTICE:
    append_error('Warning: '.$errstr);
    break;
  default:
    echo "UnkownIGOAN error type: [$errno] $errstr<br>\n";
    break;
  }
}
set_error_handler("myErrorHandler");

### *Not* handling PEAR errors

PEAR::setErrorHandling(PEAR_ERROR_RETURN);

?>
