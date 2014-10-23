$(document).ready( function () {
	$(document).keypress(function(e) {
		if(e.which == 13) {
			if (document.activeElement.id == 'addUpcInput') {
				alert ('You Pressed Enter in UPC!');
					// Load all Ingredients  
				$.ajax({
					type: "POST",
					url: '/functions.php',
					cache: false,
					data: {'action': 'ingrUPCLookup'
							'$data': document.activeElement.id.getVal()},
					success: function(data, status) {
						ingredientsList = data;
						self.ingredientsTable = $('#ingredientsTable').dataTable({
							"aaData": jQuery.parseJSON(ingredientsList),
							"aoColumns": [
								{"sTitle": "ID", "mData": 'IngrID' },
								{"mData": 'UPC' },
								{"mData": 'DOP' },
								{"mData": 'Exp' },
								{"mData": 'Price' },
								{"mData": 'Distributor' },
								{"mData": 'SubIngr' }
							]
						});
				
				} );
					},
					error: function(xhr, desc, err) {
						alert("SOME ERROR LOADING RAW MATERIALS");
					}
				});
			}
		}
	});

});