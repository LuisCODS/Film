<?php

	Class Utilisateur 
	{

		private $Utilisateur_ID;
		private $Profil_ID;
		private $UtilisateurName;
		private $UtilisateurPrenom;
		private $UtilisateurMDP;
		private $UtilisateurEmail;

		function __Construct($Utilisateur_ID,$Profil_ID,$UtilisateurName,
							$UtilisateurPrenom,$UtilisateurMDP,$UtilisateurEmail)
		{
			$this->Utilisateur_ID 	     = $Utilisateur_ID;
			$this->Profil_ID 	     	 = $Profil_ID;
			$this->UtilisateurName	     = $UtilisateurName;
			$this->UtilisateurPrenom   = $UtilisateurPrenom;
			$this->UtilisateurMDP		 = $UtilisateurMDP;
			$this->UtilisateurEmail	     = $UtilisateurEmail;
		}

		

		function getUtilisateurID(){
			return $this->Utilisateur_ID;
		}
		// function setUtilisateurID($Utilisateur_ID){
		// 	 $this->Utilisateur_ID = $Utilisateur_ID;
		// }
		function getProfilID(){
			return $this->Profil_ID;
		}
		function stProfilID($Profil_ID){
			 $this->Profil_ID = $Profil_ID;
		}
		function getUtilisateurName(){
			return $this->UtilisateurName;
		}
		function setUtilisateurName($UtilisateurName){
			 $this->UtilisateurName = $UtilisateurName;
		}
		function getUtilisateurPrenom(){
			return $this->UtilisateurPrenom;
		}
		function setUtilisateurPrenom($UtilisateurPrenom){
			 $this->UtilisateurPrenom = $UtilisateurPrenom;
		}
		function getUtilisateurMDP(){
			return $this->UtilisateurMDP;
		}
		function setUtilisateurMDP($UtilisateurMDP){
			 $this->UtilisateurMDP = $UtilisateurMDP;
		}
		function getUtilisateurEmail(){
			return $this->UtilisateurEmail;
		}
		function setUtilisateurEmail($UtilisateurEmail){
			 $this->UtilisateurEmail = $UtilisateurEmail;
		}

	}

?>