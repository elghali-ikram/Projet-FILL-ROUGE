<?php
include '../Includes/root.php';
include "../manager/gestioncategory.php";
$gestioncategory = new  Gestioncategory();
if(!empty($_POST["categoryadd"])){
	$category = new Category();
	$category->setName($_POST['category']);
	$gestioncategory->Insert($category);
	header("Location: ../UI/categories.php");
}
if($_GET['iddelete']){
    $id = $_GET['iddelete'];
    $gestioncategory->Delete($id);
    header("Location: ../UI/categories.php");
}
if(!empty($_POST["categoryEdit"])){
	$gestioncategory->Modifier($_POST["categoryid"],$_POST["categoryname"]);
	header("Location: ../UI/categories.php");
}
?>