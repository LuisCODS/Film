<?php 
include '../../includes/head.php'; 
include '../../includes/interfaceAdmin.php'; 
require_once("../../includes/ConnectionPDO.php");





if (isset($_GET['DELETE'])) 
{
	$id = $_GET['DELETE'];
	
	$requette="DELETE FROM film WHERE PK_ID_Film = $id";
	$stmt = $connexion->prepare($requette);
	$stmt->execute();
}

?>

