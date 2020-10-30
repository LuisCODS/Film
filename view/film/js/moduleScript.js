//  ____________________________________________________________________
//                      FILM SCRIPT
// ____________________________________________________________________
//  PORTÉE GLOBAL 
	var filmController ='../../controller/film.php';


//========================================================================
// Things that should be done every time a page loads
//========================================================================
//$(()=>{

	//alert("TEste");
	//insert();


//});

//========================================================================
// BOUTON EDITER:
// Ce bouton est recuperé par la classe (btnEditer), dans le button Editer
//de la page lister.php.
//========================================================================
$('.btnEditer').click(function()
{    
	//alert("Tetse");
	$('.modalEditer').modal("show");	

	//convert en json l'objet du button
	var obj = JSON.parse($(this).attr("obj") );
	//var obj = $(this).attr("obj");

    // alert($(this).attr("obj"));
	//Show object propertys on form input
	$("#titre").val(obj.titre);
	$("#prix").val(obj.prix);		
	$("#categorie").val(obj.categorie);	
	$("#realisateur").val(obj.realisateur);
	$("#description").val(obj.description);
	//$("#pochette").val(obj.pochette);
});

//========================================================================
// CREATE
// ========================================================================
$('#btnEnregistrerFormCreate').click(()=>    
{		

		//get all form modal inputs  
		var champs   = $("#formModalEdit").serialize();
		var action = 'action=update';
		//console.log(action); //to test!

		$.ajax({
			method: "POST", 
			url:"../../controller/film.php",
			data: action+'&'+champs
			//CALLBACK: Si l'insertion ou update a été fait, msg = 1
			}).done((msg)=>	{
			var reponse = (msg == 1) ? "Enregistré avec sucess!" : msg;
			console.log(msg); 

			//Windos showup	
			$.confirm({
				title: 'Attention!',
				content: reponse,
				buttons: {
					Ok: ()=>{					
						 $('.modalEditer').modal('toggle');//close modal 
					}				
				}
			});		   
		});
	
}); 

//========================================================================
// EDITER: recupere le clic par l'ID du bouton (Enregistrer) dans le modal 
// footer,  au lister.php.
// ========================================================================
$('#btnEnregistrerFormEdit').click(()=>    
{		

		//alert("Teste");
		//get all form modal inputs  
		var champs   = $("#formModalEdit").serialize();
		var action = 'action=update';
		//console.log(action); //to test!

		$.ajax({
			method: "POST", 
			url:filmController,
			data: action+'&'+champs
			//CALLBACK: Si l'insertion ou update a été fait, msg = 1
			}).done((msg)=>	{
			var reponse = (msg == 1) ? "Enregistré avec sucess!" : msg;

			//Windos showup	
			$.confirm({
				title: 'Attention!',
				content: reponse,
				buttons: {
					Ok: ()=>{					
						 $('.modalEditer').modal('toggle');//close modal 
					}				
				}
			});		   
		});
	
}); 


//========================================================================
//   Cette fonction est declenchée dès que le button btnSupprimer
//   ...( from ajouter.php) du modal est appuyé.
//========================================================================
/*$('#btnSupprimer').click(()=>    
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
});*/