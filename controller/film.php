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