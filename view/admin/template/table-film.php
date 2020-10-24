<!--
 ____________________________________________________________________
  CETTE PAGE RECOIT LA  REQUISITION ASSINCRONE AJAX (moduleScript.js) 
 ... POUR AFFICHER UNE LIST DE PROFIL.
 ____________________________________________________________________
 -->

        <!--TABLE DES FILMS-->
        <div class="col-md-12"  >
            <table class="table table-hover ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Pochette</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Realisateur</th>
                        <th scope="col">Categorie</th>
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
                        <td>$7</td>
                        <td>
                            <button type="button" class="btn btn-primary"><i class="far fa-edit"></i> Editer</button>
                            <button type="button" class="btn btn-warning">Details</button>
                            <button type="button" class="btn btn-danger">Supprimer</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
