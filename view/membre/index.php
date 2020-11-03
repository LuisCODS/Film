<?php 
session_start();
include '../../includes/head.php'; 
include '../../includes/interfaceMembre.php'; 
// require_once("../../model/membre.class.php");

// $membre = new Membre(null,null,null,null,null,null,null);

if (isset ($_SESSION["courriel"]) )
 {
	echo '<label> Bienvenue '.$_SESSION["courriel"].'</label>';
 }



 ?>





<!-- _________________ INDEX-MEMBRE _________________ --> 
<div class="container">
      <div class="jumbotron">
          <h1 class="display-4">Index membre</h1>
          <p class="lead">Page index membre.</p>
          <hr class="my-4">
          <p>Le menu en haut vous permet de gerer votre location.</p>
 

     </div>
</div>      
<!-- ___________________________________________________ --> 

<!--  FOOTER  --> 
<?php require_once '../../includes/footer.php'; ?>
