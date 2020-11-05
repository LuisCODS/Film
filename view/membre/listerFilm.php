<?php
session_start();
include '../../includes/head.php'; 
include '../../includes/interfaceMembre.php'; 
require_once("../../includes/ConnectionPDO.php");
?>
<div class="container">  
    <div class="row mb-5">
              <!--  ICONE + TITLE -->
            <div class="col-md-8">
               <h2> <i class="fas fa-film"></i>   Liste des Films </h2> 
            </div>  
            <!--  ZONE RECHERCHE -->         
            <div class="col-md-3">
              <!--<input type="text" 
                          id="txtInput" 
                          name="txtInput" 
                          value="" 
                          class="form-control" 
                          placeholder="# ID du film">  -->
            </div> 
    </div> 
    <!--  RENDER PAGE -->
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