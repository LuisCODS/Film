//  PORTÉE GLOBAL 
//var filmController ='../../controller/film.php';

//Écoute l'évenemet click du button enregistrer provenant du formulaire modal (jouter.php)
// $('#btnEnregistrerFilm').click(()=> {
    
//     //get all form filds  
//     var donnes   = $("#formAjouterFilm").serialize();
//     var action = 'action=insert';
//     //alert(donnes);//to test

//     //SEND TO CONTROLLER :Route, data, action
//    $.ajax({
//        method: 'POST',
//        url:filmController,
//        data:action+'&'+donnes
//    }).done((msg)=>{
//        //plugin confirm
//        $.confirm({
//            title:'Bienvenue !',
//             content: msg,
//             buttons:{
//                 OK:()=>{
//                     $('#modalNewFilm').modal('toggle');//close modal
//                     // Recharge la page actuelle à partir du serveur, sans utiliser le cache.		
//                     location.reload(true);                  
//                 }
//             }
//        });    
//    });
// });
