<?php
session_start(); 
require_once '../../includes/head.php'; 
require_once '../../includes/interfaceMembre.php';
require_once("../../includes/ConnectionPDO.php");
include '../../model/Membre.class.php';


// GESTION SESSION
$membre = new Membre(null,null,null,null,null,null,null,);

if (isset ($_SESSION["membre"]) ){
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

<!-- _________________ PANIER MEMBRE _________________ --> 
<div class="container">
      <div class="jumbotron">
          <h1 class="display-4">Votre panier</h1>
          <p class="lead">Page panier.</p>
          <hr class="my-4">

     </div>
</div>      


<div class="container"> 
      <div class="row mb-3">


      </div>  
      <div class="row">
            <div  class="col-md-12">               
                <!--TABLE DES FILM-->
                <div class="col-md-12"  >
                      <table class="table table-hover ">
                          <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Pochette</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>   


                            </tbody>
                      </table>                  
                </div>
                <!-- FIN TABLE -->

            </div> 
      </div>      
</div>   



<!-- ___________________________________________________ --> 

<!--  FOOTER  --> 
<?php require_once '../../includes/footer.php'; ?>