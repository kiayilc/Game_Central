$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
	$('#prod_category').change(function(){$("#prod_editor").val("");$("#prod_price").val("");});
	$('#prod_editor').change(function(){$("#prod_category").val("");$("#prod_price").val("");});
	$('#prod_price').change(function(){$("#prod_category").val("");$("#prod_editor").val("");});
});