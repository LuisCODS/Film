<?php 

include '../../includes/head.php'; 
include '../../includes/interfaceAdmin.php'; 

  define("USAGER","root");
  define("PASSE","");
  try {
    $dns = 'mysql:host=localhost;dbname=bdfilms';
    $options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $connexion = new PDO( $dns, USAGER, PASSE, $options );
    } catch ( Exception $e ) {
        //echo $e->getMessage();
      echo "Probleme de connexion au serveur de bd";
      exit();
    }


  $requette="SELECT * FROM film";
  $stmt = $connexion->prepare($requette);
  $stmt->execute();

 ?>

<div class="container"> 

      <div class="row mb-3">

            <!--  ICONE + TITLE -->
            <div class="col-md-8">
               <h2> <i class="fas fa-film"></i>   Liste des Film </h2> 
            </div>  

            <!--  ZONE RECHERCHE -->         
            <div class="col-md-3">
    <!--                <input type="text" 
                          id="txtInput" 
                          name="txtInput" 
                          value="" 
                          class="form-control" 
                          placeholder="# ID du film">  -->
            </div> 

            <!--  BOUTTON + -->
            <div class="col-md-1">
                  <a class="btn btn-outline-success" 
                     href="create.php" 
                     role="button">Nouveau
                  </a>
            </div> 
      </div>  

      <div class="row">
            <div  class="col-md-12">               
                <!--TABLE DES MEMBRE-->
                <div class="col-md-12"  >
                      <table class="table table-hover ">
                          <thead class="thead-dark">
                              <tr>
                                  <th scope="col">Pochette</th>
                                  <th scope="col">Titre</th>
                                  <th scope="col">Prix</th>
                                  <th scope="col">Categorie</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>   

                          <?php 
                           while($ligne=$stmt->fetch(PDO::FETCH_OBJ))
                           {
                           ?>

                          <tr>
                              <td><img src="../../img/<?php echo($ligne->pochette)?>"   width=80 height=80></td>
                              <td><?php echo($ligne->titre) ?></td>
                              <td><?php echo($ligne->prix)?></td>
                              <td><?php echo($ligne->categorie)?></td>                                
                              <td>
                                  <button
                                       type="button" href="#" class="btn btn-outline-primary"><i class="far fa-edit"></i> Editer</button>
                                  <button 
                                      type="button" href="#" class="btn btn-outline-warning">Details
                                  </button>
                                  <button 
                                      type="button" href="#" class="btn btn-outline-danger">Supprimer
                                  </button>
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

<?php include '../../includes/footer.php'; ?>
<?php  header("location: lister.php");  ?>