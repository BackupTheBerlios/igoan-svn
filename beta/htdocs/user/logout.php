<?php /* $Id: logout.php,v 1.4 2003/12/13 22:13:04 mat Exp $ */ ?>
<?php

# taken from http://fr2.php.net/manual/en/function.html-entity-decode.php
function my_html_entity_decode($given_html, $quote_style = ENT_QUOTES) {
   $trans_table = array_flip(get_html_translation_table( HTML_SPECIALCHARS, $quote_style ));
   $trans_table['&#39;'] = "'";
   return (strtr( $given_html, $trans_table));
}

unset($_SESSION['id']); 
http_redir(empty($_GET['referer']) ? '/index.php' : urldecode(my_html_entity_decode($_GET['referer'])));
?>
