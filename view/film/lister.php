<?php 
include '../../includes/head.php'; 
include '../../includes/interfaceAdmin.php'; 
require_once("../../includes/ConnectionPDO.php");
?>

<div class="container"> 
      <div class="row mb-3">
            <!--  ICONE + TITLE -->
            <div class="col-md-8">
               <h2> <i class="fas fa-film"></i>   Liste des Film </h2> 
            </div>  
            <!--  ZONE RECHERCHE -->         
            <div class="col-md-3">
    <!--  <input type="text" 
                          id="txtInput" 
                          name="txtInput" 
                          value="" 
                          class="form-control" 
                          placeholder="# ID du film">  -->
            </div> 
            <!--  BOUTTON NOUVEAU -->
            <div class="col-md-1">
                  <a class="btn btn-outline-success" 
                     href="create.php" 
                     role="button">Nouveau
                  </a>
            </div> 
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
                                    <th scope="col">Prix</th>
                                    <th scope="col">Categorie</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>   

                <?php 
                  $requette="SELECT * FROM film";
                  $stmt = $connexion->prepare($requette);
                  $stmt->execute();
                 while($ligne=$stmt->fetch(PDO::FETCH_OBJ))
                 {
                 ?>

                <tr>
                    <td><img src="../../img/<?php echo($ligne->pochette)?>"   width=80 height=80></td>
                    <td><?php echo($ligne->titre) ?></td>
                    <td><?php echo($ligne->prix)?></td>
                    <td><?php echo($ligne->categorie)?></td>                                
                    <td>
                        <!--ATTACHE UN OBJET À CHAQUE BOUTON -->    
                        <!-- Botão para acionar modal -->
                              
                          <button                              
                              type="button"                              
                              href="editer.php"                           
                              obj='<?php echo json_encode($ligne); ?>'
                              class="btn btn-outline-primary btnEditer" 
                              data-toggle="modal" data-target=".modalEditer">
                              <i class="far fa-edit"></i> 
                              Editer
                        </button> 
                        <button        
                             type="button"
                             href="#"
                             obj='<?php echo json_encode($ligne); ?>'
                             class="btn btn-outline-danger ">
                             Supprimer
                        </button>
<!--                           <a 
                            id="btnEditer"
                            class="btn btn-outline-success " 
                           href="editer.php" 
                           obj='<?php echo($ligne->PK_ID_Film) ?>'
                           role="button">Editer
                          </a> -->
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


<!-- ___________  MODAL - EDITER FILM   _________________--> 

<div class="modal fade modalEditer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
              <!-- HEAD -->
              <div class="modal-header">
                  <h5 class="modal-title" id="TituloModalCentralizado">Page edition</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <!-- BODY -->
              <div class="modal-body">
                    <!-- FORM -->
                    <form id="formModalEdit" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="PK_ID_Film"></label>
                                <input type="hidden" class="form-control" id="PK_ID_Film" name="PK_ID_Film" >
                            </div>
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre"
                                 placeholder="" size="40">
                            </div>
                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input type="text" class="form-control" id="prix" name="prix" placeholder="" size="40">
                            </div>
                            <div class="form-group">
                                <label for="categorie">Categorie</label>
                                <select class="form-control" id="categorie" name="categorie">
                                    <option selected>Choose...</option>
                                    <option value="Romance">Romance</option>
                                    <option value="Horreur">Horreur</option>
                                    <option value="Comedie">Comedie</option>
                                    <option value="Action">Action</option>
                                    <option value="Pour la famille">Pour la famille</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=realisateur"">Realisateur</label>
                                <input type="text" class="form-control" id="realisateur" name="realisateur" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for=description"">Description</label>
                                <textarea type="textarea" class="form-control" id="description" name="description" ></textarea>
                            </div>
                            <div class="form-group" >     
                                <label for="pochette">Pochette</label>
                                <input type="file" class="form-control" id="pochette" name="pochette" >
                            </div>
                    </form>                     
              </div>
              <!-- FOOTER -->
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  <button type="button" id="btnEnregistrerFormEdit"  class="btn btn-success"><i class="fas fa-save"></i> Enregistrers</button>
              </div>

        </div>
    </div>
</div>
<!-- ___________________________   FIN MODAL   _________________________--> 



<?php include '../../includes/footer.php'; ?>
