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
                     <input type="text" 
                            id="txtInput" 
                            name="txtInput" 
                            value="" 
                            class="form-control" 
                            placeholder="# ID du film"> 
              </div> 
              <!--  BOUTTON + -->
              <div class="col-md-1">
                  <button type="button"
                          class="btn btn-primary float-right" 
                          id="btnPlus" ><i class="fas fa-plus"></i> 
                  </button>
              </div> 
      </div>    
        <!--  RENDER PAGE --> 
      <div class="row">
          <div  id="listTemplate" class="col-md-12">

             <!-- CHARGE LE TEMPLATE(Table filme) ICI !-->
             
          </div>
      </div>
      
</div>     


<?php include 'includes/cadastro.php'; ?>
<?php include '../../includes/footer.php'; ?>
