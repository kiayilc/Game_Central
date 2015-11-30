$(document).ready(function(){
	$("input[name=email]").change(function(){
		var regex = /^[a-z0-9\._%+-]+@[a-z0-9\.-]+\.[a-z]{2,4}$/g;
		if (regex.test(this.value) == false)
			$("input[name=email]").css("border-color" , "#D43F3A");
		else
			$("input[name=email]").css("border-color" , "#4CAE4C");
	});
	
	$("input[name=lastname]").change(function(){
		var regex = /^[a-zA-Z- \'çüéâäàêëèïîôöûùÿ]+$/g;
		if (regex.test(this.value) == false)
			$("input[name=lastname]").css("border-color" , "#D43F3A");
		else
			$("input[name=lastname]").css("border-color" , "#4CAE4C");
	});
	
	$("input[name=firstname]").change(function(){
		var regex = /^[a-zA-Z- \'çüéâäàêëèïîôöûùÿ]+$/g;
		if (regex.test(this.value) == false)
			$("input[name=firstname]").css("border-color" , "#D43F3A");
		else
			$("input[name=firstname]").css("border-color" , "#4CAE4C");
	});
	
	$("input[name=city]").change(function(){
		var regex = /^[a-zA-Z- \'çüéâäàêëèïîôöûùÿ]+$/g;
		if (regex.test(this.value) == false)
			$("input[name=city]").css("border-color" , "#D43F3A");
		else
			$("input[name=city]").css("border-color" , "#4CAE4C");
	});
	
	$("input[name=phone]").change(function(){
		var regex = /^0[1-9]([0-9][0-9]){4}$/g;
		if (regex.test(this.value) == false)
			$("input[name=phone]").css("border-color" , "#D43F3A");
		else
			$("input[name=phone]").css("border-color" , "#4CAE4C");
	});
	
	$("input[name=postal]").change(function(){
		var regex = /^0[1-9][0-9]{3}$|^([1-8][0-9][0-9]{3})$|^(9[0-5][0-9]{3})$/g;
		if (regex.test(this.value) == false)
			$("input[name=postal]").css("border-color" , "#D43F3A");
		else
			$("input[name=postal]").css("border-color" , "#4CAE4C");
	});
	
	$("input[name=address]").change(function(){
		var regex = /^[0-9]+[a-zA-Z ,\'çüéâäàêëèïîôöûùÿ]{4,}$/g;
		if (regex.test(this.value) == false)
			$("input[name=address]").css("border-color" , "#D43F3A");
		else
			$("input[name=address]").css("border-color" , "#4CAE4C");
	});
	
	$("input[name=pwd2]").change(function(){
		if (this.value != $("input[name=pwd]").val())
			$("input[name=pwd2]").css("border-color" , "#D43F3A");
		else
			$("input[name=pwd2]").css("border-color" , "#4CAE4C");
	});
	
	$("input[name=birthday]").change(function(){
		var date = new Date();
		var tab = this.value.split("-");
		var birthday = new Date(tab[0], tab[1] - 1, tab[2]);
		if (birthday > date)
			$("input[name=birthday]").css("border-color" , "#D43F3A");
		else
			$("input[name=birthday]").css("border-color" , "#4CAE4C");
	});
	
	$("input[name=card_type]").change(function(){
		var regex = /^[a-zA-Z- \'çüéâäàêëèïîôöûùÿ]+$/g;
		if (regex.test(this.value) == false)
			$("input[name=card_type]").css("border-color" , "#D43F3A");
		else
			$("input[name=card_type]").css("border-color" , "#4CAE4C");
	});
	
	$("input[name=card_number]").change(function(){
		var regex = /^[0-9]{13}$/g;
		if (regex.test(this.value) == false)
			$("input[name=card_number]").css("border-color" , "#D43F3A");
		else
			$("input[name=card_number]").css("border-color" , "#4CAE4C");
	});
	
	$("input[name=cryptogram]").change(function(){
		var regex = /^[0-9]{3}$/g;
		if (regex.test(this.value) == false)
			$("input[name=cryptogram]").css("border-color" , "#D43F3A");
		else
			$("input[name=cryptogram]").css("border-color" , "#4CAE4C");
	});
	
	$("input[name=expiring_date]").change(function(){
		var date = new Date();
		var tab = this.value.split("-");
		var expiration = new Date(tab[1], tab[0]);
		if (expiration < date)
			$("input[name=expiring_date]").css("border-color" , "#D43F3A");
		else
			$("input[name=expiring_date]").css("border-color" , "#4CAE4C");
	});
});