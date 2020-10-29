<?php
 // --------------------------------------------------------------
 // 				CONTROLLEUR - film  
 //  Recebe os dados  enviado pelo moduloScript.js
 //--------------------------------------------------------------- 
include '../model/Film.class.php';
include '../dao/FilmDAO.class.php';

    extract($_POST);
	//Pour le CRUD	
	$filmDAO = new FilmDAO();
	
/*	$titre=$_POST['titre'];
	$prix=$_POST['prix'];
	$categorie=$_POST['categorie'];
	$realisateur=$_POST['realisateur'];
	$description=$_POST['description'];*/

	$dossier="../../img/";
	$nomPochette=sha1($titre.time());
	$pochette="avatar.jpg";
	
	if($_FILES['pochette']['tmp_name']!=="")
	{
		//Upload de la photo
		$tmp = $_FILES['pochette']['tmp_name'];
		$fichier= $_FILES['pochette']['name'];
		$extension=strrchr($fichier,'.');
		@move_uploaded_file($tmp,$dossier.$nomPochette.$extension);
		// Enlever le fichier temporaire chargé
		@unlink($tmp); //effacer le fichier temporaire
		$pochette=$nomPochette.$extension;
	}	

	switch ($action) 
	{
		case 'insert':

		$film = new Film($PK_ID_Film,$titre,$prix,$realisateur,$categorie,$pochette,$description);
		echo $filmDAO->insert($film);//Si ok return 1

		    break;

		case 'update':

			// $film = new Film($PK_ID_Film,$titre,$prix,$realisateur,$categorie,$pochette,$description);
			// echo $filmDAO->update($film);//Si ok return 1
			break;

		case 'delete':

			echo $filmDAO->delete($PK_ID_Film);//Si ok return 1
			break;

		case 'getFilm':

			echo $filmDAO->getFilm();//Si ok return 1
			break;	

		default:
			echo "Aucun action trouvée";
			break;
	}


?>