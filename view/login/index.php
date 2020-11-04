<!--  INDEX LOGIN   --> 
<?php
include '../../includes/head.php';
require_once("../../includes/ConnectionPDO.php");
?>

<body class="text-center">
      <div class="container">    
            <div class="iconeBlog">  
                  <i class="fas fa-film"></i> 
            </div> 
            <h1 class="mb-4">Page Login</h1>   
            <form id="formLogin" method="POST" action="../../controller/login.php" >

            <!-- FORNECE O TIPO DE ACAO AO CONTROLLER -->
                  <input 
                      type="hidden"
                      readonly="true"
                      id="action" 
                      name="action" 
                      value="login" >

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

                  <button type="submit" 
                          id="btnLogin"                          
                          class="form-control btn btn-primary">
                          Login
                  </button>                  
            </form> 
      </div> 
</div> 
      
<!--  FOOTER  --> 
<?php include '../../includes/footer.php'; ?>