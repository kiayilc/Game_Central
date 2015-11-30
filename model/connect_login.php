<!-- Connexion utilisateur -->
<?php
	include "../controller/headers.php";
	if (is_Not_Null($_POST["email"]) && is_Not_Null($_POST["pwd"]))
	{
		$conn = db_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
		$stmt = $conn->prepare("SELECT mail, pwd, id_customer, firstname_customer FROM gc_customers WHERE mail = :r_mail AND pwd = :r_pwd"); 	
		$stmt->execute(array(
			'r_mail' => $_POST['email'],
			'r_pwd' => md5($_POST['pwd'])
		));
			$res = $stmt->fetch();
		if ($res == false)
			header('Location: ../view/login.php');
		else
		{
			$_SESSION['id_customer'] = $res['id_customer'];
			$_SESSION['firstname_customer'] = $res['firstname_customer'];
			header ('Location: ../view/index.php');
		}
		$stmt->closeCursor();
	}
	else
		header ('Location: ../view/login.php');
?>