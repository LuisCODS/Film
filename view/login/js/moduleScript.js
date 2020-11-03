//  PORTÉE GLOBAL 
	var membreController ='../../controller/membre.php';




//========================================================================
// Things that should be done every time a page loads
//========================================================================
// $(()=>{
// 	//$( ".target" ).hide();
// });



//========================================================================
// BOUTON LOGIN: Verifie si un membre existe
// ========================================================================
/*$('#btnLogin').click(()=>{

	//alert("Teste");

	//get all form  inputs  
	var champs = $("#formLogin").serialize();
	var action = 'action=select';
	//console.log(action); //to test!

	$.ajax({
		method: "POST", 
		url:membreController,
		data: action+'&'+champs
		//CALLBACK: Si l'insertion ou update a été fait, msg = 1
		}).done((msg)=>	{

			alert(msg);
			// if (msg==1) {
			// 	location.href="../../view/membre/index.php";//send to home page du membre
			// }else{
				
			// 	//rendreVisible("dviAlertLogin");
			// 	 $("#dviAlertLogin").show();
			// 	//location.href="../../view/login/index.php";//reste sur login
			// }
		//var reponse = (msg == 1) ? "Enregistré avec sucess!" : msg;
	});
	
});*/



// function rendreVisible(elem){
// 	document.getElementById(elem).style.display='visible';
// }
