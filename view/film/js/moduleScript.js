//  ____________________________________________________________________
//                      FILM SCRIPT
// ____________________________________________________________________

//  PORTÉE GLOBAL 
//var filmController ='../../controller/film.php';


//========================================================================
// Things that should be done every time a page loads
//========================================================================
$(()=>{

	//alert("TEste");
	//insert();


});

// //========================================================================
// // BOUTON (+) : One a window to add a new Movie
// //========================================================================
$('#btnCreate').click(()=>    
{
	
	//header("location: create.php"); 
	//header("location: ../index.php"); 
	//Open the modal windows
	// $('.ModalCadastro').modal("show");	

	// //Cache le boutton Supprimer du modal
	// //on javascript sintax:  document.getElementById("btnSupprimer").hidden = true;
	// $("#btnSupprimer").css("display", "none");
	// //Set title h5 au modal
	// $("#ModalTitle").html("Nouveau membre");

	// //Clean input  filds
	// $("#PK_ID_Membre").val("");
	// $("#nom").val("");
});



// Retourne les films
// function listerFilm()
// {
// 	var actionType = 'action=getFilm';

// 	$.ajax({
// 		method:'POST', 
// 		url: filmController,
// 		data: actionType
// 	}).done((jsonData)=>{		

// 		$.ajax({
// 			method:'POST', 
// 			url: 'template/table-film.php',
// 			//le callback jsonData est envoyée par la variable obj
// 			data: "obj="+jsonData

// 		//CALLBACK: tout le contenu du fichier table-profil.php	
// 		}).done((template)=>{

// 			//Charge le template, provenant du callback, dans la div 
// 			//... listTemplate par son id,  dans (listerFilm.php).
// 			$("#listTemplate").html(template);

// 		})
// 	});
// }