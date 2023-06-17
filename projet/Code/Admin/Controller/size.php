<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../Includes/root.php';

include "../manager/gestionsize.php";
$gestionsize = new  Gestionsize();
if(!empty($_POST["sizeadd"])){
	$size = new Size();
	$size->setName($_POST['size']);
	$gestionsize->Insert($size);
	header("Location: ../UI/size.php");
}
if(!empty($_GET['iddelete'])){
    $id = $_GET['iddelete'];
    $gestionsize->Delete($id);
    header("Location: ../UI/size.php");
}
if(!empty($_POST["sizeEdit"])){
	$gestionsize->Modifier($_POST["sizeid"],$_POST["sizename"]);
	header("Location: ../UI/size.php");
}
?>