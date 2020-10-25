<!-- _______________  BEGIN INCLUDE MODAL-AJOUTER   _________________-->
<div class="modal fade ModalCadastro" tabindex="-1" role="dialog" 
     aria-labelledby="myLargeModalLabel" aria-hidden="true" id='ModalCadastro'>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">  
       <!--  MODAL HEAD -->
        <div class="modal-header">
            <h5 class="modal-title" id="ModalTitle"></h5>
                 <!--  X to close modal windows -->
                <button type="button" 
                        class="close"
                        data-dismiss="modal" 
                        aria-label="Close"
                        onclick="location.reload(true);">
                        <span aria-hidden="true">&times;</span>
                </button>
        </div>

        <!--  MODAL BODY -->
        <div class="modal-body">            
           <form id="formAjouter">
                <input type="hidden" id="PK_ID_Film" name="PK_ID_Film" readonly="true" >

                    <div class="form-group">
                        <label for="titre">Titre</label>
                         <input type="text" minlength="1" maxlength="50" 
                                class="form-control estVide" id="titre" name="titre" 
                                onkeypress="isItEmpty(this)"
                                required> 
                               <!--  SHOW WHEN INPUT IS EMPTY  -->
                                <div class="invalid-feedback">
                                    Champs obligatoire!
                               </div>                 
                    </div>
 
                    <div class="form-group">
                        <label for="prix">Prix</label>
                         <input type="text" minlength="1" maxlength="50" 
                                class="form-control estVide" id="prix" name="prix" 
                                onkeypress="isItEmpty(this)"
                                required> 
                               <!--  SHOW WHEN INPUT IS EMPTY  -->
                                <div class="invalid-feedback">
                                    Champs obligatoire!
                               </div>                 
                    </div>

                  <div class="form-group">
                      <label for="categorie">Categorie</label>
                      <select class="form-control estVide" id="categorie" name="categorie">
                          <option selected>Choose...</option>
                          <option value="Romance">Romance</option>
                          <option value="Horreur">Horreur</option>
                          <option value="Comedie">Comedie</option>
                          <option value="Action">Action</option>
                          <option value="Pour la famille">Pour la famille</option>
                      </select>
                  </div>

                    <div class="form-group">
                        <label for="realisateur">Realisateur</label>
                         <input type="text" minlength="1" maxlength="50" 
                                class="form-control estVide" id="realisateur" name="realisateur" 
                                onkeypress="isItEmpty(this)"
                                required> 
                               <!--  SHOW WHEN INPUT IS EMPTY  -->
                                <div class="invalid-feedback">
                                    Champs obligatoire!
                               </div>                 
                    </div>


                    <div class="form-group">
                        <label for="description">Description</label>
                         <input type="text" minlength="1" maxlength="50" 
                                class="form-control estVide" id="description" name="description" 
                                onkeypress="isItEmpty(this)"
                                required> 
                               <!--  SHOW WHEN INPUT IS EMPTY  -->
                                <div class="invalid-feedback">
                                    Champs obligatoire!
                               </div>                 
                    </div>

  
                      <div class="form-group">
                        <label for="pochette">Pochette</label>
                         <input type="file"  
                                class="form-control estVide" id="pochette" name="pochette" 
                                onkeypress="isItEmpty(this)"
                                required> 
                               <!--  SHOW WHEN INPUT IS EMPTY  -->
                                <div class="invalid-feedback">
                                    Champs obligatoire!
                               </div>                 
                        </div>

            </form>            
        </div>

        <!--  MODAL FOOTER -->
        <div class="modal-footer">
            <button class="btn-success"                   
                    data-toggle="modal" 
                    type="button" 
                    id="btnAjouter">
                    <i class="far fa-save"></i> Ajouter
            </button> 
            <button class="btn-danger" 
                    data-dismiss="modal"  
                    type="button" 
                    id="btnSupprimer">
                    <i class="far fa-trash-alt"></i> Supprimer
            </button>
        </div>  

    </div>
  </div>
</div>
<!-- ______________  END INCLUDE MODAL-AJOUTER   ______________-->