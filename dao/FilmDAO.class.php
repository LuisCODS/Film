<!-- <?php

/* 
DAO (Data acce objet): classes responsables de la création du CRUD 
et de la persistance des données dans la base de données; 
*/

include '../includes/Connection.class.php';

Class FilmDAO 
{
	private $cn;

	function __Construct()	{
		$pdo = new Connection();
		$this->cn = $pdo->getConnection();
	}
 // ______________________________ CDRUD ___________________________

	function insert(Film $f)
	{		
		try {
			$sql = 'insert into Film 
					(titre,
					prix,
					realisateur,
					categorie,
					pochette,
					description)
					values(?,?,?,?,?,?)';

				$stmt = $this->cn->prepare($sql);

				$stmt->bindValue(1, $f->getTitre() );
				$stmt->bindValue(2, $f->getPrix() );
				$stmt->bindValue(3, $f->getRealisateur() );
				$stmt->bindValue(4, $f->getCategorie() );
				$stmt->bindValue(5, $f->getPochette() );
				$stmt->bindValue(6, $f->getDescription() );

				return $stmt->execute();
				unset($cn);//close  connexion
				unset($stmt);//libere la memoire

		} catch (PDOException $e) {
			echo 'Erro: '. $e;
		}
	}


	function upDate(Film $f)
	{
		try {
				$sql =  'update Film set
                        titre = ?,
						prix = ?,
						realisateur = ?,
						categorie = ?,
						pochette = ?,	
						description = ?													
						where PK_ID_Film = ?';

				$stmt = $this->cn->prepare($sql);

				
				$stmt->bindValue(1, $f->getTitre() );
				$stmt->bindValue(2, $f->getPrix() );
				$stmt->bindValue(3, $f->getRealisateur() );
				$stmt->bindValue(4, $f->getCategorie() );
				$stmt->bindValue(5, $f->getPochette() );
				$stmt->bindValue(6, $f->getDescription() );
				$stmt->bindValue(7, $f->getFilmID() );

				return $stmt->execute();

		} catch (PDOException $e) {
			echo "Erro: ". $e;
		}
	}

	function delete($PK_ID_Film)
	{
		try {
				$sql = 'delete from Film where PK_ID_Film = ? ';
				$stmt = $this->cn->prepare($sql);
				$stmt->bindValue(1, $PK_ID_Film);					
				return $stmt->execute();// true/False					
		} catch (PDOException $e) {
			echo "Erro: ". $e;
		}
	}

	function list()
	{
        $sql = 'select PK_ID_Film,titre,prix,realisateur,categorie,pochette,description from Film';
		$stmt = $this->cn->prepare($sql);
		$stmt->execute();
		$rs = $stmt->fetch(PDO::FETCH_OBJ); 
		// traiter comme objt  $rs = $stmt->fetchall(PDO::FETCH_OBJ); 
		return($rs);
	}

}

 