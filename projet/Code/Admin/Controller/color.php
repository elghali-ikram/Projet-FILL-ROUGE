<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../Includes/root.php';

include "../manager/gestioncolor.php";
$gestioncolor = new  Gestioncolor();
if(!empty($_POST["coloradd"])){
	$color = new Color();
	$color->setName($_POST['color']);
	$color->setCode($_POST['codecolor']);
	$gestioncolor->Insert($color);
	header("Location: ../UI/color.php");
}
if(!empty($_GET['iddelete'])){
    $id = $_GET['iddelete'];
    $gestioncolor->Delete($id);
    header("Location: ../UI/color.php");
}
if(!empty($_POST["colorEdit"])){
	$gestioncolor->Modifier($_POST["colorid"],$_POST["colorname"],$_POST["codecolor"]);
	header("Location: ../UI/color.php");
}
?>