<?php 
	include '../../includes/head.php'; 
	include '../../includes/interfaceAdmin.php'; 
	require_once("../../includes/ConnectionPDO.php");

	if (isset($_GET['delete'])) 
	{
		$id = $_GET['delete'];
		
		$requette="DELETE FROM film WHERE PK_ID_Film = $id";
		$stmt = $connexion->prepare($requette);
		$stmt->execute();
	    header("location:lister.php");

	}
?>

