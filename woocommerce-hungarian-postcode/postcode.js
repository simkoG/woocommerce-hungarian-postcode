jQuery(document).ready(function($) {

	let ajax_uri = whc_param["ajax_url"];
	let billing_postcode = $("#billing_postcode");
	let billing_city = $("#billing_city");
	let shipping_postcode = $("#shipping_postcode"); 
	let shipping_city = $("#shipping_city");


	$( billing_postcode ).keyup(function() {
    get_postcode_ajax($(this), billing_city);
	});
	
	$( shipping_postcode ).keyup(function() {
    get_postcode_ajax($(this), shipping_city);
	});
	
	
	function get_postcode_ajax( from, to ) {
    let postcode_input = from.val();

		if( postcode_input.length == 4 ) {
			
			$.ajax({
				url: ajax_uri,
				dataType: 'text',
				type: 'post',
				contentType: 'application/x-www-form-urlencoded',
				data: { postcode: postcode_input },
				success: function( data, textStatus, jQxhr ){
					var obj = $.parseJSON( data );
					to.val( obj[postcode_input] );
				},
				error: function( jqXhr, textStatus, errorThrown ){
					console.log( errorThrown );
				}
			});
			
		}
	}
});