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
// BOUTON (+) : Open a window to add a new Film.
//========================================================================
$('#btnPlus').click(()=>    
{
	//Open the modal windows
	$('.ModalCadastro').modal("show");	

	//Cache le boutton Supprimer du modal
	//on javascript sintax:  document.getElementById("btnSupprimer").hidden = true;
	$("#btnSupprimer").css("display", "none");
	//Set title h5 au modal
	$("#ModalTitle").html("Nouveau Film");

	//Clean input  filds
	$("#PK_ID_Film").val("");
	$("#titre").val("");
	$("#prix").val("");
	$("#realisateur").val("");
	$("#description").val("");
	$("#pochette").val("");
});

//========================================================================
// ROLE: Recupere tous les donnes du form et envois au controlleur.
// Cette fonction est declenchée dès que le button btnAjouter
// du modal est appuyé.
// ========================================================================
$('#btnAjouter').click(()=>    
{		
	//alert("Teste");
	// Si le form est bien rempli
	if( validerEntreeVide() )
	{
		//console.log(validerEntreeVide()); //to test
		//get all form inputs  
		var champs   = $("#formAjouter").serialize();
		//Get ID from film
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
				  //        // Recharge la page actuelle à partir du 
				  //        //... serveur, sans utiliser le cache.		
						// location.reload(true);
						// // lister(strRecherchee);						 
					}				
				}
			});		   
		});
	}
	//else{ console.log(validerEntreeVide()); //to test	}	
 });
	



 



