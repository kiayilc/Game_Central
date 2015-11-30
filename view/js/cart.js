(function($)
{
	$('.addtcart').click(function(event)
	{
		event.preventDefault();
		$.get($(this).attr('href'),{}, function(data)
			{
				if (data.error)
					{
						alert(data.message);
					}
				else
				{
					if (confirm(data.message + ' . Voulez-vous vous rendre vers votre panier ?'))
					{
						location.href = "../cart.php";
					}
					else
					{
						$('#total').empty.append(data.total);
						$('#nbGame').empty.append(data.nbGame);
					}
				}
			}, 'json');
		return (false);
	});
}
)(jQuery);

(function($)
{
	$('.addtcart').click(function(event)
	{
		event.preventDefault();
		$.get($(this).attr('href'),{}, function(data)
			{
				if (data.error)
					{
						alert(data.message);
					}
				else
				{
					if (confirm(data.message + ' . Voulez-vous vous rendre vers votre panier ?'))
					{
						location.href = "../products.php";
					}
					else
					{
						$('#total').empty.append(data.total);
						$('#nbGame').empty.append(data.nbGame);
					}
				}
			}, 'json');
		return (false);
	});
}
)(jQuery);