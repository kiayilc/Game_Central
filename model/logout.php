<?php
	if (session_start() == true)
	{
		unset($_SESSION);
		session_destroy();
		header ('Location: ../view/index.php');
	}
?>
