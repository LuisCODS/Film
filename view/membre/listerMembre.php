
<?php include '../../includes/head.php'; ?>
<?php include '../../includes/interfaceAdmin.php'; ?>
<?php include '../../model/Membre.class.php'; ?>
<?php include '../../dao/MembreDAO.class.php';  ?>

<?php
	include '../../dao/MembreDAO.class.php';

	$rep="<table border=1>";
	$rep.="<caption>LISTE DES FILMS</caption>";
	$rep.="<tr><th>#</th>
		   <th>Nom</th>
		   <th>Courriel</th>
		   <th>Action</th>
		   </tr>";

	$requette="SELECT * FROM membre";
	try{
		 $stmt = $connexion->prepare($requette);
		 $stmt->execute();
		 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			$rep.="<tr><td>".($ligne->PK_ID_Membre)."</td><td>".($ligne->nom)."</td><td>".($ligne->courriel)."</td><td>"."' width=80 height=80></td></tr>";		 }
	 }catch (Exception $e){
		echo "Probleme pour lister";
	 }finally {
		$rep.="</table>";
		unset($connexion);
		unset($stmt);
		echo $rep;
	 }


?>
<br><br>
<a href="../films.html">Retour à la page d'accueil</a>