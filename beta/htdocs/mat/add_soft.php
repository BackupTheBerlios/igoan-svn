<?php echo '<?xml version="1.0" encoding="iso-8859-1"?>'; ?>

<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title> Igoan :: Adding a project </title>
	<link rel="stylesheet" title="Igoan - Default Stylesheet" href="defaultstyle.css" />
</head>
<body id="www_igoan_org" class="add_project">
<div id="header">
<h1><img src="logo_mat.png" width="300" height="80" alt="Igoan.org" title="Igoan, Free Software Directory Project" /></h1>
	<div class="menu links">
	
	<!--
		
		[<a href="#">homepage</a>] [<a href="#">latest updates</a>] [<a href="#">browse categories</a>]
		[<a href="#">about igoan</a>] [<a href="#">igoan's cvs</a>] [<a href="#">contact us</a>]<br />
		<form action="search.php" id="searchform">
		<div class="block">
			<label for="value">find a project: </label>
			<input type="text" name="value" id="value" />
			<input type="submit" name="ok" value="ok" />
		</div>
		</form>
	-->
	</div>
	<br style="clear: both;" />
</div>
<div id="main">
	<form class="admin" action="add_project.php">
	<h2> Adding a project </h2>
	<div class="abstract">
		<p>
			Adding a project to our database is as easy as 1, 2, 3:
		</p>
		<ol>
			<li><em> Register, and then log in :)</em></li>
			<li><em> Tell us about your project: select a project name, add a description and an homepage. </em></li>
			<li><em> Submit ! </em></li>
		</ol>
	</div>
	<h2> Register / log in </h2>
	<div class="description">
	<?php
		if (!empty($_GET['login'])) # truc a la con pour tester.
		{
			echo '<p> You are currently logged in as ' . $_GET['login'];
			echo '.<br />You can proceed to the next step as this user,';
			echo ' or <a href="logout.php">logout</a> in order to register/login as a another user.</p>';
		}
		else
		{
			echo '<p> If you already have an account, enter your login/password in the fields below. <br />';
			echo 'If you don\'t, please <a href="register.php">register</a>. </p>';
			echo '<div class="block">';
			echo '<label for="login"> Login: </label>';
			echo '<input title="Your igoan login." id="login" name="login" type="text" />';
			echo '<br />';
			echo '<label for="password"> Password: </label>';
			echo '<input title="Your igoan password." id="password" name="password" type="password" />';
			echo '</div>';		
		}
	
	?>
	</div>
	<h2> So, what is your project about ? </h2>
	<div class="description">
		<p style="margin-bottom: 0.5em"> We need 2 names: a project name, which is the full name for, erm, your project :), and a short name,
		    which we will use in URLs for instance. </p>
		<div class="block">
			<label for="name"> Project name: </label>
			<input title="Whatever you like, i.e. 'My Cool Project'." id="name" name="name" type="text" />
		</div>
		<div class="block">
			<label for="shortname"> Short name: </label>
			<input title="Short, easy-to-remember name, with alphanumeric characters only, i.e. 'coolproject'." id="shortname" name="shortname" type="text" />
			
		</div>	
		<div class="block">
			<label for="homepage"> Homepage: </label>
			<input title="URL for your project as it will be displayed by us, i.e. 'http://www.myisp.net/mycoolproject/home.html'." id="homepage" name="homepage" type="text" />
			
		</div>	
		<div class="block">
			<label for="description"> Description: </label>
			<textarea title="A few lines to describe your project." cols="40" rows="7" id="description" name="description"></textarea>
			
		</div>
		<p style="margin-top: 0.5em; font-size: 85%"> All fields except homepage are mandatory. Use plain text everywhere, any HTML code will be stripped. </p>
	</div>
	<h2> Submit </h2>
	<div class="misc" style="color: #000000; padding-top: 0;">
		<p> Everybody likes submit buttons ! This one add your project to our database, and creates a default
		branch for it. <br /> You'll be able to modify everything, add branches, releases... later in the admin
		page. </p>
		<div class="block">
			<input type="submit" id="submit" name="submit" value="Submit !" />
		</div>
	</div>
	</form>
</div>
<div id="footer" style="clear: both">
	This page was generated in 0.2seconds. (Igoan v0.42, 256 projects in the database) <br />
	&copy; 2003 Igoan.org
</div>
</body>
</html>
