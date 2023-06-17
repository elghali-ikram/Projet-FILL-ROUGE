
<?php
include "../manager/Categorymanager.php";
$gestioncategory = new  Gestioncategory ();

if(!empty($_POST)){
	$category = new Category();
	$category->setName($_POST['Nom']);
	$gestioncategory->Insert($category);
	// Redirection vers la page index.php
	header("Location: ../index.php");
}
