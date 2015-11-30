<?php
	include "../controller/headers.php";

	$conn = db_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
	if (isset($_SESSION["id_customer"]))
	{
		$stmt = $conn->prepare("DELETE FROM gc_customers WHERE id_customer=:r_customer"); 
		$stmt->execute(array(
			'r_customer' => $_SESSION['id_customer']
		));
		$stmt->closeCursor();
	}
	include 'logout.php';
?>