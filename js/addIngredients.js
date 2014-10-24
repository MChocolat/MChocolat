$(document).ready( function () {
	$(document).keypress(function(e) {
		if(e.which == 13) {
			var UPC = document.activeElement.id;
			if (document.activeElement.id == 'addUpcInput' && document.activeElement.id.getVal() != "") {
				// Load information associated with UPC in field 
				$.ajax({
					type: "POST",
					url: '/functions.php',
					cache: false,
					data: {'action': 'ingrUPCLookup',
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
	
	$("#addIngredientButton").bind("click", addIngredient);

});


function addIngredient(){
	//TODO: form validation
	var data = {"IngrID":$('#addIdInput').val(),"UPC":$('#addUpcInput').val(),
									"DOP":$('#addDopInput').val(),"Exp":$('#addExpInput').val(),
									"Price":$('#addPriceInput').val(),"Distributor":$('#addDistInput').val(),
									"SubIngr":$('#addSubInput').val()};
	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'addIngredient', 'data': data},
            success: function (data, status) {
				// Maybe get the actual DB to populate row??
				//var idx = self.ingredientsTable.fnSettings().fnRecordsTotal() + 1;
				//self.ingredientsTable.fnAddData(data);
			}
    });
}
