var self;
var ingredientsList;

// Function for when page first loads, what you want it to do
$(document).ready( function () {
    self = this;
	
	// Load all Ingredients so the user has something to choose from  
	/*$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'getIngredients'},
		success: function(data, status) {
			ingredientsList = JSON.parse(data);
		},
		error: function(xhr, desc, err) {
		}
	});*/
	
	// Create a way to add multiple ingredients to the existing ingredients
	for(i = 0; i < 15; i++){
		document.getElementById('ingredientNum').options[i] = new Option(i + 1);
	}
	
	//Set Button Functions
	$("#addIngredients").bind("click", addIngredients);
	$("#addRecipeButton").bind("click", addRecipe);
	
} );

function createIngredientRow(){
	var div = document.createElement("div");
	$(div).addClass("row");
	self.getElementById('ingredientsDiv').appendChild(div);
	
	
	var nameDiv = document.createElement("div");
	var numDiv = document.createElement("div");
	//var unitDiv = document.createElement("div");
	var removeIngrDiv = document.createElement("div");
	
	$(nameDiv).addClass("large-6 columns");
	$(numDiv).addClass("large-4 columns");
	$(removeIngrDiv).addClass("large-2 columns end");
	//$(unitDiv).addClass("large-3 columns");
	
	
	// TODO: Replace with autocomplete search box??
	// Ingredients combo box
	/*var nameSelect = document.createElement("select");
	for (var i=0; i < ingredientsList.length; i++)
	{
	  var option = document.createElement("option");
	  option.id = ingredientsList[i].IngrID;
	  option.value = ingredientsList[i];
	  option.innerHTML = ingredientsList[i].SubIngr;
	  nameSelect.appendChild(option);
	}*/
	
	var name = document.createElement("input");
	name.type = "text";
	name.placeholder = "Ingredient Name"
	
	//Amount input
	var num = document.createElement("input");
	num.type = "text";
	num.placeholder = "Amount"
	
	//Button to remove unneeded ingredients

	var removeIngrButton = document.createElement("button");
	$(removeIngrButton).addClass("small button");
	$(removeIngrButton).innerHTML = '-';
	
	nameDiv.appendChild(name);
	numDiv.appendChild(num);
	removeIngrDiv.appendChild(removeIngrButton);
	
	div.appendChild(nameDiv);
	div.appendChild(numDiv);
	div.appendChild(removeIngrDiv);
	
	$(removeIngrButton).bind("click", function(){div.remove();});
	
		
}


function addRecipe(){
	//TODO: form validation
	var data = {"RecipeName":$('#addNameInput').val()};
	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'addRecipe', 'data': data},
            success: function (data, status) {
				//Do another AJAX save ingredients associated with recipe to ingrRecipe table
				addRecipeIngredients(data);
			}
    });
}


function addRecipeIngredients(recipeID){
	//TODO: form validation
	var data = new Array();
	
	var ingredients = $(ingredientsDiv).children();
	
	var ingr;
	var amnt;
	//var unit;
	
	for(i = 0; i < ingredients.size(); i++){
		ingr = $($($(ingredients[i]).children()[0]).children()[0]).val();
		amnt = $($($(ingredients[i]).children()[1]).children()[0]).val();
		//unit = $($($(ingredients[i]).children()[2]).children()[0]).val();
		
		//var row = {"RecipeID": recipeID,"IngrName":ingr,"Amount":amnt,"M_unit":unit};
		var row = {"RecipeID": recipeID,"IngrName":ingr,"Amount":amnt};
		
		data[i] = row;
	}

	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'addRecipeIngredients', 'data': data},
            success: function (data, status) {
				saveSuccessful();
			}
    });
}

function saveSuccessful(){
	alert("SAVED");
}

// Add the number of ingredient rows specified
function addIngredients(){
	var num = parseInt($('#ingredientNum').val());
	
	for(i = 0; i < num; i++){
		createIngredientRow();
	}
	
}
