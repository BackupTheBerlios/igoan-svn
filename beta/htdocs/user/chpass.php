<?php /* $Id: chpass.php,v 1.7 2003/12/31 00:22:54 cam Exp $ */ ?>
<?php

require_once 'igoan/User.class.php';

if (isset($_GET['action']) &&
    ($_GET['action'] == 'Change Password') &&
    isset($_GET['oldpass']) &&
    isset($_GET['passwd1']) &&
    isset($_GET['passwd2'])) {

	$me = user_get_by_id($_SESSION['id']);
	if (!$me) {
		append_error_exit('User ID incorrect.');
	}

	// check the old password
	if ($_GET['oldpass'] != $me->passwd) {
		append_error('Wrong old password.');
	} 
	
	// check the new passwords
	else if ($_GET['passwd1'] != $_GET['passwd2']) {
		append_error('Passwords mismatch');
	} else if (empty($_GET['passwd1'])) {
		append_error('Aha. Yes of course ...');
	}

	if (errors()) {
		flush_errors();
	} else {
		// do the job
		$me->passwd = $_GET['passwd1'];
		$me->write();
		http_redir('/user/view.php');
	}
}


?>
<h1>Changing your user password</h1>
<form>
Please give your <strong>actual</strong> password first: <input type="password" name="oldpass" /><br />
Then your new password: <input type="password" name="passwd1" /><br />
Twice for verification: <input type="password" name="passwd2" /><br />
<input type="submit" name="action" value="Change Password" />
</form>
