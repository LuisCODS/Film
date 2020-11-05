// //  ____________________________________________________________________
// //  SCRIPT MEMBRE
// // ____________________________________________________________________


function validerPasswords( )
{
	//GET FORM INPUTS
	var motUm = formCreate.MDP_membre.value;
	var motDeux = formCreate.MDP_membreConfirm.value;

	//PASSWORD MUST CONTAIN 4 NUMBER!

	if (motUm.length < 4  &&  motDeux.length < 4) 
	{
		document.getElementById("alertPassword").style.display='block';
		document.getElementById("msnErreur").innerHTML="Le mot de passe doit contenir 4 chiffres!";
		return false;

	}else{
		document.getElementById("alertPassword").style.display='none';
	}	

}



