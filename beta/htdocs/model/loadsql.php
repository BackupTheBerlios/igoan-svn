<?
require("poolp.php");
require_once 'DB.php';

function connect()
{
  $d = DB::connect(get_dsn());
  if (DB::isError($d)) die ($d->getMessage());
  return $d;
}

$db=connect();
$db->setErrorHandling(PEAR_ERROR_RETURN);

$file = fopen($URLHERE,"r");
echo "<table cellspcing=\"2\">\n";
  while (!feof($file)) {
    $buffer = fgets($file, 4096);
    echo $buffer."<br />";
    $result=$db->query($buffer);
    $res = $result->fetchRow();
    echo " <tr>\n";
    foreach($res as $t) echo "  <td>".$t."</td>\n";
    echo "\n </tr>";
    if(!$db) $db=connect();
    if (DB::isError($result)) die ($result->getDebugInfo());
  }
echo " </table>";
fclose ($file);


?>
