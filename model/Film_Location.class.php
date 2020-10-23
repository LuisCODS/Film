<?php

	Class Film_Location 
	{

		private $PK_ID_Film;
		private $PK_ID_Location;


        private $description;

		function __Construct($PK_ID_Film, $PK_ID_Location)
		{
			$this->PK_ID_Film 	   = $PK_ID_Film;
            $this->PK_ID_Location  = $PK_ID_Location;

		}

		

		function getFilmID(){
			return $this->PK_ID_Film;
		}
		function setFilmID($PK_ID_Film){
			 $this->PK_ID_Film = $PK_ID_Film;
		}
		function getLocationID(){
			return $this->PK_ID_Location;
		}
		function setLocationID($PK_ID_Location){
			 $this->PK_ID_Location = $PK_ID_Location;
		}



	}//fin class

