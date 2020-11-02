
<?php 
    include '../../includes/head.php'; 
    include '../../includes/interfaceAdmin.php';
    include '../../model/Film.class.php';
    // include '../../dao/FilmDAO.class.php';
    require_once("../../includes/ConnectionPDO.php");

    session_start();
    extract($_POST); 

    $id_Url= "";

    //SI le bouton editer est pesé
    if (isset($_GET['editer'])) 
    {   
        //Recupere la valeur ID envoyé par GET dans l'url
        $id_Url = $_GET['editer'];

        //var_dump($id_Url);//to test
    }

    var_dump($id_Url);//to test

    $requette="SELECT * FROM film WHERE PK_ID_Film=?";
    $stmt = $connexion->prepare($requette);
    $stmt->execute(array($id_Url));
    $ligne=$stmt->fetch(PDO::FETCH_OBJ);

    $film = new Film(null,$ligne->titre,$ligne->prix,$ligne->realisateur,$ligne->categorie,$ligne->pochette,$ligne->description);

    $_SESSION["film"] = serialize($film);

     header("location:edit.php");

    //$pochette=$film->pochette;
   // var_dump($film->titre);//to test
    //echo $film->titre;

 ?> 




<!--  FOOTER  --> 
<?php include '../../includes/footer.php'; ?> 