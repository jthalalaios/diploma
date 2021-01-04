<script>  
$(document).ready(function(){
	
	load_cart_data();
    
	function load_cart_data()
	{
		$.ajax({
			url:"../includes/items/cart.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				$('#cart_details').html(data.cart_details);
				$('.total_price').text(data.total_price);
				$('.badge').text(data.total_item);
			}
		});
	}

	$('#cart-popover').popover({
		html : true,
        container: 'body',
        content:function(){
        	return $('#popover_content_wrapper').html();
        }
	});

	$(document).on('click', '.add_to_cart', function(){
		var product_id = $(this).attr("id");
		var product_name = $('#name'+product_id+'').val();
		var product_price = $('#price'+product_id+'').val();
		var product_quantity = $('#quantity'+product_id).val();
		var action = "add";
		if(product_quantity > 0)
		{
			$.ajax({
				url:"../includes/items/action.php",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
				success:function(data)
				{
					load_cart_data();
					alert("Το προϊόν έχει προστεθεί στο καλάθι σας!");
				}
			});
		}
		else
		{
			alert("Παρακαλώ δώστε τον αριθμό της ποσότητας που επιθυμείτε!");
		}
	});

	$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		if(confirm("Θέλετε να διαγράψετε το συγκεκριμένο προϊόν?"))
		{
			$.ajax({
				url:"../includes/items/action.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function()
				{
					load_cart_data();
					$('#cart-popover').popover('hide');
					alert("Το προϊόν έχει αφαιρεθεί από το καλάθι σας!");
				}
			})
		}
		else
		{
			return false;
		}
	});

	$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"../includes/items/action.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				load_cart_data();
				$('#cart-popover').popover('hide');
				alert("Το καλάθι σας έχει αδειάσει!");
			}
		});
	});
    
});

</script>