<?php
 // --------------------------------------------------------------
 // 				CONTROLLEUR - film  
//  Recebe os dados  enviado pelo moduloScript.js
 //--------------------------------------------------------------- 
include '../model/Film.class.php';
include '../dao/FilmDAO.class.php';


//Pour le CRUD	
$filmDAO = new FilmDAO();
//Get all form's inputs
extract($_POST);	


	switch ($action) 
	{
		case 'insert':

			$dossier="../img/";  //Serveur dossier	
			//$dossier = $_SERVER['DOCUMENT_ROOT'] . "\\FilmPHP__MVC_GIT\\img\\" .$pochette;
			$nomPochette=sha1($titre.time()); //Create a tolk key unique(new name)	
			$pochette="avatar.jpg";//Default image si pas de img fournit
			var_dump($dossier);

				//Si une image a été envoyéé
				if($_FILES['pochette']['tmp_name']!=="")
				{
					//Get real name file from server side
					$filename = $_FILES['pochette']['tmp_name'];
					//Get name file from user side
					$fichier= $_FILES['pochette']['name'];
					// Get file extension 
					$extension=strrchr($fichier,'.');
					//Move file to a new dossier
					@move_uploaded_file($filename,$dossier.$nomPochette.$extension);//le @ enleve les msn d'erreur cote client
					//effacer le fichier temporaire
					@unlink($filename); 
					$pochette=$nomPochette.$extension;//Attache le nom  generé coté serveur avec l'extention obtenu cote client
				}

				$film = new Film(null,$titre,$prix,$realisateur,$categorie,$pochette,$description);	
				$filmDAO->insert($film);//Si ok return 1
			    //header('Location: ../view/film/index.php');

		    break;

		case 'update':

			$film = new Film($PK_ID_Film,$titre,$prix,$realisateur,$categorie,$pochette,$description);
			echo $filmDAO->update($film);//Si ok return 1
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