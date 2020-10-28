<?php
	define("USAGER","root");
	define("PASSE","");
	try {
		  $dns = 'mysql:host=localhost;dbname=bdfilms';
		  $options = array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	  );

	  $connexion = new PDO( $dns, USAGER, PASSE, $options );

	} catch ( Exception $e ) {
	    //echo $e->getMessage();
		echo "Probleme de connexion au serveur de bd";
		exit();
	}

	extract($_POST);
	$titre=$_POST['titre'];
	$prix=$_POST['prix'];
	$categorie=$_POST['categorie'];
	$realisateur=$_POST['realisateur'];
	$description=$_POST['description'];

	//$dossier="pochettes/";
	$dossier="../../img/";
	$nomPochette=sha1($titre.time());
	$pochette="avatar.jpg";
	
	if($_FILES['pochette']['tmp_name']!==""){
		//Upload de la photo
		$tmp = $_FILES['pochette']['tmp_name'];
		$fichier= $_FILES['pochette']['name'];
		$extension=strrchr($fichier,'.');
		@move_uploaded_file($tmp,$dossier.$nomPochette.$extension);
		// Enlever le fichier temporaire chargé
		@unlink($tmp); //effacer le fichier temporaire
		$pochette=$nomPochette.$extension;
	}


	$requete="INSERT INTO film VALUES(0,?,?,?,?,?,?)";
	$stmt = $connexion->prepare($requete);
	$stmt->execute(array($titre,$prix,$realisateur,$categorie,$description,$pochette));
	//echo "Film ". $connexion->lastInsertId()." bien enregistre";
	unset($connexion);
	unset($stmt);
?>
<br><br>
<!-- <a href="../../listerFilm.php">Retour à la page d'accueil</a> -->

<?php header("location: listerFilm.php"); ?>