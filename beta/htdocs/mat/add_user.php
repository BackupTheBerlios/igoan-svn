<?php echo '<?xml version="1.0" encoding="iso-8859-1"?>'; ?>

<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title> Igoan :: User registration </title>
	<link rel="stylesheet" title="Igoan - Default Stylesheet" href="defaultstyle.css" />
</head>
<body id="www_igoan_org" class="add_project">
<div id="header">
<h1><img src="logo_mat.png" width="300" height="80" alt="Igoan.org" title="Igoan, Free Software Directory Project" /></h1>
	<div class="menu links">
		<img src="menu.png" alt="homepage" />
		<!--<br />
		<form action="search.php" id="searchform">
		<div class="block">
			<label for="value">find a project: </label>
			<input type="text" name="value" id="value" />
			<input type="submit" name="ok" value="ok" />
		</div>
		</form>-->
	</div>
	<br style="clear: both;" />
</div>
<div id="main">
	<form class="admin" action="add_user.php">
	<h2> Register </h2>
	<div class="abstract">
		<p>
			Before you go on with the registration procedure, there are a few things you need to know about it.
		</p>
		<ol>
			<li><span> The only part of the site that requires you to log in is the project administration pages. <br />
			           Any other page/feature of igoan.org remains accessible wheter you are logged in or not. </span></li>
			<li><span> We strongly believe that our site should <strong>not</strong> be be supported by ads. Therefore, we won't sell any data we gather to anyone. ever. </span></li>
			<li><span> We need a valid email address inorder to be able to send you your password. </span></li>
		</ol>
	</div>
	<h2> Personal information </h2>
	<div class="description">
		<div class="block">
			<label for="username"> User name: </label>
			<input title="This will be your Igoan login. Please use alphanumeric characters only." id="username" name="username" type="text" />
		</div>
		<div class="block">
			<label for="name"> Name: </label>
			<input title="This is the name that we will display on igoan.org." id="name" name="name" type="text" />
		</div>	
		<div class="block">
			<label for="email"> Email: </label>
			<input title="Email adress we will use to send you your password." id="email" name="email" type="text" />
		</div>	
		<div class="block">
			<label for="homepage"> Homepage: </label>
			<input title="Your homepage, for instance http://www.myisp.com/myhomepage/home.html." id="homepage" name="homepage" type="text" />
		</div>			
		<p style="margin-top: 0.5em; font-size: 85%"> All fields except "Homepage" are mandatory.</p>
	</div>
	<h2> Submit </h2>
	<div class="misc" style="color: #000000; padding-top: 0;">
		<p> Igoan would be nothing without its cool submit buttons everywhere. <br /> This one completes your registration. If everything is correct, your password will be sent to the email address you specified. </p>
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
