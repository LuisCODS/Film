<?php
session_start();
include '../../includes/head.php'; 
include '../../includes/interfaceMembre.php'; 
require_once("../../includes/ConnectionPDO.php");
include '../../model/Membre.class.php';

  // GESTION SESSION
  $membre = new Membre(null,null,null,null,null,null,null);

  if (isset ($_SESSION["membre"]) )
   {
    $membre = unserialize($_SESSION["membre"]);   
   }
  else {
    header("location: ../../controller/login.php");
    exit();
   }
?>



<!-- SHOW SESSION -->
<div class="alert alert-success " role="alert">
  Session : <strong><?php  echo $membre->getCourriel();?></strong>
</div>

<div class="container">  
  <div class="row mb-5">
            <!--  ICONE + TITLE -->
          <div class="col-md-8">
             <h2> <i class="fas fa-film"></i>   Liste des categories </h2> 
          </div>  
  </div> 

         <div class="flex-container" id="listTemplate">
          <?php 
              $nomCat = $_GET['cat'];
              $requette="SELECT * FROM film WHERE categorie=?";
              $stmt = $connexion->prepare($requette);
              $stmt->execute(array($nomCat));
             while($film=$stmt->fetch(PDO::FETCH_OBJ))
             {
          ?>  

          <!--  CARD FILM -->
          <div class="card flex-container" style="width: 20rem;  ">
                  <a href="#" target="_blank">
                      <img class="card-img-top"  src="../../img/<?php echo $film->pochette; ?>"width="200" height="300">
                  </a>
                   <div class="card-body">
                      <h5 class="card-title">Titre: <?php echo $film->titre; ?></h5>
                       <p class="card-text" ><strong>Realisateur: <?php echo $film->realisateur; ?></strong></p>
                       <p class="card-text"><strong>Prix: <?php echo $film->prix; ?></strong></p>
                       <p class="card-text"><strong>Categorie: <?php echo $film->categorie; ?></strong></p>
                       <p class="card-text"><strong>Description: <?php echo $film->description; ?></strong></p>
                       <a href="panier.php?add=panier&id=<?php echo $film->PK_ID_Film; ?> " 
                        class="btn btn-primary">Ajouter Panier <i class="far fa-heart"></i></a>
                  </div>
          </div>
         <?php } ?> 
    </div> 
    
</div>  
<?php include '../../includes/footer.php'; ?>