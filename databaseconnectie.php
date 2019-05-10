<?php

	$host = "localhost";
	$dbnaam = "onthefly";
	$user = "root";
	$wachtwoord = "";
	
	try
	{
		$con = new PDO("mysql:host=$host;dbname=$dbnaam", $user, $wachtwoord);
	}catch(SQLException $ex)
	{
		echo "Verbinding mislukt: $ex";
	}
?>