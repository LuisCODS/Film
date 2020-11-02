
<?php 
    include '../../includes/head.php'; 
    include '../../includes/interfaceAdmin.php';
    include '../../model/Film.class.php';
    // include '../../dao/FilmDAO.class.php';
    require_once("../../includes/ConnectionPDO.php");

    session_start();
    $film = new Film(null,null,null,null,null,null,null,null,);
    
    if (isset($_SESSION["film"]))
     {
        $film =unserialize($_SESSION["film"]);
     }

 ?> 

<!-- _________________  FORM EDITER FILM _________________ --> 
<div class="container">

     <form id="formEditer" enctype="multipart/form-data" action="../../controller/film.php" method="POST" >
        
        <h2>Editer film</h2>

        <!-- GIVES TYPE OF ACTION TO CONTROLLER -->
        <div class="form-group">
              <input
                    type="hidden" 
                    class="form-control" 
                    readonly="true" 
                    id="action" 
                    name="action" 
                    value="update" >
        </div>

        <div class="form-group">
            <label for="PK_ID_Film"></label>
            <input 
                type="hidden" 
                class="form-control"
                id="PK_ID_Film" 
                name="PK_ID_Film"
                value="<?php echo $film->getFilmID(); ?>"> 
        </div>

        <div class="form-group">
            <label for="titre">Titre</label>
            <input 
                type="text"
                class="form-control" 
                id="titre"
                name="titre"
                value="<?php echo $film->getTitre(); ?>"
                size="40">
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input 
                type="text" 
                class="form-control"
                id="prix"
                name="prix" 
                size="40" 
                value="<?php echo $film->getPrix(); ?>">
        </div>

        <div class="form-group">
            <label for="categorie">Categorie</label>
            <select class="form-control" id="categorie" name="categorie">
                <option selected><?php echo $film->getCategorie(); ?></option>
                <option value="Romance">Romance</option>
                <option value="Horreur">Horreur</option>
                <option value="Comedie">Comedie</option>
                <option value="Action">Action</option>
                <option value="Pour la famille">Pour la famille</option>
            </select>
        </div>

        <div class="form-group">
            <label for=realisateur"">Realisateur</label>
            <input
                type="text" 
                class="form-control"
                id="realisateur" 
                name="realisateur"
                value="<?php echo $film->getRealisateur(); ?>">
        </div>

        <div class="form-group">
            <label for=description"">Description</label>
            <textarea 
                type="textarea" 
                class="form-control"
                id="description"
                name="description" 
                value="<?php echo $film->getDescription(); ?>" >    
             </textarea>
        </div>

        <div class="form-group" >                        
            <label for="pochette">Pochette</label>
            <input 
                type="file" 
                class="form-control" 
                id="pochette" 
                name="pochette"
                value="<?php echo $film->getPochette(); ?>">
        </div>

           <button
                 id="btnEnregistrer"
                 type="submit" 
                 value="Envoyer"
                 class="btn btn-primary">Enregistrer
         </button>

      </form> 
</div>  


<!--  FOOTER  --> 
<?php include '../../includes/footer.php'; ?> 