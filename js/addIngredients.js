$(document).ready( function () {
	$(document).keypress(function(e) {
		if(e.which == 13) {
			var UPC = document.activeElement.id;
			if (document.activeElement.id == 'addUpcInput' && /\S/.test(ID)) {
				// Load information associated with UPC in field 
				$.ajax({
					type: "POST",
					url: '/functions.php',
					cache: false,
					data: {'action': 'ingrUPCLookup'
							'$data': document.activeElement.id.getVal()},
					success: process_response,
					error: function(xhr) {alert("AJAX request failed: "+xhr.status);}
				
				});
			} 

			else {
				alert("No UPC supplied");
			}

			/**
		    * process the response, populating the form fields from the JSON data
		    * @param {Object} response the JSON data parsed into an object
		    */
		    function process_response(response) {
		        var frm = $("#form-ajax");
		        var i;
		 
		        console.dir(response);      // for debug
		 
		        for (i in response) {
		            frm.find('[name="' + i + '"]').val(response[i]);
		        }
		    }
		}
	});

});