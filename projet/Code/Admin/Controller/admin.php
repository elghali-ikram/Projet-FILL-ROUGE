<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../Includes/root.php';
include "../manager/gestionadmin.php";
session_start();
$gestionadmin = new  Gestionadmin();
if(!empty($_POST["profile"])){

    echo $_SESSION["id"];

    $gestionadmin->Modifier($_SESSION["id"],$_POST["inputName"],$_POST["inputEmail"],$_POST["inputpassword"]);

}




 ?>