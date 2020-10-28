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
	$dossier="../../img/";
	$requette="SELECT pochette FROM film WHERE PK_ID_Film=?";
	
	print_r($pochette);

	$stmt = $connexion->prepare($requette);
	$stmt->execute(array($PK_ID_Film));
	$ligne=$stmt->fetch(PDO::FETCH_OBJ);
	$pochette=$ligne->pochette;//Pega a pochette atual
	
	if($_FILES['pochette']['tmp_name']!==""){
		//enlever ancienne pochette
		if($pochette!="avatar.jpg"){
			$rmPoc='../../img/'.$pochette;
			$tabFichiers = glob('../../img/*');
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
	$requette="UPDATE film set titre=?,prix=?,realisateur=?,categorie=?,pochette=?,description=? 
				WHERE PK_ID_Film=?";
	$stmt = $connexion->prepare($requette);
	$stmt->execute(array($titre,$prix,$realisateur,$categorie,$pochette,$description,$PK_ID_Film));
	unset($connexion);
	unset($stmt);
	//echo "<br><b>LE FILM : ".$idf." A ETE MODIFIE</b>";
?>
<br><br>
<a href="../films.html">Retour à la page d'accueil</a>