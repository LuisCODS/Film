<?php include '../../includes/head.php'; ?>
<?php include '../../includes/interfaceAdmin.php'; ?>
<?php include '../../model/Membre.class.php'; ?>
<?php include '../../dao/MembreDAO.class.php';  ?>

<?php
    //OBJ API BD FOR CRUD ACCES
    $membreDAO = new MembreDAO();
    $rs = $membreDAO->getMembre();
?>          
           


<div class="container" style="width: 1200px;">
<div class="row">
        <div class="col-md-12">
            <h1>Liste des membres <i class="fas fa-users"></i></h1>
            </div>
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

                    <?php  foreach($rs as $row) { ?>                            
                                <tr>
                                    <th> <?php echo $row["PK_ID_Membre"] ?> </th>
                                    <td>  <?php echo $row["nom"] ?> </td>
                                    <td> <?php echo $row["courriel"] ?>  </td>
                                    <td>
                                        <button type="button" class="btn btn-primary"><i class="far fa-edit"></i> Editer</button>
                                        <button type="button" class="btn btn-warning"><i class="far fa-edit"></i> Details</button>
                                        <button type="button" class="btn btn-danger"><i class="far fa-edit"></i> Supprimer</button>
                                    </td>
                                </tr>
                    <?php  } ?>


                </tbody>
            </table>
        </div>
</div>
</div>


<!--  FOOTER  --> 
<?php include '../../includes/footer.php'; ?>