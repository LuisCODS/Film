<!-- ========================================================================
 Classe que utilise l'API (PDO): pour communiquer avec la bd.
======================================================================== -->
<?php
	Class Connection
	{
		private $cn;
		
		function getConnection()
		{
			try	{
				  $this->cn = new PDO('mysql:host=localhost;dbname=bdfilms','root','');
				  $this->cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			} 
			catch(PDOException $e){
			    // echo $e->getMessage();
				echo 'Probleme de connexion au serveur de bd '.$e;
				//exit();
			}
			return $this->cn;
		}		
	}

	// TEST CONNECTION : http://localhost/PROJETS/Film_2020_Git/includes/connection.class.php
// 	try	{
// 		$pdo = new Connection();
// 		$cn = $pdo->getConnection();

// 		$requette = $cn->prepare('select * from membre');
// 		$requette ->execute();

// 		$resultat = $requette->fetchall(PDO:: FETCH_ASSOC);
// 		foreach($resultat as $row)
// 		{
// 			echo $row["nom"];
// 		}
//   } 
//   catch(PDOException $e){
// 	  echo 'Probleme de connexion au serveur de bd '.$e;
//   }		












?>
