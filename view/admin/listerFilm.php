<?php include '../../includes/head.php'; ?>
<?php include '../../includes/interfaceAdmin.php'; ?>


<!--  TABLE  --> 
<div class="container-fluid" style="width: 1200px;" >
    <div class="row mb-3">
        <div class="col-md-11">
            <h1>Liste des films <i class="fas fa-film"></i> </h1>
        </div>
        <!--  BUTTON  NOUVEAU FILM  -->
        <div class="col-md-1">
            <a href="ajouterFilm.php" class="btn btn-primary btn-lg active" 
            role="button" aria-pressed="true">Nouveau</a>
        </div>
    </div>
    <div class="row">
        <!--TABLE DES FILMS-->
        <div class="col-md-12"  >
            <table class="table table-hover ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Pochette</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Realisateur</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Durée</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Gestion</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th>
                            <div id="sizeDivImage" >
                                <a href="/w3images/nature.jpg" target="_blank">
                                    <img class="img-thumbnail" src="../../img/avatar.jpg" alt="Nature" >
                                </a>
                            </div>
                        </th>
                        <td>Anaconde</td>
                        <td>Mike Steart</td>
                        <td>Romance</td>
                        <td>120 minuts</td>
                        <td>$7</td>
                        <td>
                            <button type="button" class="btn btn-primary"><i class="far fa-edit"></i> Editer</button>
                            <button type="button" class="btn btn-warning">Details</button>
                            <button type="button" class="btn btn-danger">Supprimer</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>        
    </div>    
</div>


<!--  FOOTER  --> 
<?php include '../../includes/footer.php'; ?>