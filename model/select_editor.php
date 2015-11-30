<?php
	function select_editor()
	{
		$conn	= db_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
		
		$query	= $conn->prepare(_SL_EDITOR_);
		$query->execute();
		
		while($edit = $query->fetch())
		{
			echo '<option value="' . utf8_encode($edit['name']) . '">' . utf8_encode($edit['name']) . '</option>';
		}
	}
?>