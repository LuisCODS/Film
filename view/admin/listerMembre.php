<?php include '../../includes/head.php'; ?>
<?php include '../../includes/interfaceAdmin.php'; ?>
<?php include '../../includes/Connection.class.php'; ?>



<!-- ========================= Liste des films ========================= -->

<div class="container" style="width: 1200px;">
    <div class="row">
            <div class="col-md-9">
                <h1>Liste des membres <i class="fas fa-users"></i></h1>
            </div>
            <div class="col-md-3">
                  <form class="form-row">
                      <div class="form-row">
                        <div class="col">
                             <input type="search" class="form-control" placeholder="#ID">
                        </div>
                        <div class="col">
                              <button class="form-control" type="submit">Chercher</button>
                        </div>
                      </div>
                  </form>
            </div>


            <!-- TABLE MEMBRE -->       
            
             <div class="col-md-12">
                <table class="table table-hover ">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Courriel</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <!-- TEMPLATE ICI --> 
                    </tbody>
                </table>
            </div>
    </div>
</div> 


<!--  FOOTER  --> 
<?php include '../../includes/footer.php'; ?>

