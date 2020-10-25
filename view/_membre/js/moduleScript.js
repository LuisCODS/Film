//========================================================================
// Ce script recoit les donnes provenant des Forms modal
//========================================================================

//  PORTÉE GLOBAL 
var membreController ='../../controller/membre.php';


//========================================================================
// BOUTON (+) : open a modal
//========================================================================
$('#btnPlusAjouterMembre').click(()=>    
{
  alert("Teste");
  //Open the modal 
  //$('.modal_DevenirMembre').modal("show");  

  //Cache le boutton Supprimer du modal
  //$("#btnSupprimer").css("display", "none");

  //Change le title du modal 
  //$("#ModalTitle").html("Nouveau Film");

  //Get input filds by ID and clean all
  // $("#PK_ID_Film").val("");
  // $("#titre").val("");
  // $("#prix").val("");
  // $("#realisateur").val("");
  // $("#description").val("");
  // $("#pochette").val("");
});

