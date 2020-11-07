<?php
    session_start();
    include '../../includes/head.php'; 
    include '../../includes/interfaceMembre.php'; 
    include '../../model/Membre.class.php';
    require_once("../../includes/ConnectionPDO.php");

// =================== GESTION SESSION MEMBRE ===========

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

<!-- DISPLAY SESSION -->
<div class="alert alert-success " role="alert">
  Session : <strong><?php  echo $membre->getCourriel();?></strong>
</div>

<!-- ========================= CARD ZONE ========================== -->


<div class="container">  
    <div class="row mb-5">
              <!--  ICONE + TITLE -->
            <div class="col-md-8">
               <h2> <i class="fas fa-film"></i>   Liste des Films </h2> 
            </div>  
            <div class="col-md-3">
            </div> 
    </div> 
        <!-- CARDS--> 
         <div class="flex-container" >
             
            <?php 
             // ===============  GESTION LISTAGE DES FILMS ===============

            if (isset($_GET['cat']) && $_GET['cat'] != "") {
                    //Get categorie name
                    $nomCat = $_GET['cat'];
                    $requette="SELECT * FROM film WHERE categorie=?";
                    $stmt = $connexion->prepare($requette);
                    $stmt->execute(array($nomCat));
            }else{

                  $requette="SELECT * FROM film";
                  $stmt = $connexion->prepare($requette);
                  $stmt->execute();
              }
               
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
                         <p class="card-text" >Realisateur: <?php echo $film->realisateur; ?></p>
                         <p class="card-text">Prix: <?php echo $film->prix; ?>$</p>
                         <p class="card-text">Categorie: <?php echo $film->categorie; ?></p>
                         <p class="card-text">Description: <?php echo $film->description; ?></p>
                         <!--  <a href="panier.php?add=panier&id=<?php echo $film->PK_ID_Film; ?> " 
                            class="btn btn-primary">Ajouter Panier <i class="far fa-heart"></i></a> -->

                    <!-- BUTTON AJOUTER PANIER -->         
                    <form method='post' action=''>
                        <input type='hidden' name='id_film' value="<?php echo $film->PK_ID_Film; ?>" />
                        <input type='hidden' name='action' value="ajouter" />
                        <button 
                          type='submit' 
                          onclick="changeCouleurCoeur('coeurPanier')" 
                          class='btn btn-primary'>
                          Panier 
                          <i class="far fa-heart" id="coeurPanier"></i>
                       </button>
                    </form>

                    </div>
            </div>
            <!--  FIN TEMPLATE CARD FILM -->
            <?php  } ?> 
         </div>       
</div>  



<?php
// =========================== GESTION SESSION  PANIER ===========================

   //Premiere fois sur la page (panier vide)
   if (!isset ($_SESSION['panier']) )
   {
      //Create session card
      $_SESSION['panier'] = array();
   }


    // Si le boutton (Ajouter Panier) a été pesé
   if (isset($_POST['id_film']) && $_POST['id_film'] != "")
   {  
       //Get id from film
       $idFilm = $_POST['id_film'];

      //print_r($idFilm);
      
       //Si panier vide
       if (!isset ($_SESSION['panier'][$idFilm]) )
       {  
            //First time iten added
            $_SESSION['panier'][$idFilm] = 1;
       }else{
            //more panier
            $_SESSION['panier'][$idFilm] += 1;
       } 
   }
?>

<?php include '../../includes/footer.php'; ?>
