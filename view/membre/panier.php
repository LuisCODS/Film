<?php
session_start(); 
require_once '../../includes/head.php'; 
require_once '../../includes/interfaceMembre.php';
require_once("../../includes/ConnectionPDO.php");
include '../../model/Membre.class.php';


  // GESTION SESSION MEMBRE
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
      <div class="jumbotron">
          <h1 class="display-4">Votre panier</h1>
          <p class="lead">Page panier.</p>
          <hr class="my-4">

     </div>
</div>    

<?php
// =============== GESTION PANIER ===============

   //Premiere fois sur la page 
   if (!isset ($_SESSION['itens']) )
   {
      $_SESSION['itens'] = array();
   }


    // ADD AU PANIER
   if (isset($_GET['add']) && $_GET['add'] == "panier")
   {  
      
       $idFilm = $_GET['id'];

       //Si pas encore de produit au panier
       if (!isset ($_SESSION['itens'][$idFilm]) )
       {  
            //first time itens is added
            $_SESSION['itens'][$idFilm] = 1;
       }else{
            //more itens
            $_SESSION['itens'][$idFilm] += 1;
       } 
   }

   //DISPLAY PANIER

   //Si pas de film ajouté
   if (count($_SESSION['itens']) == 0) 
   {
    echo "Panier vide!";
   }else {
             foreach ( $_SESSION['itens'] as $idFilm => $prix) 
             {
                $requette="SELECT * FROM film WHERE PK_ID_Film =?";
                $stmt = $connexion->prepare($requette);
                $stmt->bindParam(1, $idFilm);
                $stmt->execute();
                $films = $stmt-> fetchall();

                echo 

                $films[0]["titre"].'<br/>';
                 $prix.'<br/><hr/>';
             }         
    }


?>


 




<!--  FOOTER  --> 
<?php require_once '../../includes/footer.php'; ?>