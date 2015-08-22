var batchesList = [];
var selectedRow;
var batchesTable;
var self;

// Function for when page first loads, what you want it to do
$(document).ready( function () {
    self = this;

	// Load all Batches  
	$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'getBatches'},
		success: function(data, status) {
			batchesList = data;
			self.batchesTable = $('#batchesTable').DataTable({
				"aaData": jQuery.parseJSON(batchesList),
				"aoColumns": [
					{"mData": 'BID' },
					{"mData": 'RecipeName' },
					{"mData": 'DOC' }
				]
			});
			
			// Mouseover row highlighting
			$('#batchesTable tbody').on('mouseover', 'tr', function() {
				$(this).addClass('highlight');
			});
			$('#batchesTable tbody').on('mouseout', 'tr', function() {
				$(this).removeClass('highlight');
			});
			
			// Mouse click row highlighting
			$('#batchesTable tbody').on('click', 'tr', function() {
			if ( $(this).hasClass('selected') ) {
				var tr = $(this)
				//Selected item will populate form
				loadEditForm(this.cells);
			}
			else {
				self.batchesTable.$('tr.selected').removeClass('selected');
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
	$("#editBatchButton").bind("click", editBatch);
	$("#updateBatchButton").bind("click", updateBatch);
	$("#deleteBatchButton").bind("click", deleteBatch);
	$('#printBatchButton').bind("click", printBatch);

} );

function printBatch(){
	var BatchID = self.selectedRow[0].innerText;
	var name = self.selectedRow[1].innerText;
	var date = self.selectedRow[2].innerText;
	$.ajax({
		type: 'POST',
		url: '/functions.php',
			cache: false,
			data: {'action': 'cheatAndDoNothing', 'data': name},
            success: function (data, status) {
            	window.location="/display/print.php"+'?param=' + BatchID + '&param2=' + name + '&param3=' + date;
            }
			
	})
} 

// Load the Edit form with Batch's info
function loadEditForm(){
	/*
	$('#editBatchSection').removeClass('hidden');
	$('#editBatchSection').addClass('column');
	//$('#addBatchSection').addClass('hidden');

	$('#editIdInput').val(self.selectedRow[0].innerText);
	$('#editUpcInput').val(self.selectedRow[1].innerText);
	$('#editDopInput').val(self.selectedRow[2].innerText);
	$('#editExpInput').val(self.selectedRow[3].innerText);
	$('#editPriceInput').val(self.selectedRow[4].innerText);
	$('#editDistInput').val(self.selectedRow[5].innerText);
	$('#editSubInput').val(self.selectedRow[6].innerText);
	*/
}

//Delete batch from DB
function deleteBatch(){
	var data = {"BID":self.selectedRow[0].innerText};

	$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'deleteBatch',
				'data': data},
		success: function (data, status) {
				removeBatchRow();
		},
		error: function() {alert("Error when deleting batch!");}
				
	});
}

// Remove a batch from the table
function removeBatchRow(){
	self.batchesTable.row('.selected').remove().draw( false );
	alert("Batch Deleted!!!!");
}

function addBatch(){
	//TODO: form validation
	var data = {"IngrID":$('#addIdInput').val(),"UPC":$('#addUpcInput').val(),
									"DOP":$('#addDopInput').val(),"Exp":$('#addExpInput').val(),
									"Price":$('#addPriceInput').val(),"Distributor":$('#addDistInput').val(),
									"SubIngr":$('#addSubInput').val()};
	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'addBatch', 'data': data},
            success: function () {
				// Maybe get the actual DB to populate row??
				//var idx = self.batchesTable.fnSettings().fnRecordsTotal() + 1;
				//self.batchesTable.fnAddData(data);
			}
    });
}

function editBatch(){
	$('#ingredientsDiv').empty();
	$('#batchNameHeader').text(self.selectedRow[1].innerText);
	var data = {"BID":self.selectedRow[0].innerText};

	//Load ingredients for selected recipe
	$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'getBatchIngredients', 'data': data},
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

function createIngredientRow(i){
	var div = document.createElement("div");
	$(div).addClass("row");
	self.getElementById('ingredientsDiv').appendChild(div);
	
	var idDiv = document.createElement("div");
	var nameDiv = document.createElement("div");
	
	$(idDiv).addClass("large-6 columns");
	$(nameDiv).addClass("large-6 columns");

	
	
	var name = document.createElement("p");
	var t = document.createTextNode(ingredientsList[i]['IngrName']);
	name.appendChild(t);
	
	var id = document.createElement("p");
	var s = document.createTextNode(ingredientsList[i]['IngrID']);
	id.appendChild(s);
	
	
	idDiv.appendChild(id);
	nameDiv.appendChild(name);
	
	div.appendChild(idDiv);
	div.appendChild(nameDiv);	
}

function updateBatch(){
	var data = new Array();

	var ingredients = $(ingredientsDiv).children();

	var upc;
	var ID;
	
	for(i = 0; i < ingredients.size(); i++){
		ID = $($($(ingredients[i]).children()[0]).children()[0]).text();
		upc = $($($(ingredients[i]).children()[2]).children()[0]).val();
		var row = {"ID":ID, "UPC":upc};
		data[i] = row;
	}

	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'updateBatchIngredients', 'data': data},
            success: function (data, status) {
				saveSuccessful();
			}
    });					
									
}