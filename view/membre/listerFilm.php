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
               <h2> <i class="fas fa-film"></i>   Nos Films </h2> 
            </div>  
            <div class="col-md-3">
            </div> 
    </div> 
        <!-- CARDS--> 
         <div class="flex-container" >
             
            <?php 
           // ===============  GESTION LISTAGE DES FILMS ===============

            // select par categorie

            if (isset($_GET['cat']) && $_GET['cat'] != "") {
                    //Get categorie name
                    $nomCat = $_GET['cat'];
                    $requette="SELECT * FROM film WHERE categorie=?";
                    $stmt = $connexion->prepare($requette);
                    $stmt->execute(array($nomCat));
            }else{
                  //select normal

                  $requette="SELECT * FROM film";
                  $stmt = $connexion->prepare($requette);
                  $stmt->execute();
              }
               
             while($film=$stmt->fetch(PDO::FETCH_OBJ))
             {
             ?>      
            <!--  CARD FILM -->
            <div class="card flex-container" style="width: 20rem;  ">

                    <!-- Botão para acionar modal -->
                    <button type="button"  data-toggle="modal" data-target="#modalPreview">
                            <img class="card-img-top"
                             src="../../img/<?php echo $film->pochette; ?>"
                             width="200"
                             height="300"
                             id="preview">
                    </button>

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
                                class='btn btn-primary'>
                                Panier 
                                <i class="far fa-heart"></i>
                           </button>
                        </form>

                    </div>
            </div>


  <!-- Modal -->
<!--   <div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TituloModalCentralizado"><?php echo $film->titre; ?></h5>
        </div>
        <div class="modal-body">

            <video controls autoplay preload width="250"  >
                  <source src="<?php echo $film->url; ?>" type="video/mp4">
                  Sorry, your browser doesn't support embedded videos.
            </video>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div> -->





            <!--  FIN while -->
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



