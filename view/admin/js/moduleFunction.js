//  ____________________________________________________________________
//                       FUNCTION ADMIN
// __________________________ __________________________________________



//========================================================================
// Retourne les films
//========================================================================
function listerFilm()
{
	//Set la valeur à recuperer par(extract($_POST);) au controlleur
	var actionType = 'action=getFilm';
	//La valeur contenant dans txtInput sera recuperée  
	//...par (extract($_POST);) dans le controlleur (profil.php).
	//var champs  = "txtInput="+txtInput;

	//REQUISITION asynchrone 
	$.ajax({
		method:'POST', 
		url: filmController,
		data: actionType
		//CALLBACK: un array en format json.
	}).done((jsonData)=>{		

		//alert(jsonData);

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

//========================================================================
// Retourne les membres
//========================================================================
function listerMembre()
{
	var actionType = 'action=getUtilisateur';

	$.ajax({
		method:'POST', 
		url: membreController,
		data: actionType
	}).done((jsonData)=>{		

		$.ajax({
			method:'POST', 
			url: 'template/table-membre.php',
			//le callback jsonData est envoyée par la variable obj
			data: "obj="+jsonData

		//CALLBACK: tout le contenu du fichier table-profil.php	
		}).done((template)=>{

			//Charge le template, provenant du callback, dans la div 
			//... listTemplate par son id,  dans (listerFilm.php).
			$("#divTemplateMembre").html(template);


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


//========================================================================
// Methode qui valide if textbox input is empty.Return true/false.
// If false, set a new class for textbox input.
//========================================================================
function validerEntreeVide()
{
	var reponse = "";

	//pour chaque INPUT qui a la class "estVide"
	$(".estVide").each(function()
	{
		//Si le champ n'est pas vide
		if ($(this).val() != "" ){
	    	reponse = true;
		}else{
			$(this).addClass("is-invalid");
			reponse = false;
		}	
	});
	return reponse;
}

//========================================================================
// Methode qui valide l'entrée de l'utilisateur.
// Si le champs est vide, la couleur autours du textbox est à rouge.
// Outrement, il est à vert.
//========================================================================
function validerFormInputs()
{
	//For eatch INPUT TEXTBOX with class = estVide
	$(".estVide").each(function()
	{
		//lorsque l'utilisateur relâche une clé
		$(this).keyup(function()
		{
			//Si textbox is empty
			if ($(this).val() == "" )
			 {
			 	//switch class...
				$(this).removeClass("is-valid");
				$(this).addClass("is-invalid");								
			}	
		});
	});
}

//========================================================================
// Method that changes color of form input.
// It's Called in each input field of form:
// When input field is empty the red color is shown, 
//... once the field is fill, green color appear.
//========================================================================
function isItEmpty(texte)
{
	if($(texte).val().length >= 0)
	{
		 //console.log($(texte).val().length);//to test
		 $(texte).removeClass("is-invalid"); 
		 $(texte).addClass("is-valid");
	}
}