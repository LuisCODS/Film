<?php
session_start(); 

 

//Si l'action de supprimer le item do panier a été fait
if ( isset($_GET['remove'])   &  $_GET['remove'] == "panier")
{
	//Get id film inside url
	$idFilm = $_GET['id'];
	//Delete seulement la session que contient l'id do film
	unset($_SESSION['itens'][$idFilm]);
	//echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=panie.php"/> ';
	header("location: panier.php");
}
?>