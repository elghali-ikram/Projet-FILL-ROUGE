<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "../Includes/root.php";
include "../manager/gestionsize.php";
$gestionsize = new  Gestionsize();
if(!empty($_POST["sizeadd"])){
	$size = new Size();
	$size->setName($_POST['size']);
	$gestionsize->Insert($size);
	header("Location: ../UI/size.php");
}
include "../manager/gestioncolor.php";
$gestioncolor = new  Gestioncolor();
if(!empty($_POST["coloradd"])){
	$color = new Color();
	$color->setName($_POST['color']);
	$color->setCode($_POST['codecolor']);
	$gestioncolor->Insert($color);
	header("Location: ../UI/color.php");
}
?>