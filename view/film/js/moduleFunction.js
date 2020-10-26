//  ____________________________________________________________________
//                      FILM FUNCTION
// ____________________________________________________________________



// Retourne les films
function listerFilm()
{
	var actionType = 'action=getFilm';

	$.ajax({
		method:'POST', 
		url: filmController,
		data: actionType
	}).done((jsonData)=>{		

		$.ajax({
			method:'POST', 
			url: 'template/table-film.php',
			//le callback jsonData est envoyée par la variable obj
			data: "obj="+jsonData

		//CALLBACK: tout le contenu du fichier table-profil.php	
		}).done((template)=>{

			//Charge le template, provenant du callback, dans la div 
			//... listTemplate par son id,  dans (listerFilm.php).
			$("#listTemplate").html(template);

		})
	});
}