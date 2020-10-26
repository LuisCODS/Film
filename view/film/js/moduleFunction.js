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


			//========================================================================
			// BUTTON EDIT: declenche dès que le button btnEditer qui est dans(table-film.php)
			// est appuyé ele é pego pela class.
			//========================================================================
			$('.btnEditer').click(function() 
			{
				//Abre o mesmo modal mostrando os campos do objeto
				$('.ModalCadastro').modal("show");	

				//Prend l'attribut (un objet) du button et le convert en json
				var obj = JSON.parse($(this).attr("obj") );
				//alert(obj); test

				//Show object propertys on form input
				$("#PK_ID_Film").val(obj.PK_ID_Film);
				$("#titre").val(obj.titre);	
				$("#prix").val(obj.prix);	
				$("#categorie").val(obj.categorie);	
				$("#realisateur").val(obj.realisateur);	
				$("#description").val(obj.description);	

				//Show le boutton Supprimer par son ID: btnSupprimer
				//on javascript sintax:  document.getElementById("btnSupprimer").hidden = false;
				$("#btnSupprimer").css("display", "block");	
				//Change le titre du modal
				$("#ModalTitle").html("Editer Film");		
			});

		})
	});
}