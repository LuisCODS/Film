//========================================================================
// Ce script recoit les donnes provenant des Forms modal
//========================================================================

//  PORTÉE GLOBAL 
var membreController ='../../controller/membre.php';


// Things that should be done every time a page loads
$(()=>{
    // var action = 'action=getUtilisateur';
    //  $.ajax({
    //      method: 'POST',
    //      url:membreController,
    //      data:action+'&'+donnes
    //  }).done((msg)=>{

    //    alert(msg);  //to test

    //  });
});



$('#btnSalvar').click(()=> {
    
  alert("Teste");
    //get all form filds  
//     var donnes   = $("#formAjouter").serialize();
    //var action = 'action=insert';

//    $.ajax({
//        //SEND TO CONTROLLER :Route, data, and action
//        method: 'POST',
//        url:membreController,
//        data:action+'&'+donnes
//    }).done((msg)=>{
//        //plugin confirm
//        $.confirm({
//            title:'Bienvenue !',
//             content: msg,
//             buttons:{
//                 OK:()=>{
//                     $('#modal_DevenirMembre').modal('toggle');//close modal
//                     // Recharge la page actuelle à partir du serveur, sans utiliser le cache.		
//                     location.reload(true);                  
//                 }
//             }
//        });    
//    });
});