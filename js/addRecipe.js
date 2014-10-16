var self;
var ingredientsList;

// Function for when page first loads, what you want it to do
$(document).ready( function () {
    self = this;
	
	// Load all Ingredients so the user has something to choose from  
	$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'getIngredients'},
		success: function(data, status) {
			ingredientsList = JSON.parse(data);
			
			// Create a way to add multiple ingredients to the existing ingredients
			for(i = 0; i < 15; i++){
				document.getElementById('ingredientNum').options[i] = new Option(i + 1);
			}
			// Create the row for adding an ingredient to the recipe
			createIngredientRow();
		},
		error: function(xhr, desc, err) {
		}
	});
	
	//Set Button Functions
	$("#addIngredients").bind("click", addIngredients);
	$("#addRecipeButton").bind("click", addRecipe);
	
} );

function createIngredientRow(){
	var div = document.createElement("div");
	$(div).addClass("row");
	self.getElementById('ingredientsList').appendChild(div);
	
	
	var nameDiv = document.createElement("div");
	var numDiv = document.createElement("div");
	var unitDiv = document.createElement("div");
	var removeIngrDiv = document.createElement("div");
	
	$(nameDiv).addClass("large-3 columns");
	$(numDiv).addClass("large-3 columns");
	$(unitDiv).addClass("large-3 columns");
	$(removeIngrDiv).addClass("large-3 columns end");
	
	// TODO: Replace with autocomplete search box??
	// Ingredients combo box
	var nameSelect = document.createElement("select");
	for (var i=0; i < ingredientsList.length; i++)
	{
	  var option = document.createElement("option");
	  option.id = ingredientsList[i].IngrID;
	  option.value = ingredientsList[i];
	  option.innerHTML = ingredientsList[i].SubIngr;
	  nameSelect.appendChild(option);
	}
	
	//Amount input
	var num = document.createElement("input");
	num.type = "text";
	num.placeholder = "Amount"
	
	// Units combobox
	var unit = document.createElement("select");
	unit.options[0] = new Option("cups");
	unit.options[1] = new Option("liters");
	unit.options[2] = new Option("TBsp");
	unit.options[3] = new Option("tsp");
	
	//Button to remove unneeded ingredients
	var removeIngrButton = document.createElement("button");
	$(removeIngrButton).addClass("tiny button");
	$(removeIngrButton).innerHTML = "-";
	
	
	
	
	nameDiv.appendChild(nameSelect);
	numDiv.appendChild(num);
	unitDiv.appendChild(unit);
	removeIngrDiv.appendChild(removeIngrButton);
	
	
	div.appendChild(nameDiv);
	div.appendChild(numDiv);
	div.appendChild(unitDiv);
	div.appendChild(removeIngrDiv);
	
	$(removeIngrButton).bind("click", function(){div.remove();});
	
		
}


function addRecipe(){
	//TODO: form validation
	var data = {"RecipeID":$('#addIdInput').val(),"RecipeName":$('#addNameInput').val(),
									"Steps":$('#addStepsInput').val()};
	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'addRecipe', 'data': data},
            success: function () {
				// Maybe get the actual DB to populate row??
				//var idx = self.recipesTable.fnSettings().fnRecordsTotal() + 1;
				//self.recipesTable.fnAddData(data);
				
				//Do another AJAX save ingredients associated with recipe to ingrRecipe table
				addRecipeIngredients();
			}
    });
}


function addRecipeIngredients(){
	//TODO: form validation
	var data;
	
	var ingredientsList = $('#ingredientsList');
	
	
	var data = {"RecipeID":$('#addIdInput').val(),"RecipeName":$('#addNameInput').val(),
									"Steps":$('#addStepsInput').val()};
	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'addRecipeIngredients', 'data': data},
            success: function () {
				saveSuccessful();
			}
    });
}

function saveSuccessful(){
	// TODO: Show a fading "Save Successful" Banner
}

// Add the number of ingredient rows specified
function addIngredients(){
	var num = parseInt($('#ingredientNum').val());
	
	for(i = 0; i < num; i++){
		createIngredientRow();
	}
	
}
