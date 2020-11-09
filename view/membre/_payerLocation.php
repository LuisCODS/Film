<?php
session_start(); 
// require_once("../../includes/ConnectionPDO.php");
include '../../model/Film.class.php';
include '../../model/Membre.class.php';
include '../../model/Film_Location.class.php';
include '../../dao/Film_LocationDAO.class.php';


extract($_POST);

$locationDAO = new Film_LocationDAO();

if ( isset($_POST['idFilm'])   &  $_POST['idFilm'] != "")
{
	//Get id film et membre

	$idFilm = $_POST['idFilm'];
	$idMembre = $_POST['idMembre'];

	//print_r($idFilm); //to test post	

	//CREATE A LOCATION
	//$location = new Film_Location(null,$idFilm, $idMembre);

	//ADD LOCATION DANS LA BD
	$locationDAO->insert($idFilm, $idMembre);

	header("location: index.php");
}
?>