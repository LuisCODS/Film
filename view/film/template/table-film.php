
        <!-- TEMPLATE CARD FILM -->

        <?php

        extract($_POST);

        //Decode a JSON string into a PHP objet
        foreach( json_decode($obj) as $film)  
        {

        ?>          
            <!--CARD-->
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card" style="width: 20drem;">
                            <a href="/w3images/nature.jpg" target="_blank">
                                <img class="img-thumbnail" src="../../img/<?php echo $film->pochette; ?> " width="100" height="180">
                            </a>
                             <div class="card-body">
                                <h5 class="card-title"><?php echo $film->titre; ?></h5>
                                <p class="card-text"><?php echo $film->description; ?></p>
                                <a href="#" class="btn btn-primary">Visitar</a>
                                <a href="#" class="card-link">Link do card</a>
                            </div>
                        </div>
                     </div>
                 </div>
            </div>
<?php  } ?>   