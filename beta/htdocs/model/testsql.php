<?

require("soft.class");
require("database.class");

$db=new database();
$db->connect();
$poolp=new soft("poolp",$db);
if($poolp==-1)
     echo "impossible de créer le projet";
$poolp->set("name","poolp");
$poolp->set("description","blah lah blah blah description");
$poolp->set("homepage","poolpHome");
$poolp->set("screenshot","poolpScreen");
$poolp->set("download","poolpDownload");
$poolp->set("totalclick",100);
$poolp->set("creationdate","now()");
$poolp->create();

?>