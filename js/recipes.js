var recipesList = [];
var selectedRow;
var recipesTable;
var self;

// Function for when page first loads, what you want it to do
$(document).ready( function () {
    self = this;

	// Load all Recipes  
	$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'getRecipes'},
		success: function(data, status) {
			recipesList = data;
			self.recipesTable = $('#recipesTable').dataTable({
				"aaData": jQuery.parseJSON(recipesList),
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
			$('#recipesTable tbody').on('mouseover', 'tr', function() {
				$(this).addClass('highlight');
			});
			$('#recipesTable tbody').on('mouseout', 'tr', function() {
				$(this).removeClass('highlight');
			});
			
			// Mouse click row highlighting
			$('#recipesTable tbody').on('click', 'tr', function() {
			if ( $(this).hasClass('selected') ) {
				var tr = $(this)
				//Selected item will populate form
				loadEditForm(this.cells);
			}
			else {
				self.recipesTable.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
				self.selectedRow = this.cells;
				loadEditForm();
			}
	
	} );
		},
		error: function(xhr, desc, err) {
		}
	}); 
	
	//Set Button Functions
	$("#updateRecipeButton").bind("click", updateRecipe);
	$("#addRecipeButton").bind("click", addRecipe);
	
} );

// Load the Edit form with Recipe's info
function loadEditForm(){
	$('#editRecipeSection').removeClass('hidden');
	$('#editRecipeSection').addClass('column');
	//$('#addRecipeSection').addClass('hidden');

	$('#editIdInput').val(self.selectedRow[0].innerText);
	$('#editUpcInput').val(self.selectedRow[1].innerText);
	$('#editDopInput').val(self.selectedRow[2].innerText);
	$('#editExpInput').val(self.selectedRow[3].innerText);
	$('#editPriceInput').val(self.selectedRow[4].innerText);
	$('#editDistInput').val(self.selectedRow[5].innerText);
	$('#editSubInput').val(self.selectedRow[6].innerText);
}

// Remove a Recipe
function removeRecipe(){
	table.row('.selected').remove().draw( false );
}

function addRecipe(){
	//TODO: form validation
	var data = {"IngrID":$('#addIdInput').val(),"UPC":$('#addUpcInput').val(),
									"DOP":$('#addDopInput').val(),"Exp":$('#addExpInput').val(),
									"Price":$('#addPriceInput').val(),"Distributor":$('#addDistInput').val(),
									"SubIngr":$('#addSubInput').val()};
	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'addRecipe', 'data': data},
            success: function () {
				// Maybe get the actual DB to populate row??
				//var idx = self.recipesTable.fnSettings().fnRecordsTotal() + 1;
				//self.recipesTable.fnAddData(data);
			}
    });
}

function updateRecipe(){
	//TODO: AJAX call and return from DB b4 changing UI
	
	//TODO: Update probably needs to choose last param based on position in table vs its own ID
	self.recipesTable.fnUpdate({"IngrID":$('#editIdInput').val(),"UPC":$('#editUpcInput').val(),
									"DOP":$('#editDopInput').val(),"Exp":$('#editExpInput').val(),
									"Price":$('#editPriceInput').val(),"Distributor":$('#editDistInput').val(),
									"SubIngr":$('#editSubInput').val()}, parseInt(self.selectedRow[0].innerText)-1);
	$('#editRecipeSection').addClass('hidden');
	$('#editRecipeSection').removeClass('column');
	//$('#addRecipeSection').removeClass('hidden');							
									
}