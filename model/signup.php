<?php
	include "../controller/headers.php";

	$conn = db_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
	if (is_Not_Null($_POST["lastname"]) && valid_name($_POST["lastname"]) && is_Not_Null($_POST["firstname"]) && 
		valid_name($_POST["firstname"]) && is_Not_Null($_POST["birthday"]) && valid_birthday($_POST["birthday"]) && 
		is_Not_Null($_POST["phone"]) && valid_phone($_POST["phone"]) && is_Not_Null($_POST["address"]) && 
		valid_address($_POST["address"]) && is_Not_Null($_POST["postal"]) && valid_postal($_POST["postal"]) && 
		is_Not_Null($_POST["city"]) && valid_name($_POST["city"]) && is_Not_Null($_POST["email"]) && 
		valid_mail($_POST["email"]) && is_Not_Null($_POST["pwd"]) && is_Not_Null($_POST["pwd2"]) && valid_pwd($_POST["pwd"], $_POST["pwd2"]))
	{
		$stmt3 =  $conn->prepare("SELECT mail FROM gc_customers WHERE mail = :r_mail");
		$stmt3->execute(array('r_mail' => $_POST['email']));
		if ($stmt3->fetch() == false)
		{
			$stmt = $conn->prepare("INSERT INTO gc_customers (firstname_customer, lastname_customer, birthday, mail, 
			phone, pwd, address ,delivery_address, shipping_address, postal_code, city, delivery_postal_code, delivery_city, shipping_postal_code, 
			shipping_city) VALUES(:r_firstname, :r_lastname, :r_birthday, :r_mail, :r_phone, :r_pwd, :r_address, :r_address, :r_address, :r_postal, 
			:r_city, :r_postal, :r_city, :r_postal, :r_city)"); 
			$stmt->execute(array(
				'r_lastname' => ucfirst(strtolower($_POST["lastname"])),
				'r_firstname' => ucfirst(strtolower($_POST["firstname"])),
				'r_birthday' => $_POST["birthday"],
				'r_phone' => $_POST["phone"],
				'r_address' => $_POST["address"],
				'r_postal' => $_POST["postal"],
				'r_city' => $_POST["city"],
				'r_mail' => $_POST['email'],
				'r_pwd' => md5($_POST['pwd'])
			));
			$stmt->closeCursor();
			$stmt = $conn->prepare("SELECT id_customer, firstname_customer FROM gc_customers WHERE mail = :r_mail"); 
			$stmt->execute(array(
					'r_mail' => $_POST['email']
				));
			$res = $stmt->fetch();
			$stmt2 = $conn->prepare("INSERT INTO gc_cards (firstname_customer, lastname_customer, card_type, id_customer) 
					VALUES('','','',:r_customer)"); 
					$stmt2->execute(array(
						'r_customer' => $res['id_customer']
					));
					$_SESSION['id_customer'] = $res['id_customer'];
					$_SESSION['firstname_customer'] = $res['firstname_customer'];
					header ('Location: ../view/index.php');
			$stmt2->closeCursor();
			$stmt->closeCursor();		
		}
		else
		{
			echo '<script>alert("'. utf8_decode("Ce compte existe déja!") .'")</script>'; 
			header('Refresh: 0; URL=../view/login.php');
		}
	}
	else
		header ('Location: ../view/login.php');
?>