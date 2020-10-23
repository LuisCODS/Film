  <?php
 // --------------------------------------------------------------
 // CONTROLLEUR - MEMBRE  
 //--------------------------------------------------------------- 
 require_once '../model/Membre.class.php';
 require_once '../dao/MembreDAO.class.php';

	/* 	
	Extrait tous les données envoyés par moduleScript.js. 
	Desormais touts les chams du formulaires sont acessibles directement par leur noms.
	Ce qui permet de creer les parametre qui sont fournit au constructeur d'un nouveau membre 
	*/
	extract($_POST);
	// echo $_POST["action"];
	$action = $action;//get hiddin input from form
	
	//CRUD
	$membreDAO = new MembreDAO();

	switch ($action) 
	{
		case 'insert':
			$membre = new Membre(null,$nom,$prenom,$profil,$courriel,$tel_membre,$MDP_membre);	
			$membreDAO->insert($membre);//Si ok return 1	
			// echo $membreDAO->insert($membre);//Si ok return 1
			   header('Location: ../view/membre/index.php');
		    break;

 		case 'update':
			$membre = new Membre($PK_ID_Membre,$nom,$prenom,$profil,$courriel,$tel_membre,$MDP_membre);
			echo $membreDAO->update($membre);//Si ok return 1
			break;

		case 'delete':
				echo $membreDAO->delete($PK_ID_Membre);//Si ok return 1
			break;

		case 'getUtilisateur':
			// echo $membreDAO->getMembre($txtInput);//Si ok return 1
				echo $membreDAO->getMembre();//Si ok return 1
			break;
			
		default:
			//echo "Aucun action trouvée";					
			break; 
	 } 

?>