<?php
$DIR = '../../php-include/igoan';

$dir = opendir($DIR);
while ($file = readdir($dir)) {
	if (substr($file, -10) != ".class.php") continue;
	echo '<p><strong>Fichier : '.$file.'</strong><br/>';
	$public = 1;
	$fd = fopen($DIR.'/'.$file, "r");
	while ($line = fgets($fd)) {
		if (ereg('// ?public', $line)) $public = 1;
		elseif (ereg('// ?private', $line)) $public = 0;
		elseif (ereg('^class', $line)) echo $line.'<br/>';
		elseif (ereg('.(function|var)', $line, $reg) && $public) echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.(($reg[1]=='var')?'attribut':'méthode').' : '.$line.'<br/>';
		elseif (ereg('^function', $line)) echo 'Fonction (statique) : '.$line.'<br/>';
	}
	fclose($fd);
	echo '</p>';
}
closedir($dir);