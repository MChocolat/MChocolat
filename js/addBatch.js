var self;
var recipesList;

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
			recipesList = JSON.parse(data);
		},
		error: function(xhr, desc, err) {
		}
	});

	for (entry in recipesList) {
		document.getElementById('recipes').options[i] = new Option(entry['RecipeName']);
	};

	//Set Button Functions
	$("#selectRecipeButton").bind("click", selectRecipe);
	$("#barcodeButton").bind("click", addIngredients);
	
} );

function createIngredientRow(){
	var div = document.createElement("div");
	$(div).addClass("row");
	self.getElementById('ingredientsList').appendChild(div);
	
	
	var nameDiv = document.createElement("div");
	var barcodeDiv = document.createElement("div");
	
	$(nameDiv).addClass("large-6 columns");
	$(barcodeDiv).addClass("large-6 columns");
	
	var name = document.createElement("input");
	name.type = "text";
	name.placeholder = "Name"
	var barcode = document.createElement("input");
	barcode.type = "text";
	barcode.placeholder = "Barcode";
	
	nameDiv.appendChild(name);
	barcodeDiv.appendChild(barcode);
	
	div.appendChild(nameDiv);
	div.appendChild(barcodeDiv);	
}

function selectRecipe(){
	//Load ingredients for selected recipe
}

function addBatch(){
	//Save batch to DB
}

function addIngredients(){
	// TODO: actually take barcode info and create rows
	for(i = 0; i < 10; i++){
		createIngredientRow();
	}	
}
