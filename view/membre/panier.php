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
 
<!-- SHOW SESSION MEMBRE -->
<div class="alert alert-success " role="alert">
  Session : <strong><?php  echo $membre->getCourriel();?></strong>
</div>



<?php
// =============== GESTION SESSION  PANIER ===============

   //Premiere fois sur la page 
   if (!isset ($_SESSION['itens']) )
   {
      //Cree un session array
      $_SESSION['itens'] = array();
   }


    // Si l'url (add==panir)  a été envoyée 
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
// =========================== FIN  PHP ZONE ===========================
?>
<div class="container"> 
    <h2>Votre panier(<?php echo count($_SESSION['itens']); ?>)</h2>
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
   if (count($_SESSION['itens']) == 0) 
   {
        //echo "est vide!";
          $subtotal = 0;
      }else {

           // var_dump($_SESSION['itens']);
           global  $subtotal;

             foreach ( $_SESSION['itens'] as $idFilm => $quantite) 
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
               // $subtotal = $subtotal+$subtotal;

                //print_r($subtotal);
                // $TPS = $quantite * $films->prix;
                // $TVQ = $quantite * $films->prix;
/*
La nouvelle formule du calcul de la TPS(5%) et TVQ(9,975%)
Montant avant taxes x (Taux de TPS/100) = Montant TPS
Montant hors taxes x  (Taux de TVQ/100) = Montant TVQ
Montant hors taxes +  Montant TPS + Montant TVQ = Montant avec taxes
*/
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
              <?php echo $subtotal ?>

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
          TVQ: $<br/>
          TPS: $<br/>
          Total: $<br/>
      </div>       
</div>        

<!--  FOOTER  --> 
<?php require_once '../../includes/footer.php'; ?>