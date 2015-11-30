<!-- Choix de la Barre de Navigation selon connexion utilisateur -->
<?php
function is_connect()
{
	if(isset($_SESSION['id_customer']) && $_SESSION['id_customer'] != "")
		include "commons/nav_co.php";
	else
		include "commons/nav.php";
}
?>
