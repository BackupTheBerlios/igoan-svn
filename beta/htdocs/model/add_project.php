<?
require("soft.class");
$poolp=new soft($projectname);
$poolp->set("description",$projectdesc);
$poolp->affiche();
$poolp->create();
$poolp->finalize();
?>