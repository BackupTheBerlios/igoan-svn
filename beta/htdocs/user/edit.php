<?php /* $Header: /cvsroot/igoan/beta/htdocs/user/edit.php,v 1.2 2003/12/31 02:57:48 cam Exp $ */ ?>
<?php

require_once 'igoan/User.class.php';

if (!$_SESSION['id']) {
	append_error_exit('You must be logged to edit yourself!');
}
$me = user_get_by_id($_SESSION['id']);
if (!$me) {
	append_error_exit('Invalid login. Please re-login.');
}

if (!empty($_GET['id_user'])) {
	if ($_GET['id_user'] != $me->get_id_user()) {
		append_error_exit('You are user #'.$me->get_id_user().' and are editing user #'.$_GET['id_user'].'! Please correct.');
	}
	if (!empty($_GET['name_user'])) {
		$me->set_name_user($_GET['name_user']);
	}
	if (isset($_GET['desc_user'])) {
		$me->set_desc_user($_GET['desc_user']);
	}
	if (isset($_GET['url_user'])) {
		$me->set_url_user($_GET['url_user']);
	}
	if (!empty($_GET['mail'])) {
		$me->set_mail($_GET['mail']);
	}
	if (isset($_GET['photo'])) {
		// TODO: prendre en compte la photo
		;
	}
	$me->write();
}

// show the data (NO PROCESSING HERE PLEASE, ONLY ECHOs)
header_box('Igoan :: Edit user infos :: '.$me->get_name_user());
flush_errors(); ?>
<div id="main"><?php
// these are the "stuff" section
login_box($me);
categories_box();

?>
	<div class="item soft">
		<h4> Edit User :: <?php echo $me->get_name_user(); ?> </h4>
		<form>
		<input type="hidden" name="id_user" value="<?php echo $me->get_id_user(); ?>" />
		<div class="abstract">
			<p>
			Your username is <strong><?php echo $me->get_login(); ?></strong> and your unique ID is <strong><?php echo $me->get_id_user(); ?></strong>. <br/>
			All others informations are editables:
			</p>
			<hr/>
			<p>
			Your real name: <br/>
			<input name="name_user" value="<?php echo $me->get_name_user(); ?>" size="40" />
			</p>
			<hr/>
			<p>
			Your description about you: <br/>
			<textarea name="desc_user" cols="40" rows="6"><?php echo $me->get_desc_user(); ?></textarea>
			</p>
			<hr/>
			<p>
			Your homepage: <br/>
			<input name="url_user" value="<?php echo $me->get_url_user(); ?>" size="40"/>
			</p>
			<hr/>
			<p>
			Your email address (will be hidden): <br/>
			<input name="mail" value="<?php echo $me->get_mail(); ?>" size="40"/>
			</p>
			<hr/>
			<p>
			FIXME: Your photo (150x110 pixels max, empty = no photo): <br/>
			<img src="/photos/<?php echo $me->get_login(); ?>/1.png" border="1" /><br/>
			<input name="photo" value="<?php echo $me->get_photo(); ?>" size="40" /> (to be removed?)
			</p>
			<hr/>
			<p>
			<input type="submit" name="submit" value="Update" />
			</p>
		</div>
	</div>
	<br style="clear: both" />
</div>
<?php
footer_box();
?>