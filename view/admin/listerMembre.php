<?php include '../../includes/head.php'; ?>
<?php include '../../includes/interfaceAdmin.php'; ?>
<?php include '../../includes/Connection.class.php'; ?>



<!-- ========================= Liste des Membre ========================= -->

<div class="container" style="width: 1200px;">
      
      <div class="row mb-3">

            <!--  ICONE + TITLE -->
          <div class="col-md-8">
             <h2><i class="fas fa-users"></i>   Liste des Membre </h2> 
          </div>  
          <!--  ZONE RECHERCHE -->         
          <div class="col-md-3">
                 <input type="text" 
                        id="txtInputIdFilm" 
                        name="txtInputIdFilm" 
                        value="" 
                        class="form-control" 
                        placeholder="# ID du film"> 
          </div> 
          <!--  BOUTTON + -->
          <div class="col-md-1">
              <button type="button"
                      class="btn btn-primary float-right" 
                      id="btnPlusAjouterMembre" ><i class="fas fa-plus"></i> 
              </button>
          </div> 
      </div>    

        <!--  RENDER PAGE --> 
      <div class="row">
          <div  id="listTemplateMembre" class="col-md-12">

             <!-- CHARGE LE TEMPLATE(Table filme) ICI !-->
             
          </div>
      </div>
      
</div>     


<?php include '../../includes/footer.php'; ?>

