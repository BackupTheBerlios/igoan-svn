<?php /* $Header: /cvsroot/igoan/beta/htdocs/index.php,v 1.13 2003/12/31 00:22:54 cam Exp $ */ ?>
<?php

require_once 'igoan/Project.class.php';
require_once 'igoan/User.class.php';

$me = user_get_by_id($_SESSION['id']);
$result = sql_do('SELECT id_prj FROM projects');

// show the data (NO PROCESSING HERE PLEASE, ONLY ECHOs)
header_box('Igoan :: The Free Directory Project');
flush_errors(); ?>
<div id="main"><?php
// these are the "stuff" section
login_box($me);
//categories_box();
?>
</div>

<div class="item soft">

<h2>Projects of the month:</h2>

<ul>
<?php

if (($result->numRows() == 0)) {
	echo '<li>Sorry, no project in the database.</li>';
} else for ($i=0; $i<$result->numRows(); $i++) {
	$row = $result->fetchRow();
	$prj = project_get_by_id($row[0]);
	echo '<li><a href="/project/view.php?id_prj='.$prj->get_id_prj().'">'.$prj->get_name_prj().'</a></li>';
}
?>
</ul>
</div>
</div>
<?php footer_box(); ?>
