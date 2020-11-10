<?php
session_start(); 
// require_once("../../includes/ConnectionPDO.php");
include '../../model/Film.class.php';
include '../../model/Membre.class.php';
include '../../model/Film_Location.class.php';
include '../../dao/Film_LocationDAO.class.php';


extract($_POST);



?>