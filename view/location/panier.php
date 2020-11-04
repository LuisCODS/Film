<?php
require_once '../../includes/head.php'; 
require_once '../../includes/interfaceVisiteur.php';
require_once("../../includes/ConnectionPDO.php");
?>
<!-- _________________ PRINCIPAL-HOME _________________ --> 
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

                <?php 
                  $requette="SELECT * FROM film WHERE  PK_ID_Film = ? ";
                  $stmt = $connexion->prepare($requette);
                  $stmt->execute();
                 while($ligne=$stmt->fetch(PDO::FETCH_OBJ))
                 {
                 ?>

                <tr>
                    <td><img src="../../img/<?php echo($ligne->pochette)?>" width=80 height=80></td>
                    <td><?php echo($ligne->titre) ?></td>
                    <td></td>
                    <td>$ <?php echo($ligne->prix)?></td>
                    <td>
                      <a 
                        class="btn btn-outline-danger " 
                        href="delete.php?delete=<?php echo ($ligne->PK_ID_Film); ?>"
                        role="button">Supprimer
                      </a> 
                    </td>                         
                </tr>    

             <?php } ?>

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