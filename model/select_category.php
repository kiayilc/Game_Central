<?php
	function select_category()
	{
		$conn	= db_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
		
		$query	= $conn->prepare(_SL_CATEGORY_);
		$query->execute();
		
		while($cat = $query->fetch())
		{
			echo '<option value="' . utf8_encode($cat['name']) . '">' . utf8_encode($cat['name']) . '</option>';
		}
	}
?>