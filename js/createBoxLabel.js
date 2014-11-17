var self;
var boxSize;
var ingredientsList;
var recipeID;

// Function for when page first loads, what you want it to do
$(document).ready( function () {
    self = this;
	
	/* Load all Recipes  
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
*/
	var boxSizes = [4,6,8,12,15,16,24,30,36,45,60];
	for (var i = 0; i<boxSizes.length; i++){
	document.getElementById('numberSelect').options[i] = new Option(boxSizes[i]);
	}
	//Set Button Functions
	$("#selectRecipeButton").bind("click", selectNumber);
	
} );

function clearBatches(){
	$('#batchesDiv').empty();
	ingredientsList = [];
}
/*
function createIngredientRow(i){
	var div = document.createElement("div");
	$(div).addClass("row");
	self.getElementById('ingredientsDiv').appendChild(div);
	
	
	var nameDiv = document.createElement("div");
	var upcDiv = document.createElement("div");
	
	$(nameDiv).addClass("large-6 columns");
	$(upcDiv).addClass("large-6 columns");

	var name = document.createElement("p");
	var t = document.createTextNode(ingredientsList[i]['IngrName']);
	name.appendChild(t);
	
	var upc = document.createElement("input");
	upc.type = "text";
	upc.placeholder = "Ingredient UPC";
	
	nameDiv.appendChild(name);
	upcDiv.appendChild(upc);
	
	div.appendChild(nameDiv);
	div.appendChild(upcDiv);	
}
*/

function selectNumber(){
	clearBatches();

	boxSize = $("#numberSelect option:selected").text();

	//Load ingredients for selected recipe
	for (var i = 0; i<boxSize; i++) {
		createBatchSpot();
	}
}

function createBatchSpot(){
	var div = document.createElement("div");
	$(div).addClass("row");
	self.getElementById('ingredientsDiv').appendChild(div);
	
	var upcDiv = document.createElement("div");

	$(upcDiv).addClass("large-6 columns");

	
	var upc = document.createElement("input");
	upc.type = "text";
	upc.placeholder = "Ingredient UPC";

	upcDiv.appendChild(upc);

	div.appendChild(upcDiv);
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
	
	var upc;
	
	for(i = 0; i < ingredients.size(); i++){
		upc = $($($(ingredients[i]).children()[1]).children()[0]).val()
		var row = {"BID": batchID, "IngrID":upc};
		data[i] = row;
	}

	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'addBatchIngredients', 'data': data},
            success: function (data, status) {
				saveSuccessful();
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
