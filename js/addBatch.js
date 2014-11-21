var self;
var recipesList;
var ingredientsList;
var recipeID;

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
			recipesList = jQuery.parseJSON(data);
			
			for (var i = 0; i<recipesList.length; i++) {
				document.getElementById('recipeSelect').options[i] = new Option(recipesList[i]['RecipeName']);
			}
		},
		error: function(xhr, desc, err) {
		}
	});
	
	//Set Button Functions
	$("#selectRecipeButton").bind("click", selectRecipe);
	$("#barcodeButton").bind("click", addIngredients);
	$("#addBatchButton").bind("click", addBatch);
	
} );

function clearBatchIngredients(){
	$('#ingredientsDiv').empty();
	ingredientsList = [];
}

function createIngredientRow(i){
	var div = document.createElement("div");
	$(div).addClass("row");
	self.getElementById('ingredientsDiv').appendChild(div);
	
	var nameDiv = document.createElement("div");
	var idDiv = document.createElement("div");
	
	$(nameDiv).addClass("large-6 columns");
	$(idDiv).addClass("large-6 columns");

	var name = document.createElement("p");
	var t = document.createTextNode(ingredientsList[i]['IngrName']);
	name.appendChild(t);
	
	var id = document.createElement("input");
	id.type = "text";
	id.placeholder = "Ingredient ID";
	
	nameDiv.appendChild(name);
	idDiv.appendChild(id);
	

	div.appendChild(nameDiv);
	div.appendChild(idDiv);	
}

function selectRecipe(){
	clearBatchIngredients();

	recipeID = getRecipeID($("#recipeSelect option:selected").text());
	var data = {"RecipeID":recipeID};

	//Load ingredients for selected recipe
	$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'getRecipeIngredients', 'data': data},
		success: function(data, status) {
			ingredientsList = jQuery.parseJSON(data);
			
			for (var i = 0; i<ingredientsList.length; i++) {
				createIngredientRow(i);
			}
		},
		error: function(xhr, desc, err) {
		}
	});
	
	
}

function getRecipeID(recipe){
	var ID;
	for (var i = 0; i<recipesList.length; i++) {
		if (recipesList[i]['RecipeName'] == recipe){
			ID = recipesList[i]['RecipeID'];
		}
	}
	return ID.toString();
}

function addBatch(){
	//Save batch to DB
	
	var data = {"RecipeID": recipeID};
	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'addBatch', 'data': data},
            success: function (data, status) {
				//Do another AJAX save ingredients associated with recipe to ingrRecipe table
				addBatchIngredients(data);
			}
    });
}

function addBatchIngredients(batchID){
	//TODO: form validation
	var data = new Array();

	var ingredients = $(ingredientsDiv).children();
	
	var id;
	var IngrID;
	
	for(i = 0; i < ingredients.size(); i++){
		IngrID = $($($(ingredients[i]).children()[1]).children()[0]).val();
		var row = {"BID": batchID, "IngrID":IngrID};
		data[i] = row;
	}

	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'addBatchIngredients', 'data': data},
            success: function (data, status) {
				saveSuccessful();
				window.location="/display/printBatch.php"+'?param=' + data;
			}
    });

}

function saveSuccessful(){
	alert("SAVED");
}




function addIngredients(){
	// TODO: actually take barcode info and create rows
	for(i = 0; i < 10; i++){
		createIngredientRow();
	}	
}
