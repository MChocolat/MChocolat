var self;
var boxSize;
var batchesList;
var recipeID;
var ingrList;

// Function for when page first loads, what you want it to do
$(document).ready( function () {
    self = this;

    // Load all Batches  
	$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'getBatchesByDate'},
		success: function(data, status) {
			batchesList = jQuery.parseJSON(data);
		},
		error: function(xhr, desc, err) {
		}
	});

	var boxSizes = [4,6,8,12,15,16,24,30,36,45,60];
	for (var i = 0; i<boxSizes.length; i++){
	document.getElementById('numberSelect').options[i] = new Option(boxSizes[i]);
	}

	//Set Button Functions
	$("#selectNumberButton").bind("click", selectNumber);
	$("#scanButton").bind("click", createBatchSpotScan);
	$("#selectButton").bind("click", createBatchSpotSelect);
	
} );

function clearBatches(){
	$('#batchesDiv').empty();
	ingredientsList = [];
}

function selectNumber(){
	clearBatches();

	boxSize = $("#numberSelect option:selected").text();
}

function createBatchSpotScan(){

	clearBatches();

	boxSize = $("#numberSelect option:selected").text();

	for (var i = 0; i<boxSize; i++){
		var div = document.createElement("div");
		$(div).addClass("row");
		self.getElementById('batchesDiv').appendChild(div);
		
		var upcDiv = document.createElement("div");

		$(upcDiv).addClass("large-6 columns");

		
		var upc = document.createElement("input");
		upc.type = "text";
		upc.placeholder = "Ingredient UPC";

		upcDiv.appendChild(upc);

		div.appendChild(upcDiv);
	}

		var div = document.createElement("div");
	$(div).addClass("row");
	self.getElementById('batchesDiv').appendChild(div);
	var btn = document.createElement("BUTTON");        // Create a <button> element
	btn.setAttribute("id", "createLabelButton");
	btn.setAttribute("class", "tiny button");
	var t = document.createTextNode("Create Label");       // Create a text node
	btn.appendChild(t); 
	div.appendChild(btn);
	
	$("#createLabelButton").bind("click", createLabel);
}

function createBatchSpotSelect(){
	clearBatches();

	boxSize = $("#numberSelect option:selected").text();

	for (var j = 0; j<boxSize; j++){
		var div = document.createElement("div");
		$(div).addClass("row");
		self.getElementById('batchesDiv').appendChild(div);
		
		var selectDiv = document.createElement("div");

		$(selectDiv).addClass("large-6 columns");

		
		var selection = document.createElement("select");

		for (var i = 0; i<batchesList.length; i++){
			var opt = document.createElement("option");
			opt.value = batchesList[i]['BID'];
			opt.text = batchesList[i]['RecipeName'] + "- " + batchesList[i]['DOC'];
			selection.appendChild(opt);
		}

		selectDiv.appendChild(selection);
		div.appendChild(selectDiv);
	}
	var div = document.createElement("div");
	$(div).addClass("row");
	self.getElementById('batchesDiv').appendChild(div);
	var btn = document.createElement("BUTTON");        // Create a <button> element
	btn.setAttribute("id", "createLabelButton");
	btn.setAttribute("class", "tiny button");
	var t = document.createTextNode("Create Label");       // Create a text node
	btn.appendChild(t); 
	div.appendChild(btn);

	$("#createLabelButton").bind("click", createLabel);
}

function createLabel(){
	var labelData = new Object();

	var BIDs = new Array();
	var value;
	//get all BID's out of form
	for (var i = 0; i<boxSize; i++){ 
		value = $($($($(batchesDiv).children()[i]).children()[0]).children()[0]).val();
		BIDs[i] = value;
	}
	var data = BIDs;
	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'createSubIngredientList', 'data': data},
            success: function (data, status) {
				data = jQuery.parseJSON(data)
				var ingrName;
				var subIngr;
				ingrList = "";
				for (var i = 0; i<data.length; i++){
					ingrName = data[i]['IngrName'];
					subIngr = data[i]['SubIngr'];
					if (subIngr == null || subIngr == ""){
						ingrList = ingrList + ingrName + ", ";
					} else {
						ingrList = ingrList + ingrName + " (" + subIngr + "), ";
					}
				}
				console.log(ingrList);
				displayList(ingrList);
			}
    });
}

function displayList(ingrList){
		var div = document.createElement("div");
		$(div).addClass("h4");
		self.getElementById('selectNumberSection').appendChild(div);
		
		var textDiv = document.createElement("div");
		textDiv.setAttribute("class", "panel");

		var titleDiv = document.createElement("div");
		titleDiv.setAttribute("class", "row");
		var title = document.createTextNode("Sub-Ingredients List:");
		titleDiv.appendChild(title);
		textDiv.appendChild(titleDiv);
		
		var text = document.createTextNode(ingrList);
		textDiv.appendChild(text);
		div.appendChild(textDiv);
		

}

function saveSuccessful(){
	alert("SAVED");
}

