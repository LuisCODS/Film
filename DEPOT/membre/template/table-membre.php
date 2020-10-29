
<!--TABLE DES MEMBRE-->
<div class="col-md-12"  >
    <table class="table table-hover ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Profil</th>
                <th scope="col">Gestion</th>
            </tr>
        </thead>
        <tbody>

        <?php
        //recupere la variable obj(tableau json d'obj) 
        //du callback(moduleScript.js) 
        extract($_POST);

        //Decode a JSON string into a PHP objet
        foreach( json_decode($obj) as $membre)  
        {
          ?>          
            <tr>
                <td><?php echo $membre->nom ?></td>
                <td><?php echo $membre->prenom ?></td>
                <td><?php echo $membre->profil ?></td>
                <td>
                  <!--Ajoute à chaque bouton  un objet en format Json -->             
                  <button type="button" 
                           class="btn btn-warning btnDetails" 
                           obj='<?php echo json_encode($membre); ?>'>
                        <i class="fas fa-user-edit"></i> Details
                  </button>
                </td>
            </tr> 
        <?php  } ?>   



        </tbody>
    </table>
</div>