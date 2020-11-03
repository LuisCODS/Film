<!--  HEAD  --> 
<?php
include '../../includes/head.php';
require_once("../../includes/ConnectionPDO.php");
session_start();

  if (isset($_POST["login"]) )
  {
       if (empty($_POST["MDP_membre"])  || empty($_POST["courriel"]) )
       {
         $message = '<label> Tous les champs sont requis!</label>';
       }
       else
       {
          $requette="SELECT * FROM membre WHERE MDP_membre = :MDP_membre AND courriel = :courriel";
          $stmt = $connexion->prepare($requette);    
          $stmt->execute(
                            array(
                                'MDP_membre' => $_POST["MDP_membre"],
                                'courriel'   => $_POST["courriel"]
                            )
                        );
          $count = $stmt->rowCount();
          if ($count > 0) 
          {
              $_SESSION["courriel"] = $_POST["courriel"];
              header("location:../membre/index.php");
          }
           else 
           {
             $message = '<label> Courriel ou mot de passe invalide!</label>';
           }
       }
  } 
?>



<body class="text-center">
      <div class="container">    
            <div class="iconeBlog">  
                  <i class="fas fa-film"></i> 
            </div> 
            <h1 class="mb-4">Page Login</h1>   
            <form id="formLogin" action="/action_page.php" method="post" >
                  <input type="text" 
                         required
                         placeholder="Courriel" 
                         name="courriel" 
                         id="courriel"
                         class="form-control mb-4">  
                         
                  <input type="password"
                         required
                         autocomplete ="on"
                         placeholder="Mot de passe" 
                         class="form-control mb-4"
                         name="MDP_membre" 
                         id="MDP_membre">

                  <button type="button" 
                          id="btnLogin" 
                          class="form-control btn btn-primary">
                          Login
                  </button>    
<!--                   <div 
                        id="dviAlertLogin"
                        class="alert alert-danger " 
                        role="alert"
                        style="visibility: hidden;">
                       Courriel ou mot de passe invalide!
                </div>  -->              
            </form> 
            <!-- <div class="custom-control custom-checkbox my-1 mr-sm-2">
                  <input type="checkbox" class="custom-control-input" id="customControlInline">
                  <label class="custom-control-label" for="customControlInline">Remember my preference</label>
            </div> -->
      </div> 
</div> 
      
<!--  FOOTER  --> 
<?php include '../../includes/footer.php'; ?>