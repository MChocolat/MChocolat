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
			self.recipesTable = $('#recipesTable').DataTable({
				"aaData": jQuery.parseJSON(recipesList),
				"aoColumns": [
					{"mData": 'RecipeID' },
					{"mData": 'RecipeName' }
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
	$("#editRecipeButton").bind("click", editRecipe);
	$("#deleteRecipeButton").bind("click", deleteRecipe);
	
	$( "#dialog" ).dialog({ autoOpen: false, maxWidth:600,
                    maxHeight: 500,
                    width: 600,
                    height: 500, });
	
} );

// Load the Edit form with Recipe's info
function loadEditForm(){
	/*
	$('#editRecipeSection').removeClass('hidden');
	$('#editRecipeSection').addClass('column');
	//$('#addRecipeSection').addClass('hidden');

	$('#editIdInput').val(self.selectedRow[0].innerText);
	$('#editNameInput').val(self.selectedRow[1].innerText);
	*/
}

//Delete recipe from DB
function deleteRecipe(){
	var data = {"RecipeID":self.selectedRow[0].innerText};

	$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'deleteRecipe',
				'data': data},
		success: function (data, status) {
				removeRecipeRow();
		},
		error: function() {alert("Error when deleting recipe!");}
				
	});
}

// Remove a recipe from the table
function removeRecipeRow(){
	self.recipesTable.row('.selected').remove().draw( false );
	alert("Recipe Deleted!!!!");
}

function editRecipe(){
	$( "#dialog" ).dialog( "open" );
}


function updateRecipe(){
	//TODO: AJAX call and return from DB b4 changing UI
	
	//TODO: Update probably needs to choose last param based on position in table vs its own ID
	self.recipesTable.fnUpdate({"RecipeID":$('#editIdInput').val(),"RecipeName":$('#editNameInput').val(),
									"Steps":$('#editStepsInput').val()}, parseInt(self.selectedRow[0].innerText)-1);
	$('#editRecipeSection').addClass('hidden');
	$('#editRecipeSection').removeClass('column');
	//$('#addRecipeSection').removeClass('hidden');							
									
}