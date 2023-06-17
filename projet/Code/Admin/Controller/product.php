<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../Includes/root.php';
include "../manager/gestionproduct.php";
include "../manager/gestionimage.php";
include "../manager/gestionassociation.php";
$gestionassociation = new  Gestionassociation();
$gestionimage = new  Gestionimage();
$gestionproduct = new  Gestionproduct();
if(!empty($_POST["productadd"])){
	$product = new product();
	$product->setName($_POST['name']);	
    $product->setDescription($_POST['description']);
	$product->setPrice($_POST['price']);
	$product->setCategory($_POST['category']);
	$lastindex=$gestionproduct->Insert($product);
	$count=count($_FILES['images']['name']);
	$countsize=count($_POST["size"]);
	$countcolor=count($_POST["color"]);
	for ($i=0; $i <  $count; $i++) { 
		$image = new image();
		$image->setName($_FILES['images']['name'][$i]);	
		$image->setProduct($lastindex);
		$gestionimage->Insert($image);
		$fileName = $_FILES["images"]["name"][$i];
		$tempName = $_FILES["images"]["tmp_name"][$i];
		$folder = "../../Assets/images/" . $fileName;
		move_uploaded_file($tempName, $folder);
	}
	for ($i=0; $i < $countsize; $i++) { 
		$associationsize = new Association();
		$associationsize->setIdproduct($lastindex);	
		$associationsize->setIdassociation($_POST['size'][$i]);
		$gestionassociation->Insert($associationsize,'products_size');
	}
	for ($i=0; $i < $countcolor; $i++) { 
		$associationcolor = new Association();
		$associationcolor->setIdproduct($lastindex);	
		$associationcolor->setIdassociation($_POST['color'][$i]);
		$gestionassociation->Insert($associationcolor,'products_color');	
	}
	header("Location: ../UI/allproduct.php");

}
if($_GET['iddelete']){
    $id = $_GET['iddelete'];
    $gestionimage->Delete($id);
	$gestionassociation->Delete($id,'products_size');
	$gestionassociation->Delete($id,'products_color');
	$gestionproduct->Delete($id);
    header("Location: ../UI/allproduct.php");
}
if(!empty($_POST["productedit"])){
	$id=$_POST["idproduct"];
	$images= array();
$image=$_POST["imageupdat$id"];
for ($i=0; $i < count($_FILES["images$id"]['name']); $i++) {
	if ($_FILES["images$id"]['name'][$i] !="") {
		$images[]=$_FILES["images$id"]['name'][$i];
		$fileName = $_FILES["images$id"]["name"][$i];
		$tempName = $_FILES["images$id"]["tmp_name"][$i];
			$folder = "../../Assets/images/" . $fileName;
			move_uploaded_file($tempName, $folder);
	}
}

$images=array_merge($images, $_POST["imageupdat$id"]);
	print_r($images);
	$gestionimage->Delete($id);
	$gestionassociation->Delete($id,'products_size');
	$gestionassociation->Delete($id,'products_color');


	// add to tables
	$count=count($images);
	$countsize=count($_POST["size"]);
	$countcolor=count($_POST["color"]);
	for ($i=0; $i <  $count; $i++) { 
		$image = new image();
		$image->setName($images[$i]);	
		$image->setProduct($id);
		$gestionimage->Insert($image);
	}
	for ($i=0; $i < $countsize; $i++) { 
		$associationsize = new Association();
		$associationsize->setIdproduct($id);	
		$associationsize->setIdassociation($_POST['size'][$i]);
		$gestionassociation->Insert($associationsize,'products_size');
	}
	for ($i=0; $i < $countcolor; $i++) { 
		$associationcolor = new Association();
		$associationcolor->setIdproduct($id);	
		$associationcolor->setIdassociation($_POST['color'][$i]);
		$gestionassociation->Insert($associationcolor,'products_color');	
	}
	//updat the product
	$gestionproduct->Modifier($_POST["idproduct"],$_POST["name"],$_POST["description"],$_POST["price"],$_POST["category"]);
	header("Location: ../UI/allproduct.php");

}
 ?>