<?xml version="1.0" encoding="iso-8859-15"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
                      "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Igoan :: {$page_title} :: {$view_user_name}</title>
<link rel="stylesheet" title="Igoan - Default Stylesheet" href="/css/default/screen.css"/>
</head>

<body id="www_igoan_org" class="add_project">

<div id="header">
<h1><a href="/"><img src="/img/logo.png" width="300" height="80"
alt="Igoan.org" title="Igoan, Free Software Directory Project" /></a></h1>

	<!--
	<div>
		<ul>
			<li> menu 1 </li>
			<li> menu 2 </li>
		</ul>
		{* Maybe someday? <ul> {foreach from=$rubrique->getSubmenu() item=....} *}
	</div> -->
	<div id="body" class="{$rubrique->getBodyClass()}">
		{$rubrique->getBody()}
	</div>

	<br style="clear: both" />
</div>
<div id="footer">
This page was generated in 0.2seconds. (Igoan v0.42, 256 projects in the
database)<br/>
&copy; Igoan 2003-2005 - <a href="http://validator.w3.org/check/referer">check
xhtml</a>
</div>
</body>
</html>
