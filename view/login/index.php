<!--  HEAD  --> 
<?php include '../../includes/head.php'; ?>

<body class="text-center">
      <div class="container">    
            <div class="iconeBlog">  
                  <i class="fas fa-film"></i> 
            </div> 
            <h1 class="mb-4">Page Login</h1>   
            <form action="/action_page.php" method="post" >
                  <input type="text" 
                         placeholder="Courriel" 
                         name="courriel" 
                         id="courriel"
                         class="form-control mb-4">  
                         
                  <input type="password"
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
            </form> 
            <!-- <div class="custom-control custom-checkbox my-1 mr-sm-2">
                  <input type="checkbox" class="custom-control-input" id="customControlInline">
                  <label class="custom-control-label" for="customControlInline">Remember my preference</label>
            </div> -->
      </div> 
</div> 
      
<!--  FOOTER  --> 
<?php include '../../includes/footer.php'; ?>