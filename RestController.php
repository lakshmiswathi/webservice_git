<?php
require_once("PosRestHandler.php");
		
$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/
switch($view){

	case "emplogin":
		// to handle REST Url /mobile/login/<username>/<pswd>
		$mobileRestHandler = new PosRestHandler();
		$mobileRestHandler->loginEmployee($_GET["username"],$_GET["pswd"]);
		break;
	
	case "" :
		//404 - not found;
		break;
}
?>
