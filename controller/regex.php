<!-- Sécurité des champs de formulaire par regex -->
<?php

function valid_birthday($birthday)
{
	$date = date_create();
	$birthdate =  date_create($birthday);
	if (date_timestamp_get($date) <= date_timestamp_get($birthdate))
		return (0);
	else
		return (1);
}

function valid_phone($phone)
{
	$regex_phone = "/^0[1-9]([0-9][0-9]){4}$/";
	if(!preg_match_all($regex_phone, $phone))
		return (0);
	else
		return (1);
}

function valid_postal($postal)
{
	$regex_postal = "/^0[1-9][0-9]{3}$|^([1-8][0-9][0-9]{3})$|^(9[0-5][0-9]{3})$/";
	if(!preg_match_all($regex_postal, $postal))
		return (0);
	else
		return (1);
}

function valid_mail($mail)
{
	$regex_mail = "/^[a-z0-9\._%+-]+@[a-z0-9\.-]+\.[a-z]{2,4}$/";
	if(!preg_match_all($regex_mail, $mail))
		return (0);
	else
		return (1);
}

function valid_pwd($pwd1, $pwd2)
{
	if ($pwd1 != $pwd2)
		return (0);
	else
		return (1);
}

function valid_address($address)
{
	$regex_address = "/^[0-9]+[a-zA-Z ,\'çüéâäàêëèïîôöûùÿ]{4,}$/";
	if(!preg_match_all($regex_address, $address))
		return (0);
	else
		return (1);
}

function valid_name($name)
{
	$regex_name = "/^[a-zA-Z- \'çüéâäàêëèïîôöûùÿ]+$/";
	if(!preg_match_all($regex_name, $name))
		return (0);
	else
		return (1);
}
?>