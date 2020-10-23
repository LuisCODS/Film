<?php

/* 
DAO (Data acce objet): classes responsables de la création du CRUD 
et de la persistance des données dans la base de données; 
*/

require_once '../includes/Connection.class.php';

Class MembreDAO 
{
	private $cn;

	function __Construct()
	{
		$pdo = new Connection();
		$this->cn = $pdo->getConnection();
	}

	// ______________________________ CDRUD ___________________________

	//Add a new membre
	function insert(Membre $m)
	{
		try {
				$sql = 'insert into Membre 
						(nom,
						prenom,
						profil,
						courriel,
						tel_membre,
						MDP_membre)
						values(?,?,?,?,?,?)';

				$stmt = $this->cn->prepare($sql);

				$stmt->bindValue(1, $m->getNom() );
				$stmt->bindValue(2, $m->getPrenom() );
				$stmt->bindValue(3, $m->getProfil() );
				$stmt->bindValue(4, $m->getCourriel() );
				$stmt->bindValue(5, $m->getTelMembre() );
				$stmt->bindValue(6, $m->getMdpMembre() );

				return $stmt->execute();//true /false

				unset($cn);//close  connexion
				unset($stmt);//libere la memoire

		} catch (PDOException $e) {
			echo 'Erro: '. $e;
		}
	}


	// Update a current Membre
	function upDate(Membre $m)
	{
		try {
				$sql =  'update Membre set
						nom = ?,
						prenom = ?,
						profil = ?,
						courriel = ?,
						tel_membre = ?,	
						MDP_membre = ?													
						where PK_ID_Membre = ?';

				$stmt = $this->cn->prepare($sql);

				
				$stmt->bindValue(1, $m->getNom() );
				$stmt->bindValue(2, $m->getPrenom() );
				$stmt->bindValue(3, $m->getProfil() );
				$stmt->bindValue(4, $m->getCourriel() );
				$stmt->bindValue(5, $m->getTelMembre() );
				$stmt->bindValue(6, $m->getMdpMembre() );
				$stmt->bindValue(7, $m->getMembreID() );

				return $stmt->execute();

		} catch (PDOException $e) {
			echo "Erro: ". $e;
		}
	}

	//Delete a current Membre 
	function delete($PK_ID_Membre)
	{
		try {
				$sql = 'delete  from membre where PK_ID_Membre = ? ';
				$stmt = $this->cn->prepare($sql);
				$stmt->bindValue(1, $PK_ID_Membre);					
				return $stmt->execute();// true/False					
		} catch (PDOException $e) {
			echo "Erro: ". $e;
		}
	}

	// Method that returns a list of Membree in crescent order.
	//Retour: tableau en format json.
	// function getMembre($txtInput)
	// {
	// 	$sql = "select PK_ID_Membre, nom from Membre WHERE nom like '%$txtInput%'  ORDER BY nom ASC ";
	// 	$stmt = $this->cn->prepare($sql);
	// 	$stmt->execute();//Return 1 si ok	
	// 	// Contient un array de Membre
	// 	$tableau = $stmt->fetchall(PDO::FETCH_ASSOC); 
	// 	//Retourn un array en json,car HTML(browser) only ready string.
	// 	 return json_encode($tableau);
	// }

	function getMembre(){
		try {
			$sql = "select PK_ID_Membre, nom, courriel  from Membre";			
			$stmt = $this->cn->prepare($sql);
			$stmt->execute();
			$rs = $stmt->fetchall(PDO::FETCH_ASSOC); 
			// traite comme objt 
			// $rs = $stmt->fetchall(PDO::FETCH_OBJ); 	
			return $rs;

		} catch (PDOException $e) {
			echo 'Erro: '. $e;
		}
	}
}