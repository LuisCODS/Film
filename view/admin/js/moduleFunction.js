//================================================================================================
//CLASSE RESPONSABLE POUR LES FONCTION QUI SONT RELIÉES À L'ÉCOUTE DES ÉVÉNEMENTS (moduleScrip.js)
//================================================================================================



//========================================================================
// Methode qui valide les textbox. Si le champs est vide, la couleur 
// ...autours du textbox est à rouge. Outrement, il est à vert.
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
		//When un option is selected
		$( ".estVide" ).change(function() {
			$(this).removeClass("is-invalid");
		  	$(this).addClass("is-valid");	
		});
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
		//If input isen't empty
		if ($(this).val() != "" )
		{
	    	reponse = true;
		}else{
			$(this).addClass("is-invalid");
			reponse = false;
		}	
	});
	// Prevent registration form if textbox is empty
	if ($(".is-invalid").length>0){
		reponse = false;
	}
	return reponse;
}



 