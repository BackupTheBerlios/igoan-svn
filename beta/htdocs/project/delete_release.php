<?php /* $Id: delete_release.php,v 1.3 2003/08/02 23:00:46 cam Exp $ */ ?>
<?php

// existence de la release
if (!isset($_GET['idRel']) || ($_GET['idRel'] != 123460)) {
	append_error_exit('Bad Release ID');
}

if (isset($_GET['confirm']) && ($_GET['confirm'] == 'Yes')) {
	// do the job
	append_error('Release successfully deleted');
	http_redir('/project/view_project.php?idPrj=456789');
}

?>

<h1>Release Deletion</h1>

Do you really want to delete this release 'GraphTool' version 'graphtool-0.2-pre1' ?
<form>
	<input type="submit" name="confirm" value="Yes" />
	<input type="hidden" name="idRel" value="123460" /></form>
<form action="/project/view_release.php">
	<input type="submit" value="No" />
	<input type="hidden" name="idRel" value="123460" /></form>
	
<br /><br/><hr />
<a href="/project/view_project.php?idPrj=456789">Back to project view</a> || <a href="/">Back to homepage</a>
