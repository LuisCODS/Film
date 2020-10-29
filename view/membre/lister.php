<?php require_once '../../includes/head.php'; ?>
<?php require_once '../../includes/interfaceAdmin.php'; ?>


<div class="container">    
      <div class="row mb-3">
		        <!--  ICONE + TITLE -->
		      <div class="col-md-8">
		         <h2> <i class="fas fa-film"></i>   Liste des membres </h2> 
		      </div>  
      </div>    
      <div class="row">
          <div  class="col-md-12">
				<!--TABLE DES MEMBRE-->
				<div class="col-md-12"  >
				    <table class="table table-hover ">
				        <thead class="thead-dark">
				            <tr>
				                <th scope="col">Nom</th>
				                <th scope="col">Prenom</th>
				                <th scope="col">Gestion</th>
				            </tr>
				        </thead>
				        <tbody>				        
				            <tr>
				                <td>Nom</td>
				                <td>Prenom</td>
				                <td>       
				                  <button type="button" 
				                           class="btn btn-secondary" btnDetails">
				                         <i class="fas fa-user-edit"></i> Details
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
