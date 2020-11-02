<?php
 // --------------------------------------------------------------
 // 				CONTROLLEUR - film  
 //--------------------------------------------------------------- 
	include '../model/Film.class.php';
	include '../dao/FilmDAO.class.php';
	require_once("../includes/ConnectionPDO.php");

	//GLOBAL
	$filmDAO = new FilmDAO();
	extract($_POST);
  // echo $action;
  // print_r($action);
  //var_dump($_POST['titre']);//to test

	if($action == "insert")
	{
		$dossier="../img/";
		$nomPochette=sha1($titre.time());
		$pochette="avatar.jpg";
		
		//Si une photo a été choisie
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

		$film = new Film($PK_ID_Film,$titre,$prix,$realisateur,$categorie,$pochette,$description,$url);
		$filmDAO->insert($film);//Si ok return 1	
	    header("location:../view/film/lister.php");
	}


	if($action == "update")
	{					
		//GET ALL FORM DATA

		$PK_ID_Film=$_POST['PK_ID_Film'];
		$titre=$_POST['titre'];
		$prix=$_POST['prix'];
		$realisateur=$_POST['realisateur'];
		$categorie=$_POST['categorie'];
		$description=$_POST['description'];
		$url=$_POST['url'];

		$dossier="../img/";

		$requette="SELECT pochette FROM film WHERE PK_ID_Film=?";
		$stmt = $connexion->prepare($requette);
		$stmt->execute(array($PK_ID_Film));
		$ligne=$stmt->fetch(PDO::FETCH_OBJ);

		//IMG COURRANT
		$pochette=$ligne->pochette;

		//CAS  AUTRE IMAGE FOURNIE...

		if($_FILES['pochette']['tmp_name']!=="")
		{
			//enlever ancienne pochette
			if($pochette!="avatar.jpg"){
				$rmPoc='../img/'.$pochette;
				$tabFichiers = glob('../img/*');
				//print_r($tabFichiers);
				// parcourir les fichier
				foreach($tabFichiers as $fichier){
				  if(is_file($fichier) && $fichier==trim($rmPoc)) {
					// enlever le fichier
					unlink($fichier);
					break;
					//
				  }
				}
			}
	        
	        //CAS NOUVELLE IMAGE

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

		$requette="UPDATE film set titre=?,prix=?,realisateur=?,categorie=?, description=?, url=?,pochette=? WHERE PK_ID_Film=?";
		$stmt = $connexion->prepare($requette);
		$stmt->execute(array($titre,$prix,$realisateur,$categorie,$description,$url,$pochette, $PK_ID_Film));
		unset($connexion);
		unset($stmt);
	    header("location:../view/film/lister.php");

		// echo "<br><b>LE FILM : ".$PK_ID_Film." A ETE MODIFIE</b>";
	}
	
?>
