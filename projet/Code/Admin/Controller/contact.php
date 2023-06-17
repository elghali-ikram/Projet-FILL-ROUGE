<?php
include '../Includes/root.php';
include "../manager/gestioncontact.php";
$gestioncontact = new  Gestioncontact();
if(!empty($_POST["send"])){
	$contact = new Contact();
	$contact->setName($_POST['name']);
    $contact->setEmail($_POST['email']);
	$contact->setMessage($_POST['message']);

	$gestioncontact->Insert($contact);
	header("Location: ../../User/contactus.php");
}

?>