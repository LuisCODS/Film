<?php
session_start();
include '../../includes/head.php'; 
include '../../includes/interfaceMembre.php'; 
include '../../model/Membre.class.php';
require_once("../../includes/ConnectionPDO.php");

// GESTION SESSION
$membre = new Membre(null,null,null,null,null,null,null,);

if (isset ($_SESSION["membre"]) )
 {
    $membre = unserialize($_SESSION["membre"]);   
 }
else {
    header("location: ../../controller/login.php");
    exit();
 }


?>
<!-- MSN DE BIENVENUE -->
<div class="alert alert-success " role="alert">
  Session : <strong><?php  echo $membre->getCourriel();?></strong>
</div>




<div class="container">  
    <div class="row mb-5">
              <!--  ICONE + TITLE -->
            <div class="col-md-8">
               <h2> <i class="fas fa-film"></i>   Liste des Films </h2> 
            </div>  
            <!--  ZONE RECHERCHE -->         
            <div class="col-md-3">
            </div> 
    </div> 

         <div class="flex-container" id="listTemplate">
             <!-- CARDS--> 
            <?php 
              $requette="SELECT * FROM film";
              $stmt = $connexion->prepare($requette);
              $stmt->execute();
             while($film=$stmt->fetch(PDO::FETCH_OBJ))
             {
             ?>      
            <!-- TEMPLATE CARD FILM -->
            <div class="card flex-container" style="width: 20rem;  ">
                    <a href="#" target="_blank">
                        <img class="card-img-top"  src="../../img/<?php echo $film->pochette; ?>"width="200" height="300">
                    </a>
                     <div class="card-body">
                        <h5 class="card-title">Titre: <?php echo $film->titre; ?></h5>
                         <p class="card-text" >Realisateur: <?php echo $film->realisateur; ?></p>
                         <p class="card-text">Prix: <?php echo $film->prix; ?>$</p>
                         <p class="card-text">Categorie: <?php echo $film->categorie; ?></p>
                         <p class="card-text">Description: <?php echo $film->description; ?></p>
                         <a href="#" class="btn btn-primary">Ajouter Panier <i class="far fa-heart"></i></a>

                    </div>
            </div>
            <!--  FIN TEMPLATE CARD FILM -->
            <?php  } ?> 
         </div>       
</div>  
<?php include '../../includes/footer.php'; ?>