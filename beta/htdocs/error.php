<?php /* $Id: error.php,v 1.5 2003/12/08 00:46:37 cam Exp $ */ ?>
<?php

// annule une eventuelle transaction en cours
require_once 'divers.fct.php';

$short = 'Fatal Error';
if (!empty($_GET['code'])) switch ($_GET['code']) {
case '404':
	$short = 'Error 404 : Not Found';
	$long = 'The page you requested does not exist.';
	break;
case '500':
	$short = 'Error 500 : Internal Server Error';
	$long = 'The server encountered an unexpected condition which prevented it from fulfilling the request.<br/>Please contact the <a href="mailto:www@igoan.org">webmaster</a>.';
	break;
default:
	$short = 'Error';
	$long = 'Your action has generated an error.';
}

header_box('Igoan :: '.$short);
?>
<div id="main">
	<div class="abstract error"><?php
	if (errors()) {
		flush_errors(0); ?>
		<p>
		Your action has generated a fatal error and had been stopped.
		</p><?php
	} else { ?>
		<h4><?php echo $short; ?></h4>
		<p><?php echo $long; ?></p>
		<?php
	} ?>
	<p>
	You can <script type="text/javascript">document.write('<a href="javascript:history.back()">browse back</a> or ');</script> go to
	the <a href="/index.php">main page</a>.
	</p>
	</div>
</div>

<?php
footer_box();
?>
