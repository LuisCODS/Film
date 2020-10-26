<?php include '../../includes/head.php'; ?>
<?php include '../../includes/interfaceVisiteur.php'; ?>

<div class="container-fluid">   

    <div class="row mb-5">
              <!--  ICONE + TITLE -->
            <div class="col-md-8">
               <h2> <i class="fas fa-film"></i>   Liste des Films </h2> 
            </div>  
            <!--  ZONE RECHERCHE -->         
            <div class="col-md-3">
              <!--<input type="text" 
                          id="txtInput" 
                          name="txtInput" 
                          value="" 
                          class="form-control" 
                          placeholder="# ID du film">  -->
            </div> 
    </div>   

      <!--  RENDER PAGE --> 
    <div class="row">
        <div class="col-md-3">

             <div  id="listTemplate">
               <!-- CHARGE LE TEMPLATE(cards filme) ICI !-->           
             </div>

        </div>
    </div>
    
    
</div>  


<?php include '../../includes/footer.php'; ?>