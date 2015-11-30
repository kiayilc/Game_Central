<?php

/*Connexion à la base de données*/

function	db_connect($host = _DB_SERVER_, $usr = _DB_USER_, $pwd = _DB_PASSWD_, $db_name = _DB_NAME_)
{
	try
	{
    	$conn = new PDO("mysql:host=$host;dbname=$db_name", $usr, $pwd);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    	return ($conn);
    }
	catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }
}
?>