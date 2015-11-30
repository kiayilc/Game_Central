<?php
	include "../controller/headers.php";

	$conn = db_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
	if (isset($_SESSION['id_customer']) && isset($_POST["mail"]) && valid_mail($_POST["mail"]) && 
		isset($_POST["phone"]) && valid_phone($_POST["phone"]) && isset($_POST["address"]) && valid_address($_POST["address"])     && 
		isset($_POST["delivery_address"])  && valid_address($_POST["delivery_address"]) && isset($_POST["shipping_address"]) && 
		valid_address($_POST["shipping_address"]) && isset($_POST["postal"]) && valid_postal($_POST["postal"]) && 
		isset($_POST["city"]) && valid_name($_POST["city"]) && isset($_POST["shipping_postal"]) && valid_postal($_POST["shipping_postal"])  && 
		isset($_POST["shipping_city"]) && valid_name($_POST["shipping_city"]) && isset($_POST["delivery_postal"]) && valid_postal($_POST["delivery_postal"]) && 
		isset($_POST["delivery_city"]) && valid_name($_POST["delivery_city"]))
	{
		$stmt = $conn->prepare("UPDATE gc_customers SET mail=:r_mail, phone=:r_phone, address=:r_address, 
		delivery_address=:r_delivery_address, shipping_address=:r_shipping_address, postal_code=:r_postal_code, city=:r_city, 
		delivery_postal_code=:r_delivery_postal_code, delivery_city=:r_delivery_city, 
		shipping_postal_code=:r_shipping_postal_code, shipping_city=:r_shipping_city WHERE id_customer=:r_customer"); 
		$stmt->execute(array(
			'r_mail' => $_POST['mail'],
			'r_phone' => $_POST['phone'],
			'r_address' => $_POST['address'],
			'r_delivery_address' => $_POST['delivery_address'],
			'r_shipping_address' => $_POST['shipping_address'],
			'r_postal_code' => $_POST['postal'],
			'r_city' => $_POST['city'],
			'r_delivery_postal_code' => $_POST['delivery_postal'], 
			'r_delivery_city' => $_POST['delivery_city'], 
			'r_shipping_postal_code' => $_POST['shipping_postal'], 
			'r_shipping_city' => $_POST['shipping_city'],
			'r_customer' => $_SESSION['id_customer']
		));
		$stmt->closeCursor();
	}

	if (isset($_SESSION['id_customer']) && isset($_POST["firstname"]) && isset($_POST["lastname"]) &&
		isset($_POST["card_type"]) && isset($_POST["card_number"]) && isset($_POST["cryptogram"]) && 
		isset($_POST["expiring_date"]))
	{
		$stmt = $conn->prepare("UPDATE gc_cards SET firstname_customer=:r_firstname_card, lastname_customer=:r_lastname_card, 
		card_type=:r_card_type, card_number=:r_card_number, cryptogram=:r_cryptogram, expiring_date=:r_expiring_date
		WHERE id_customer=:r_customer"); 
		$stmt->execute(array(
			'r_firstname_card' => ucfirst(strtolower($_POST['firstname'])),
			'r_lastname_card' => ucfirst(strtolower($_POST['lastname'])),
			'r_card_type' => $_POST['card_type'],
			'r_card_number' => $_POST['card_number'],
			'r_cryptogram' => $_POST['cryptogram'],
			'r_expiring_date' => $_POST['expiring_date'],
			'r_customer' => $_SESSION['id_customer']
			));
		$stmt->closeCursor();
	}
		header ('Location: ../view/account.php');
?>