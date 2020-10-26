//  ____________________________________________________________________
//  PAGE  RESPONSABLE POUR ELABORER LES REQUISITIONS AJAX ASYNCHRONES.
// ____________________________________________________________________

//  PORTÉE GLOBAL 
var membreController ='../../controller/membre.php';
var strRecherchee = "";

//========================================================================
// Things that should be done every time a page loads
//========================================================================
$(()=>{
	lister(); //(moduleFunction.js)
	validerFormInputs();//(moduleFunction.js)
});

//========================================================================
//  ZONE DE RECHERCHE: declenchée dès qu'il y a une entrée par l'user.
//========================================================================
$('#txtInput').keyup(()=>    
{
	//Get textBox value by ID.
	strRecherchee = $('#txtInput').val();
	// alert(strRecherchee); //To test
	lister(strRecherchee);
});

//========================================================================
// BOUTON (+) : One a window to add a new Profil member.
//========================================================================
$('#btnPlus').click(()=>    
{
	//Open the modal windows
	$('.ModalCadastro').modal("show");	

	//Cache le boutton Supprimer du modal
	//on javascript sintax:  document.getElementById("btnSupprimer").hidden = true;
	$("#btnSupprimer").css("display", "none");
	//Set title h5 au modal
	$("#ModalTitle").html("Nouveau membre");

	//Clean input  filds
	$("#PK_ID_Membre").val("");
	$("#nom").val("");
});

//========================================================================
// BOUTON AJOUTER: Cette fonction est declenchée dès que le button btnAjouter
//  ...( from ajouter.php) du modal est appuyé.
// ========================================================================
$('#btnAjouter').click(()=>    
{		
	// Si true
	if( validerEntreeVide() )
	{

		//get all form inputs  
		var champs   = $("#formAjouter").serialize();
		//Get ID 
		var PK_ID_Membre = $("#PK_ID_Membre").val();	

		//Si le champ est vide, action = insert, sinon action = update
		var actionType = (PK_ID_Membre=="") ?'action=insert' : 'action=update';
		//console.log(actionType); //to test!

		// REQUISITION asynchrone 
		$.ajax({
			method: "POST", 
			url:membreController,
			data: actionType+'&'+champs
			//CALLBACK: Si l'insertion ou update a été fait, msg = 1
			}).done((msg)=>	{
			var reponse = (msg == 1) ? "Enregistré avec sucess!" : msg;
			//console.log(msg); to test

			//Windos showup	
			$.confirm({
				title: 'Attention!',
				content: reponse,
				buttons: {
					Ok: ()=>{					
						//$('#ModalCadastro').modal('toggle');//close modal
				         // Recharge la page actuelle à partir du 
				         //... serveur, sans utiliser le cache.		
						  location.reload(true);
						// lister(strRecherchee);						 
					}				
				}
			});		   
		});
	}
}); 

//========================================================================
//   Cette fonction est declenchée dès que le button btnSupprimer
//   ...( from ajouter.php) du modal est appuyé.
//========================================================================
$('#btnSupprimer').click(()=>    
{	

	var champs   = $("#formAjouter").serialize();
	var actionType = 'action=delete';

	// REQUISITION asynchrone 
	$.ajax({
		method: "POST", 
		url:membreController,
		data: actionType+'&'+champs
		
		}).done((callBack)=>
		{
			var reponse = (callBack == 1) ? "Supprimé avec sucess!" : callBack;
			//Windos popup du plugin	
			$.confirm({
				title: 'Attention!',
				content: reponse,
				buttons: {
					Ok: ()=>{
				         // Recharge la page actuelle à partir du 
				         //... serveur, sans utiliser le cache.
						 location.reload(true);
					}				
				}
			});
		});
}); 


