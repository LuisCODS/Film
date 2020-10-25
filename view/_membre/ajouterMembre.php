
 <?php include '../../includes/head.php'; ?>
<?php include '../../includes/interfaceVisiteur.php'; ?> 

<!-- _________________  FORM ADOUTER MEMBRE _________________ --> 
<div class="container">
<form id="formAjouter"  action="../../controller/membre.php" method="POST"  >
      <div class="form-group">
            <label for="profil"></label>
            <input type="hidden" class="form-control" id="profil" name="profil" value="membre">
      </div>
      <!-- FORNECE O TIPO DE ACAO AO CONTROLLER -->
      <div class="form-group">
            <input type="hidden" class="form-control"
             readonly="true" id="action" name="action" value="insert" >
      </div>
      <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="">
      </div>
      <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="">
      </div>
      <div class="form-group">
            <label for="courriel">Courriel</label>
            <input type="email" class="form-control" id="courriel" name="courriel" placeholder="">
      </div>
      <div class="form-group">
            <label for="tel_membre">Telephone</label>
            <input type="number" class="form-control" id="tel_membre" name="tel_membre" placeholder="">
      </div> 
      <div class="form-group">
            <label for="MDP_membre">Mot de passe</label>
            <input type="password" class="form-control" id="MDP_membre" name="MDP_membre" placeholder="">
      </div>
      <div class="form-group">
            <label for="MDP_membreConfirm">Confirmation mot de passe</label>
            <input type="password"  class="form-control" id="MDP_membreConfirm" name="MDP_membreConfirm" placeholder="">
      </div> 
      <button id="btnEnregistrer" type="submit" class="btn btn-primary">Enregistrer</button>
</form> 
</div>  


<!--  FOOTER  --> 
 <?php include '../../includes/footer.php'; ?> 