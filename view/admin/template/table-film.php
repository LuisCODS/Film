<!--
 ____________________________________________________________________
  CETTE PAGE EST UN TEMPLATE QUI EST ATTACHÉE À LA PAGE admin/listerFilm.php
  ELLE RECOIT LA  REQUISITION ASSINCRONE AJAX (moduleScript.js) 
 ... POUR AFFICHER UNE LIST DE FILM .
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

        <?php
        //recupere la variable obj(tableau json d'obj) 
        //du callback(moduleScript.js) 
        extract($_POST);

        //Decode a JSON string into a PHP objet
        foreach( json_decode($obj) as $film)  
        {
          ?>          
            <tr>
                <th>
                <div id="sizeDivImage" >
                    <a href="/w3images/nature.jpg" target="_blank">
                        <!-- <img class="img-thumbnail" src="../../img/avatar.jpg" width="80" height="80" alt="Nature" > -->
                        <img class="img-thumbnail" src="../../img/<?php echo $film->pochette; ?> " width="80" height="80">
                    </a>
                </div>
                </th>
                    <td><?php echo $film->titre ?></td>
                    <td><?php echo $film->realisateur ?></td>
                    <td><?php echo $film->categorie ?></td>
                    <td><?php echo $film->prix ?></td>
                    <td>
                      <!--Ajoute à chaque bouton  un objet en format Json -->             
                      <button type="button" 
                               class="btn btn-dark btnEditer" 
                               obj='<?php echo json_encode($film); ?>'>
                            <i class="fas fa-user-edit"></i> Editer
                      </button>
                    </td>
            </tr> 
        <?php  } ?>   



        </tbody>
    </table>
</div>