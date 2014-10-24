$(document).ready( function () {
	$(document).keypress(function(e) {
		if(e.which == 13) {
			if (document.activeElement.id == 'addUpcInput' && $("#addUpcInput").val() != "") {
				// Load information associated with UPC in field 
				$.ajax({
					type: "POST",
					url: '/functions.php',
					cache: false,
					data: {'action': 'ingrUPCLookup',
							'data': $("#addUpcInput").val()},
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
		        //var frm = $("#form-ajax");
		        //var i;
		 
		        //console.dir(response);      // for debug
		 
		        //for (i in response) {
		        //    frm.find('[name="' + i + '"]').val(response[i]);
		            $("#addExpInput").val(response[3]);
		        //}
		    }
		}
	});
	
	$("#addIngredientButton").bind("click", addIngredient);

});


function addIngredient(){
	//TODO: form validation
	var data = {"UPC":$('#addUpcInput').val(),
									"Exp":$('#addExpInput').val(),
									"LotNum":$('#addLotNumInput').val(),
									"SubIngr":$('#addSubInput').val()};
	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'addIngredient', 'data': data},
            success: function (data, status) {
				alert("Ingredient SA-SA-SAVED!!!!");
			}
    });
}
