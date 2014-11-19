var self;
var boxSize;
var batchesList;
var recipeID;

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
/*
	var radio = document.getElementById('type');

	var scanRadio = radio.createElement("INPUT");
	scanRadio.setAttribute("type", "radio");
	scanRadio.value("scan");

	var selectRadio = radio.createElement("INPUT");
	selectRadio.setAttribute("type", "radio");
	selectRadio.value("select");

	radio.appendChild(scanRadio);
	radio.appendChild(selectRadio);

	document.appendChild(radio);
	*/
	//Set Button Functions
	$("#selectNumberButton").bind("click", selectNumber);
	$("#createLabelButton").bind("click", createLabel);
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

	/*
	var type = self.getElementById('type').checked();
	if (type == 0){
		for (var i = 0; i<boxSize; i++) {
		createBatchSpotScan();
		}
	} else{
		for (var i = 0; i<boxSize; i++) {
			createBatchSpotSelect();
		}
	}
	*/
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
			opt.text = batchesList[i]['RecipeName'] + batchesList[i]['DOC'];
			selection.appendChild(opt);
		}

		selectDiv.appendChild(selection);
		div.appendChild(selectDiv);
	}
	var div = document.createElement("div");
	$(div).addClass("row");
	self.getElementById('batchesDiv').appendChild(div);
	var btn = document.createElement("BUTTON");        // Create a <button> element
	var t = document.createTextNode("Create Label");       // Create a text node
	btn.appendChild(t); 
	div.appendChild(btn);
}

function createLabel(){
	var labelData = new Object();

	var BIDs = new Array();
	var value;
	//get all BID's out of form
	for (var i = 0; i<boxSize; i++){
		value = $($($($(batchesDiv).children()[1]).children()[0]).children()[0]).val();
		BIDs[i] = value;
	}


}


function saveSuccessful(){
	alert("SAVED");
}

