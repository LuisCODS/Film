<?php

require_once '../includes/Connection.class.php';

Class Film_LocationDAO 
{
	private $cn;

	function __Construct()
	{
		$pdo = new Connection();
		$this->cn = $pdo->getConnection();
	}

	// ______________________________ CDRUD ___________________________

	function insert(Film_Location $fl)
	{
		try {
				$sql = 'insert into Film_Location 
						(PK_ID_Film, PK_ID_Location)
						values(?,?)';
				$stmt = $this->cn->prepare($sql);
				$stmt->bindValue(1, $fl->getFilmID() );
				$stmt->bindValue(2, $fl->getLocationID() );
				return $stmt->execute();

		} catch (PDOException $e) {
			echo 'Erro: '. $e;
		}
	}


}

