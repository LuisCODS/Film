<!-- ______________________________________    MODAL - CREATE MEMBRE    ______________________________________-->

<div class="modal fade" id="modal_DevenirMembre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <!-- HEAD -->
          <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-user"></i>   Nouveau membre</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
               </button>
          </div>
          <!-- BODY -->
          <div class="modal-body">
                 <!-- FORM -->
                 <form id="formAjouter"  enctype="multipart/form/data">
                    <div class="form-group">
                         <label for="profil"></label>
                         <input type="hidden" class="form-control" id="profil" name="profil" value="membre">
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
                         <input type="password"  class="form-control" id="MDP_membreConfirm" name="MDP_membreConfirm" placeholder="Confirmez votre mot de passe">
                    </div> 
                </form>         
           <!-- FOOTER -->     
          </div>
          <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
               <button type="button" id="btnSalvar" class="btn btn-success"><i class="far fa-save"></i> Enregistrer</button>
          </div>
    </div>
  </div>
</div>
<!-- ______________________________________  FIN  MODAL - CREATE MEMBRE    ______________________________________-->

 <!--  js  --> 
<!-- <?php include '../membre/js/moduleScript.js'; ?> -->