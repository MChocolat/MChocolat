var self;

// Function for when page first loads, what you want it to do
$(document).ready( function () {
    self = this;
	
	
	for(i = 0; i < 15; i++){
		document.getElementById('ingredientNum').options[i] = new Option(i + 1);
	}
	
	
	createIngredientRow();
	
	
	
	
	//Set Button Functions
	//$("#updateRecipeButton").bind("click", updateRecipe);
	//$("#addRecipeButton").bind("click", addRecipe);
	
} );

function createIngredientRow(){
	var div = document.createElement("div");
	div.class = "row";
	
	var nameDiv = document.createElement("div");
	var numDiv = document.createElement("div");
	var unitDiv = document.createElement("div");
	
	nameDiv.class = "large-2 columns";
	numDiv.class = "large-2 columns";
	unitDiv.class = "large-2 columns end";
	
	var name = document.createElement("input");
	name.type = "text";
	var num = document.createElement("input");
	num.type = "text";
	var unit = document.createElement("select");
	
	unit.options[0] = new Option("cups");
	unit.options[1] = new Option("liters");
	unit.options[2] = new Option("TBsp");
	unit.options[3] = new Option("tsp");
	
	nameDiv.appendChild(name);
	numDiv.appendChild(num);
	unitDiv.appendChild(unit);
	
	div.appendChild(nameDiv);
	div.appendChild(numDiv);
	div.appendChild(unitDiv);
	
	self.getElementById('ingredientsList').appendChild(div);	
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
			}
    });
}
