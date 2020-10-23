//========================================================================
//CLASSE RESPONSABLE POUR L'ÉCOUTE DES ÉVÉNEMENTS DU MODULE.
//========================================================================



//Url to be send
var userController = '../../controller/login.php';


//var_dump(#champs);	
//console.log(champs);


//========================================================================
// Things that should be done every time a page loads
//========================================================================
$(()=>{
	validerFormInputs();//(moduleFunction.js)
});


//GET ACTION  FRON BUTTON LOGIN
$('#btnLogin').click(()=>{

	if (validerEntreeVide()) 
	{
		//get textbox value
		//console.log( $("#UtilisateurMDP").val());

			//Serialize all form fields
		var champs = $("#formLogin").serialize();
		//Set controlleur action
		var action = 'action=getUtilisateur';	

	 	$.ajax({
			method: 'POST',
			url: userController,
			data: action+'&'+champs		
		}).done((jsonData)=>{	
			//data contien un Json;
			console.log(jsonData);
		 	$.ajax({
				method: 'POST',
				url: '../login/validLogin.php',
				data: 	"obj="+jsonData+'&'+champs		
			})
		});
	}
});


