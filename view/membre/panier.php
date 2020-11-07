<?php
session_start(); 
require_once '../../includes/head.php'; 
require_once '../../includes/interfaceMembre.php';
require_once("../../includes/ConnectionPDO.php");
include '../../model/Membre.class.php';


// =================== GESTION SESSION MEMBRE ===========

  $membre = new Membre(null,null,null,null,null,null,null);

  if (isset ($_SESSION["membre"]) ) 
  {
      $membre = unserialize($_SESSION["membre"]);   
  }
   else 
   {
      header("location: ../../controller/login.php");
      exit();
   }
 ?>
 
<!-- SHOW SESSION MEMBRE -->
<div class="alert alert-success " role="alert">
  Session : <strong><?php  echo $membre->getCourriel();?></strong>
</div>

<!-- ============= FIN  GESTION SESSION MEMBRE============= -->



<?php
// =============== GESTION SESSION  PANIER ===============

   //Premiere fois sur la page (panier vide)
   if (!isset ($_SESSION['panier']) )
   {
      //Cree un session array
      $_SESSION['panier'] = array();
   }


   //  // Si le boutton (Ajouter Panier) a été pesé
   // if (isset($_GET['add']) && $_GET['add'] == "panier")
   // {  
   //     //Get id from film
   //     $idFilm = $_GET['id'];

   //     //Si panier vide
   //     if (!isset ($_SESSION['itens'][$idFilm]) )
   //     {  
   //          //First time iten added
   //          $_SESSION['itens'][$idFilm] = 1;
   //     }else{
   //          //more itens
   //          $_SESSION['itens'][$idFilm] += 1;
   //     } 
   // }



?>
<div class="container"> 
    <h2>Votre panier(<?php echo count($_SESSION['panier']); ?>)</h2>
<div class="row">
      <div  class="col-md-12">  

          <!--TABLE DES FILM-->
          <div class="col-md-12"  >
                <table class="table table-hover ">
                    <thead class="thead-dark">
                          <tr>
                              <th>Pochette</th>
                              <th>Titre</th>
                              <th>Quantite</th>
                              <th>Prix</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody> 
<?php
 // =========================== DEBUT PHP ZONE ===========================
    /* portée globale */
    $subtotal=0; ; 

   //Si pas de film ajouté
   if (count($_SESSION['panier']) == 0) 
   {
          $subtotal = 0;
          $TPS = 0;
          $TVQ = 0;
          $total = 0;

      }else {

           // var_dump($_SESSION['panier']);
           global  $subtotal;

             foreach ( $_SESSION['panier'] as $idFilm => $quantite) 
             {
                $requette="SELECT * FROM film WHERE PK_ID_Film =?";
                $stmt = $connexion->prepare($requette);
                $stmt->bindParam(1, $idFilm);
                $stmt->execute();
                //$films = $stmt-> fetchall();
                $films  = $stmt->fetch(PDO::FETCH_OBJ);

                //var_dump($films); 

                $prix = $quantite * $films->prix;
                $subtotal = $prix + $subtotal;

                //Gestion TPS

                $TPS_Full = $subtotal * 1.05;
                $TPS      = $TPS_Full - $subtotal;

                //Gestion TVQ

                $TVQ_Full = $subtotal * 1.10;
                $TVQ      = $TVQ_Full - $subtotal;

                $total = $subtotal + $TPS + $TVQ;


// =========================== FIN  PHP ZONE ===========================
?> 
  
        <tr>
          <td><img src="../../img/<?php echo $films->pochette ?>" width=80 height=80></td>
          <td><?php  echo$films->titre ?></td>
          <td><?php  echo $quantite    ?></td>  
          <td>$<?php echo $prix       ?></td>
          <td>
           <a href="deleteItem.php?remove=panier&id=<?php echo $films->PK_ID_Film; ?> " 
            class="btn btn-danger">Enlever</a>
          </td>                         
      </tr> 
              <!-- foreach -->
              <?php } ?>  


<?php } ?>


                            </tbody>
                      </table>                  
                </div>
                <!-- FIN TABLE -->

            </div> 
      </div>  
      <hr>    
</div>  

<div class="row">
      <div  class="col-md-9">  
          
      </div> 
      <div  class="col-md-3">  
          Subtotal: $ <?php echo $subtotal ?> <br/>
          TPS: $<?php echo $TPS ?><br/>
          TVQ: $<?php echo $TVQ ?><br/>
          Total: $<?php echo $total ?><br/>
      </div>       
</div>        

<!--  FOOTER  --> 
<?php require_once '../../includes/footer.php'; ?>