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
			self.ingredientsTable = $('#ingredientsTable').DataTable({
				"aaData": jQuery.parseJSON(ingredientsList),
				"bAutoWidth": false,
				"aoColumns": [
					{"mData": 'IngrID' },
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
	$("#printIngredientButton").bind("click", printIngredient);
	$("#editIngredientButton").bind("click", editIngredient);
	
	
} );

function printIngredient(){
	var IngrID = self.selectedRow[0].innerText;
	var name = self.selectedRow[1].innerText;
	var date = self.selectedRow[3].innerText;
	$.ajax({
		type: 'POST',
		url: '/functions.php',
			cache: false,
			data: {'action': 'cheatAndDoNothing', 'data': name},
            success: function (data, status) {
            	if (name.indexOf("&") >= 0){
            		name = name.replace("&", "and");
            	}
            	window.location="/display/print.php"+'?param=' + IngrID + '&param2=' + name + '&param3=' + date;
            }
			
	})
}

//Delete ingredient from DB
function deleteIngredient(){
	var data = {"IngrID":self.selectedRow[0].innerText};

	$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'deleteIngredient',
				'data': data},
		success: function (data, status) {
				removeIngredient(); 
		},
		error: function() {alert("Error when deleting ingredient!");}
				
	});
}

// Remove a Ingredient from the table
function removeIngredient(){
	self.ingredientsTable.row('.selected').remove().draw( false );
	alert("Ingredient Deleted!!!!");
}

function editIngredient(){
	$('#editNameInput').val(self.selectedRow[1].innerText);
	$('#editUpcInput').val("You cannot edit UPC codes- Delete ingredient and re-enter");
	$('#editLotNumInput').val(self.selectedRow[5].innerText);
	$('#editExpInput').val(self.selectedRow[4].innerText);
	$('#editSubInput').val(self.selectedRow[6].innerText);	
}

function updateIngredient(){
	//TODO: form validation
	var data = {"IngrID":self.selectedRow[0].innerText,
				"IngrName":$('#editNameInput').val(),
				"UPC":self.selectedRow[2].innerText,
				"Exp":$('#editExpInput').val(),
				"LotNum":$('#editLotNumInput').val(),
				"SubIngr":$('#editSubInput').val()};
	if (data["IngrName"].indexOf("&") >= 0){
		data["IngrName"] = data["IngrName"].replace("&", "and");
	}
	if (data["SubIngr"].indexOf("&") >= 0){
		data["SubIngr"] = data["SubIngr"].replace("&", "and");
	}
	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'updateIngredient', 'data': data},
            success: function (data, status) {
			
				$(self.selectedRow[1]).text($('#editNameInput').val());
				$(self.selectedRow[4]).text($('#editExpInput').val());
				$(self.selectedRow[5]).text($('#editLotNumInput').val());
				$(self.selectedRow[6]).text($('#editSubInput').val());
				
				$('#dialog').trigger('reveal:close');
				alert("Ingredient SA-SA-SAVED!!!!");
			}
    });
}