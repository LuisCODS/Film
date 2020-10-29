<?php include '../../includes/head.php'; ?>
<?php include '../../includes/interfaceAdmin.php'; ?>

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
                              <tr>
                                  <td>pochette</td>
                                  <td>titre</td>
                                  <td>prix</td>
                                  <td>categorie</td>
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
                          </tbody>
                      </table>                  
                </div>
                <!-- FIN TABLE -->
            </div> 
      </div>      
</div>     
 <?php include '../../includes/footer.php'; ?>
