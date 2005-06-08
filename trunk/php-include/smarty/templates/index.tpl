<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
	<title> Igoan :: {$rubrique->getTitle()} </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<h1> Igoan </h1>

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
</body>
</html>
