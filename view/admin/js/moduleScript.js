//  ____________________________________________________________________
//  PAGE  RESPONSABLE POUR ELABORER LES REQUISITIONS AJAX ASYNCHRONES.
// ____________________________________________________________________

//  PORTÉE GLOBAL 
var filmController ='../../controller/film.php';
var strRecherchee = "";


//========================================================================
// Things that should be done every time a page loads
//========================================================================
$(()=>{
	//alert("Teste");
	 lister(strRecherchee); //(moduleFunction.js)
	 validerFormInputs();//(moduleFunction.js)
});



//========================================================================
// BOUTON (+) : open a modal(cadastro.php) to add a new Film.
//========================================================================
$('#btnPlus').click(()=>    
{
	//Open the modal cadastro.php
	$('.ModalCadastro').modal("show");	

	//Cache le boutton Supprimer du modal
	$("#btnSupprimer").css("display", "none");

	//Change le title du modal 
	$("#ModalTitle").html("Nouveau Film");

	//Get input filds by ID and clean all
	$("#PK_ID_Film").val("");
	$("#titre").val("");
	$("#prix").val("");
	$("#realisateur").val("");
	$("#description").val("");
	$("#pochette").val("");
});

//========================================================================
// BUTTON ADD/EDIT: declenchée dès que le button btnAjouterEditer du modal
//  est appuyé. Elle sert autant pour l'ajout que pour l'édition.
// ========================================================================
$('#btnAjouterEditer').click(()=>    
{		
	//alert("Teste");
	// Si le form est bien rempli
	if( validerEntreeVide() )
	{
		//console.log(validerEntreeVide()); //to test
		//get all form inputs  
		var champs   = $("#formAjouter").serialize();

		//Si le form modal catch un ID
		var PK_ID_Film = $("#PK_ID_Film").val();

		//Si pas de film action = insert, sinon action = update
		var actionType = (PK_ID_Film=="") ?'action=insert' : 'action=update';
		//console.log(actionType); //to test!

		// REQUISITION asynchrone 
		$.ajax({
			method: "POST", 
			url:filmController,
			data: actionType+'&'+champs
			//CALLBACK: Si l'insertion ou update a été fait, msg = 1
			}).done((msg)=>	{
			//si le film a été inseré msn = 1, sinon affiche l'erreur
			var reponse = (msg == 1) ? "Enregistré avec sucess!" : msg;
			//console.log(msg); to test

			//Windos showup	
			$.confirm({
				title: 'Enregistré avec sucess!',
				content: reponse,
				buttons: {
					Ok: ()=>{					
						 $('#ModalCadastro').modal('toggle');//close modal
				       // Recharge la page actuelle à partir du serveur, sans utiliser le cache.		
						// location.reload(true);
						// // lister(strRecherchee);						 
					}				
				}
			});		   
		});
	}
	//else{ console.log(validerEntreeVide()); //to test		}	
 });
	

//========================================================================
// BUTTON DELETE: Cette fonction est declenchée dès que le button btnSupprimer
//   ...( from cadastro.php) du modal est appuyé.
//========================================================================
$('#btnSupprimer').click(()=>    
{	
	//get all inputs from form (Profil_ID et ProfilNom )
	var champs   = $("#formAjouter").serialize();
	var actionType = 'action=delete';

	// REQUISITION asynchrone 
	$.ajax({
		method: "POST", 
		url:filmController,
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

 



