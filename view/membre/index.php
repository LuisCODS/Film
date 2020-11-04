<?php 
session_start();
include '../../includes/head.php'; 
include '../../includes/interfaceMembre.php'; 


if (isset ($_SESSION["membreID"]) )
 {
	echo '<label> Bienvenue '.$_SESSION["membreID"].'</label>';
 }else {
	header("location: ../../controller/login.php");
	exit();
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
