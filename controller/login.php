<?php
session_start();
require_once("../includes/ConnectionPDO.php");



// =============================== CONTROLEUR LOGIN ===============================

extract($_POST);

// LOGIN

if ($_POST["action"] == "login")
 {
		//echo "test envois form";
		$requette="SELECT * FROM membre WHERE courriel=? AND MDP_membre=? ";
		$stmt = $connexion->prepare($requette);
		$stmt->execute(array($courriel, $MDP_membre));
		$user=$stmt->fetch(PDO::FETCH_OBJ);
		//echo $user->MDP_membre;  //1234
		//print_r($user);

		//Le membre existe
		if ($user == true)
		{		
			//echo $user->MDP_membre;//to test
			//Create a session
			$_SESSION["membreID"] = $user->MDP_membre;
			header("location: ../view/membre/index.php");

		}else{
			echo "Courriel ou mot de passe invalide";
		}
}




 