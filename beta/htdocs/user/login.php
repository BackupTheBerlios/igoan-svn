<?php /* $Id: login.php,v 1.11 2004/01/04 21:50:20 cam Exp $ */ ?>
<?php

require_once 'igoan/User.class.php';

if (isset($_GET['login']) && isset($_GET['passwd'])) {

	$me = user_get_by_password($_GET['login'], $_GET['passwd']);
	if (!$me) {
		append_error('Login incorrect.');
	} else {
		$_SESSION['id'] = $me->get_id_user();
	}
	if (!errors()) {
		http_redir(empty($_GET['referer']) ? '/index.php' : $_GET['referer']);
	}
}

header_box('Igoan :: Login');
?>

<div id="main">
	<form class="admin" action="login.php">
	<?php flush_errors(); ?>
	<h2> Login </h2>
	<div class="description">
		<p style="margin-bottom: 1em;">
			Enter your login and password to continue.
		</p>
		<div class="block">
			<label for="username"> Login: </label>
			<input title="Your igoan user name." id="username" name="login" type="text" <?php if (!empty($_GET['login'])) echo 'value="'.$_GET['login'].'"'; ?> />
		</div>
		<div class="block">
			<label for="password"> Password: </label>
			<input title="Your igoan user password." id="password" name="passwd" type="password" />
		</div>
		<div class="block submit">
			<label for="submit"> Submit: </label>
			<input type="submit" id="submit" name="submit" value="Submit !" />
		</div>
	</div>
	</form>
</div><?php
footer_box();
?>
