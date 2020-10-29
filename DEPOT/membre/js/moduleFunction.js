
//  ____________________________________________________________________
//  PAGE QUI FOURNIE LES FUNCTIONS DE SUPPORT AU FICHIER moduleScript.js
// ____________________________________________________________________



// Methode qui retourn 2 champs(proprieté) du Profil.
function lister()
{
	//Set la valeur à recuperer par(extract($_POST);) au controlleur(profil.php).
	var actionType = 'action=getUtilisateur';
	//La valeur contenant dans txtInput sera recuperée  
	//...par (extract($_POST);) dans le controlleur (profil.php).
	//var champs  = "txtInput="+txtInput;

	//REQUISITION asynchrone 
	$.ajax({
		method:'POST', 
		url: membreController,
		data: actionType
		//CALLBACK: un array de profil en format json.
	}).done((jsonData)=>{			
		//  REQUISITION asynchrone
		$.ajax({
			method:'POST', 
			url: 'template/table-membre.php',
			//le callback jsonData est envoyée par la variable obj
			data: "obj="+jsonData
		//CALLBACK: tout le contenu du fichier table-profil.php	
		}).done((template)=>{
			//Charge le template, provenant du callback, dans la div 
			//... listTemplate avec son id,  dans (index.php) du Membre.
			$("#listTemplate").html(template);
			// declenche dès que le button btnEditer(table-membre.php) est appuyé
			//...ele é pego pela class.
			$('.btnDetails').click(function() 
			{
				//Open the modal windows
				$('.ModalDetails').modal("show");	

				//convert en json l'objet du button
				var obj = JSON.parse($(this).attr("obj") );

				//Show object propertys on form input
				$("#PK_ID_Membre").val(obj.PK_ID_Membre);
				$("#nom").val(obj.nom);	
				$("#prenom").val(obj.prenom);	
				$("#profil").val(obj.profil);	


				//Show le boutton Supprimer par son ID: btnSupprimer
				//on javascript sintax:  document.getElementById("btnSupprimer").hidden = false;
				$("#btnSupprimer").css("display", "block");	
				//Ajoute la valeur du title h5 du modal
				$("#ModalTitle").html("Editer membre");		
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
		//If input isen't clean
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