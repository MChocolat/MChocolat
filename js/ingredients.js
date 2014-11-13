var ingredientsList = [];
var selectedRow;
var ingredientsTable;
var self;

// Function for when page first loads, what you want it to do
$(document).ready( function () {
    self = this;

	// Load all Ingredients  
	$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'getIngredients'},
		success: function(data, status) {
			ingredientsList = data;
			self.ingredientsTable = $('#ingredientsTable').dataTable({
				"aaData": jQuery.parseJSON(ingredientsList),
				"aoColumns": [
					{"mData": 'ID' },
					{"mData": 'IngrName' },
					{"mData": 'UPC' },
					{"mData": 'DOP' },
					{"mData": 'Exp' },
					{"mData": 'Lot' },
					{"mData": 'SubIngr' }
				]
			});
			
			
			// Mouseover row highlighting
			$('#ingredientsTable tbody').on('mouseover', 'tr', function() {
				$(this).addClass('highlight');
			});
			$('#ingredientsTable tbody').on('mouseout', 'tr', function() {
				$(this).removeClass('highlight');
			});
			
			// Mouse click row highlighting
			$('#ingredientsTable tbody').on('click', 'tr', function() {
			if ( $(this).hasClass('selected') ) {
				var tr = $(this)
				//Selected item will populate form
				loadEditForm(this.cells);
			}
			else {
				self.ingredientsTable.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
				self.selectedRow = this.cells;
				loadEditForm();
			}
	
	} );
		},
		error: function(xhr, desc, err) {
			alert("SOME ERROR LOADING RAW MATERIALS");
		}
	}); 
	
	//Set Button Functions
	$("#updateIngredientButton").bind("click", updateIngredient);
	$("#deleteIngredientButton").bind("click", deleteIngredient);
	
	
} );

// Load the Edit form with Ingredient's info
function loadEditForm(){
	/*
	$('#editIngredientSection').removeClass('hidden');
	$('#editIngredientSection').addClass('column');
	//$('#addIngredientSection').addClass('hidden');

	$('#editUpcInput').val(self.selectedRow[1].innerText);
	$('#editDopInput').val(self.selectedRow[2].innerText);
	$('#editExpInput').val(self.selectedRow[3].innerText);
	$('#editSubInput').val(self.selectedRow[6].innerText);
	*/
}

//Delete ingredient from DB
function deleteIngredient(){
	var data = {"IngrName":self.selectedRow[0],
				"UPC":self.selectedRow[1]}};

	$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'deleteIngredient',
				'data': data,
		success: function (data, status) {
				alert("Ingredient Deleted!!!!");
				removeIngredient();
		},
		error: function() {alert("Error when deleting ingredient!");}
				
	});
}

// Remove a Ingredient from the table
function removeIngredient(){
	table.row('.selected').remove().draw( false );
}



function updateIngredient(){
	//TODO: AJAX call and return from DB b4 changing UI
	
	//TODO: Update probably needs to choose last param based on position in table vs its own ID
	self.ingredientsTable.fnUpdate({"UPC":$('#editUpcInput').val(),
									"DOP":$('#editDopInput').val(),"Exp":$('#editExpInput').val(),
									"SubIngr":$('#editSubInput').val()}, parseInt(self.selectedRow[0].innerText)-1);
	$('#editIngredientSection').addClass('hidden');
	$('#editIngredientSection').removeClass('column');
	//$('#addIngredientSection').removeClass('hidden');							
									
}