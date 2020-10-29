// //  ____________________________________________________________________
// //  PAGE  RESPONSABLE POUR ELABORER LES REQUISITIONS AJAX ASYNCHRONES.
// // ____________________________________________________________________

// //  PORTÉE GLOBAL 
// var membreController ='../../controller/membre.php';
// var strRecherchee = "";

// //========================================================================
// // Things that should be done every time a page loads
// //========================================================================
// $(()=>{
// 	lister(); //(moduleFunction.js)
// 	validerFormInputs();//(moduleFunction.js)
// });

// //========================================================================
// //  ZONE DE RECHERCHE: declenchée dès qu'il y a une entrée par l'user.
// //========================================================================
// $('#txtInput').keyup(()=>    
// {
// 	//Get textBox value by ID.
// 	strRecherchee = $('#txtInput').val();
// 	// alert(strRecherchee); //To test
// 	lister(strRecherchee);
// });

// //========================================================================
// // BOUTON (+) : One a window to add a new Profil member.
// //========================================================================
// $('#btnPlus').click(()=>    
// {
// 	//Open the modal windows
// 	$('.ModalCadastro').modal("show");	

// 	//Cache le boutton Supprimer du modal
// 	//on javascript sintax:  document.getElementById("btnSupprimer").hidden = true;
// 	$("#btnSupprimer").css("display", "none");
// 	//Set title h5 au modal
// 	$("#ModalTitle").html("Nouveau membre");

// 	//Clean input  filds
// 	$("#PK_ID_Membre").val("");
// 	$("#nom").val("");
// });

// //========================================================================
// // BOUTON AJOUTER: Cette fonction est declenchée dès que le button btnAjouter
// //  ...( from ajouter.php) du modal est appuyé.
// // ========================================================================
// $('#btnAjouter').click(()=>    
// {		
// 	// Si true
// 	if( validerEntreeVide() )
// 	{

// 		//get all form inputs  
// 		var champs   = $("#formAjouter").serialize();
// 		//Get ID 
// 		var PK_ID_Membre = $("#PK_ID_Membre").val();	

// 		//Si le champ est vide, action = insert, sinon action = update
// 		var actionType = (PK_ID_Membre=="") ?'action=insert' : 'action=update';
// 		//console.log(actionType); //to test!

// 		// REQUISITION asynchrone 
// 		$.ajax({
// 			method: "POST", 
// 			url:membreController,
// 			data: actionType+'&'+champs
// 			//CALLBACK: Si l'insertion ou update a été fait, msg = 1
// 			}).done((msg)=>	{
// 			var reponse = (msg == 1) ? "Enregistré avec sucess!" : msg;
// 			//console.log(msg); to test

// 			//Windos showup	
// 			$.confirm({
// 				title: 'Attention!',
// 				content: reponse,
// 				buttons: {
// 					Ok: ()=>{					
// 						//$('#ModalCadastro').modal('toggle');//close modal
// 				         // Recharge la page actuelle à partir du 
// 				         //... serveur, sans utiliser le cache.		
// 						  location.reload(true);
// 						// lister(strRecherchee);						 
// 					}				
// 				}
// 			});		   
// 		});
// 	}
// }); 

// //========================================================================
// //   Cette fonction est declenchée dès que le button btnSupprimer
// //   ...( from ajouter.php) du modal est appuyé.
// //========================================================================
// $('#btnSupprimer').click(()=>    
// {	

// 	var champs   = $("#formAjouter").serialize();
// 	var actionType = 'action=delete';

// 	// REQUISITION asynchrone 
// 	$.ajax({
// 		method: "POST", 
// 		url:membreController,
// 		data: actionType+'&'+champs
		
// 		}).done((callBack)=>
// 		{
// 			var reponse = (callBack == 1) ? "Supprimé avec sucess!" : callBack;
// 			//Windos popup du plugin	
// 			$.confirm({
// 				title: 'Attention!',
// 				content: reponse,
// 				buttons: {
// 					Ok: ()=>{
// 				         // Recharge la page actuelle à partir du 
// 				         //... serveur, sans utiliser le cache.
// 						 location.reload(true);
// 					}				
// 				}
// 			});
// 		});
// }); 


// //  ____________________________________________________________________
// //  PAGE QUI FOURNIE LES FUNCTIONS DE SUPPORT AU FICHIER moduleScript.js
// // ____________________________________________________________________



// // Methode qui retourn 2 champs(proprieté) du Profil.
// function lister()
// {
// 	//Set la valeur à recuperer par(extract($_POST);) au controlleur(profil.php).
// 	var actionType = 'action=getUtilisateur';
// 	//La valeur contenant dans txtInput sera recuperée  
// 	//...par (extract($_POST);) dans le controlleur (profil.php).
// 	//var champs  = "txtInput="+txtInput;

// 	//REQUISITION asynchrone 
// 	$.ajax({
// 		method:'POST', 
// 		url: membreController,
// 		data: actionType
// 		//CALLBACK: un array de profil en format json.
// 	}).done((jsonData)=>{			
// 		//  REQUISITION asynchrone
// 		$.ajax({
// 			method:'POST', 
// 			url: 'template/table-membre.php',
// 			//le callback jsonData est envoyée par la variable obj
// 			data: "obj="+jsonData
// 		//CALLBACK: tout le contenu du fichier table-profil.php	
// 		}).done((template)=>{
// 			//Charge le template, provenant du callback, dans la div 
// 			//... listTemplate avec son id,  dans (index.php) du Membre.
// 			$("#listTemplate").html(template);
// 			// declenche dès que le button btnEditer(table-membre.php) est appuyé
// 			//...ele é pego pela class.
// 			$('.btnDetails').click(function() 
// 			{
// 				//Open the modal windows
// 				$('.ModalDetails').modal("show");	

// 				//convert en json l'objet du button
// 				var obj = JSON.parse($(this).attr("obj") );

// 				//Show object propertys on form input
// 				$("#PK_ID_Membre").val(obj.PK_ID_Membre);
// 				$("#nom").val(obj.nom);	
// 				$("#prenom").val(obj.prenom);	
// 				$("#profil").val(obj.profil);	


// 				//Show le boutton Supprimer par son ID: btnSupprimer
// 				//on javascript sintax:  document.getElementById("btnSupprimer").hidden = false;
// 				$("#btnSupprimer").css("display", "block");	
// 				//Ajoute la valeur du title h5 du modal
// 				$("#ModalTitle").html("Editer membre");		
// 			});

// 		})
// 	});
// }

// //========================================================================
// // Methode qui valide if textbox input is empty.Return true/false.
// // If false, set a new class for textbox input.
// //========================================================================
// function validerEntreeVide()
// {
// 	var reponse = "";

// 	//pour chaque INPUT qui a la class "estVide"
// 	$(".estVide").each(function()
// 	{
// 		//If input isen't clean
// 		if ($(this).val() != "" ){
// 	    	reponse = true;
// 		}else{
// 			$(this).addClass("is-invalid");
// 			reponse = false;
// 		}	
// 	});
// 	return reponse;
// }

// //========================================================================
// // Methode qui valide l'entrée de l'utilisateur.
// // Si le champs est vide, la couleur autours du textbox est à rouge.
// // Outrement, il est à vert.
// //========================================================================
// function validerFormInputs()
// {
// 	//For eatch INPUT TEXTBOX with class = estVide
// 	$(".estVide").each(function()
// 	{
// 		//lorsque l'utilisateur relâche une clé
// 		$(this).keyup(function()
// 		{
// 			//Si textbox is empty
// 			if ($(this).val() == "" )
// 			 {
// 			 	//switch class...
// 				$(this).removeClass("is-valid");
// 				$(this).addClass("is-invalid");								
// 			}	
// 		});
// 	});
// }

// //========================================================================
// // Method that changes color of form input.
// // It's Called in each input field of form:
// // When input field is empty the red color is shown, 
// //... once the field is fill, green color appear.
// //========================================================================
// function isItEmpty(texte)
// {
// 	if($(texte).val().length >= 0)
// 	{
// 		 //console.log($(texte).val().length);//to test
// 		 $(texte).removeClass("is-invalid"); 
// 		 $(texte).addClass("is-valid");
// 	}
// }