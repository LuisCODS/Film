//  ____________________________________________________________________
//                        SCRIPT ADMIN
// __________________________ __________________________________________

//  PORTÉE GLOBAL 
var filmController ='../../controller/film.php';
var membreController ='../../controller/membre.php';
var strRecherchee = "";


//========================================================================
// Things that should be done every time a page loads
//========================================================================
$(()=>{
	//alert("Teste");
	 listerFilm(); //(moduleFunction.js)
	 listerMembre();
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

	//clean all form inputs
	$("#PK_ID_Film").val("");
	$("#titre").val("");
	$("#prix").val("");
	$("#realisateur").val("");
	$("#description").val("");
	$("#pochette").val("");
});

	
$('#btnRegistrer').click(()=>    
{		
	//alert("Teste");
	// CHECK IF INPUTS AREN'T EMPTY
	if( validerEntreeVide() )
	{
		//Ramassa les données du form
		var champs   = $("#formAjouter").serialize();

		//Si le form modal catch un ID
		var PK_ID_Film = $("#PK_ID_Film").val();
		//SI FILM ALORS ON L'ÉDITE, SI VIDE, L'ACTION EST CREATE
		var actionType = (PK_ID_Film=="") ?'action=insert' : 'action=update';

		// ENVOIE LE FORM AU CONTROLLEUR
		$.ajax({
			method: "POST", 
			url:filmController,
			data: actionType+'&'+champs
			//CALLBACK: Si l'insertion ou update a été fait, msg = 1
			}).done((msg)=>	{
			//si le film a été inseré msn = 1, sinon affiche l'erreur
			//var reponse = (msg == 1) ? "Enregistré avec sucess!" : msg;
			//console.log(msg); to test

			//Windos showup	
			$.confirm({
				title: 'Enregistré avec sucess!',
				//content: reponse,
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

 



