<!-- Connexion à la base de données -->
<?php
function	db_connect($host, $usr, $pwd, $db_name)
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