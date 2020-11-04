  <?php
  session_start();
 // --------------------------------------------------------------
 // CONTROLLEUR - MEMBRE  
 //--------------------------------------------------------------- 
include '../model/Membre.class.php';
include '../dao/MembreDAO.class.php';


	extract($_POST);
	//var_dump($action);
	//CRUD
	$membreDAO = new MembreDAO();


	switch ($action) //get hiddin input from form
	{
		case 'insert':
			$membre = new Membre(null,$nom,$prenom,$profil,$courriel,$tel_membre,$MDP_membre);	
			$membreDAO->insert($membre);//Si ok return 1	
			// echo $membreDAO->insert($membre);//Si ok return 1
			   header('Location: ../view/membre/lister.php');
		    break;

 		case 'update':
			$membre = new Membre($PK_ID_Membre,$nom,$prenom,$profil,$courriel,$tel_membre,$MDP_membre);
			echo $membreDAO->update($membre);//Si ok return 1
			break;

/*		case 'delete':
				echo $membreDAO->delete($PK_ID_Membre);//Si ok return 1
			break;*/

		case 'login':
				// echo $membreDAO->getMembre($courriel, $MDP_membre);//Si ok return 1
			break;
			
		default:
			//echo "Aucun action trouvée";					
			break; 
	 } 




?>