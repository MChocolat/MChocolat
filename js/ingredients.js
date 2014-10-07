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
					{"sTitle": "ID", "mData": 'IngrID' },
					{"mData": 'UPC' },
					{"mData": 'DOP' },
					{"mData": 'Exp' },
					{"mData": 'Price' },
					{"mData": 'Distributor' },
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
	$("#addIngredientButton").bind("click", addIngredient);
	
} );

// Load the Edit form with Ingredient's info
function loadEditForm(){
	$('#editIngredientSection').removeClass('hidden');
	$('#editIngredientSection').addClass('column');
	//$('#addIngredientSection').addClass('hidden');

	$('#editIdInput').val(self.selectedRow[0].innerText);
	$('#editUpcInput').val(self.selectedRow[1].innerText);
	$('#editDopInput').val(self.selectedRow[2].innerText);
	$('#editExpInput').val(self.selectedRow[3].innerText);
	$('#editPriceInput').val(self.selectedRow[4].innerText);
	$('#editDistInput').val(self.selectedRow[5].innerText);
	$('#editSubInput').val(self.selectedRow[6].innerText);
}

// Remove a Ingredient
function removeIngredient(){
	table.row('.selected').remove().draw( false );
}

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
            success: function () {
				// Maybe get the actual DB to populate row??
				//var idx = self.ingredientsTable.fnSettings().fnRecordsTotal() + 1;
				//self.ingredientsTable.fnAddData(data);
			}
    });
}

function updateIngredient(){
	//TODO: AJAX call and return from DB b4 changing UI
	
	//TODO: Update probably needs to choose last param based on position in table vs its own ID
	self.ingredientsTable.fnUpdate({"IngrID":$('#editIdInput').val(),"UPC":$('#editUpcInput').val(),
									"DOP":$('#editDopInput').val(),"Exp":$('#editExpInput').val(),
									"Price":$('#editPriceInput').val(),"Distributor":$('#editDistInput').val(),
									"SubIngr":$('#editSubInput').val()}, parseInt(self.selectedRow[0].innerText)-1);
	$('#editIngredientSection').addClass('hidden');
	$('#editIngredientSection').removeClass('column');
	//$('#addIngredientSection').removeClass('hidden');							
									
}