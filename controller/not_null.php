<?php
	function is_Not_Null($test) 
	{
		if (isset($test) && strlen($test) != 0)
			return (1);
		else 
			return (0);
	}
?>