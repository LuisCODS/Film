<?php
 // --------------------------------------------------------------
 // CONTROLLEUR - film  
 //--------------------------------------------------------------- 
	include '../model/Film.class.php';
	include '../dao/FilmDAO.class.php';

	//Pour le CRUD	
	$filmDAO = new FilmDAO();
	//Get all form's inputs
	extract($_POST);	
	//Destination de la pochette au serveur
	$dossier="../../img";
	//Serveur root main
	//$dossier = $_SERVER['DOCUMENT_ROOT'] . "\\FilmPHP__MVC_GIT\\img\\";

	//Create a tolk key unique(new name de la pochette a upload concatenée avec le titre du film
	$nomPochette=sha1($titre.time());
	//Default image si pas de img fournit
	$pochette="avatar.jpg";
	//print_r($_POST);


	// gestion - Upload de la photo

	//Si une image a été envoyéé
	if($_FILES['pochette']['tmp_name']!=="")
	{
		
		//Get real name file from server side
		$tmp = $_FILES['pochette']['tmp_name'];
		//Get name file from user side
		$fichier= $_FILES['pochette']['name'];
		// Get file extension 
		$extension=strrchr($fichier,'.');
		//deplace le dossier temp au dossier physique du serveur 
		@move_uploaded_file($tmp,$dossier.$nomPochette.$extension);//le @ enleve les msn d'erreur cote client
		//effacer le fichier temporaire
		@unlink($tmp); 
		$pochette=$nomPochette.$extension;//Attache le nom  generé coté serveur avec l'extention obtenu cote client
	}

 	 //echo $_POST["insert"];
	//to test! var_dumping  print_r($data);
 	 $action = $_POST["action"];
 	 //print_r($action);//to test

	
	switch ($action) 
	{
		case 'insert':
			$film = new Film(null,$titre,$prix,$realisateur,$categorie,$pochette,$description);	
			$filmDAO->insert($film);//Si ok return 1
		    header('Location: ../view/film/index.php');
			// echo 'Compte bien enregistrée!';
		    break;

		// case 'update':
		// 	$film = new Film($PK_ID_Film,$titre,$prix,$realisateur,$categorie,$pochette,$description);
		// 	echo $filmDAO->update($film);//Si ok return 1
		// 	break;

		// case 'delete':
		// 		echo $filmDAO->delete($PK_ID_Film);//Si ok return 1
		// 	break;

		// case 'getUtilisateur':
		// 	echo $filmDAO->getfilm($txtInput);//Si ok return 1
		// 	break;
			
		// default:
		// 	echo "Aucun action trouvée";
		// 	break;
	}

?>