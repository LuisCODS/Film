
<?php 
include '../../includes/head.php'; 
include '../../includes/interfaceVisiteur.php';
?> 



<!-- _________________  FORM ADOUTER MEMBRE _________________ --> 
<div class="container">


 <form id="formCreate" action="../../controller/membre.php" method="POST" >

           <h2>Formulaire d'inscription</h2>

          <div class="form-group">
                <label for="profil"></label>
                <input
                 type="hidden" 
                 class="form-control" 
                 id="profil" 
                 name="profil" 
                 value="membre">
          </div>

          <!-- FORNECE O TIPO DE ACAO AO CONTROLLER -->
          <div class="form-group">
                <input 
                type="hidden" 
                class="form-control"
                readonly="true" 
                id="action" 
                name="action" 
                value="insert" >
          </div>

          <div class="form-group">
                <label for="nom">Nom</label>
                <input
                 type="text" 
                 class="form-control" 
                 name="nom" 
                 required>
          </div>

          <div class="form-group">
                <label for="prenom">Prenom</label>
                <input 
                type="text" 
                class="form-control" 
                name="prenom" 
                required>
          </div>

          <div class="form-group">
                <label for="courriel">Courriel</label>
                <input 
                type="email" 
                class="form-control" 
                name="courriel"
                required>
          </div>

          <div class="form-group">
                <label for="MDP_membre">Mot de passe</label>
                <input 
                type="password" 
                class="form-control" 
                id="MDP_membre" 
                name="MDP_membre" 
                required>
          </div>

          <div class="form-group">
                <label for="MDP_membreConfirm">Confirmation mot de passe</label>
                <input 
                type="password"
                class="form-control" 
                id="MDP_membreConfirm" 
                name="MDP_membreConfirm" 
                required>
          </div> 

        <div id="alertPassword" class="alert alert-warning" role="alert" style="display:none;">
            <p id="msnErreur"></p>
        </div>

          <button             
              type="submit" 
              onclick="return validerPasswords( )" 
              class="btn btn-primary">
              Enregistrer
          </button>
    </form> 
</div>  


<!--  FOOTER  --> 
<?php include '../../includes/footer.php'; ?> 