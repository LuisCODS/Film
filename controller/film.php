<?php
 // --------------------------------------------------------------
 // 				CONTROLLEUR - film  
 //--------------------------------------------------------------- 
include '../model/Film.class.php';
include '../dao/FilmDAO.class.php';
require_once("../includes/ConnectionPDO.php");

$filmDAO = new FilmDAO();

extract($_POST);

	// echo $action;
	// print_r($action);
 //    var_dump($titre);//to test

	if($_POST["action"] == "insert")
	{
		$dossier="../img/";
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

		$film = new Film(null,$titre,$prix,$realisateur,$categorie,$pochette,$description);
		$filmDAO->insert($film);//Si ok return 1	

		 // //Create a session
		 // $_SESSION["teste"] = "teste";
		  header("location:../view/film/lister.php");

	}

	if($_POST["action"] == "update")
	{						
		extract($_POST);
		
		$PK_ID_Film=$_POST['PK_ID_Film'];
		$titre=$_POST['titre'];
		$prix=$_POST['prix'];
		$categorie=$_POST['categorie'];
		$realisateur=$_POST['realisateur'];
		$description=$_POST['description'];
		$dossier="../img/";

		$requette="SELECT pochette FROM film WHERE PK_ID_Film=?";
		$stmt = $connexion->prepare($requette);
		$stmt->execute(array($PK_ID_Film));
		$ligne=$stmt->fetch(PDO::FETCH_OBJ);
		$pochette=$ligne->pochette;
		
		if($_FILES['pochette']['tmp_name']!=="")
		{
			//enlever ancienne pochette
			if($pochette!="avatar.jpg")
			{
				$rmPoc='../img/'.$pochette;
				$tabFichiers = glob('../img/*');
				//print_r($tabFichiers);
				// parcourir les fichier
				foreach($tabFichiers as $fichier){
					//trim: removes whitespace from both sides of a string
				  if(is_file($fichier) && $fichier==trim($rmPoc)) {
					// enlever le fichier
					unlink($fichier);
					break;
					//
				  }
				}
			}

			$nomPochette=sha1($titre.time());
			//Upload de la photo
			$tmp = $_FILES['pochette']['tmp_name'];
			$fichier= $_FILES['pochette']['name'];
			$extension=strrchr($fichier,'.');
			$pochette=$nomPochette.$extension;
			@move_uploaded_file($tmp,$dossier.$nomPochette.$extension);
			// Enlever le fichier temporaire chargé
			@unlink($tmp); //effacer le fichier temporaire
		}


		$requette="UPDATE film set titre=?,prix=?,categorie=?,pochette=?,description=?, realisateur=? WHERE PK_ID_Film=?";
		$stmt = $connexion->prepare($requette);
		$stmt->execute(array($titre,$prix,$categorie,$pochette,$description, $realisateur,$PK_ID_Film));
		unset($connexion);
		unset($stmt);
	    header("location:../view/film/lister.php");
	}


	
?>
