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
			}
			if ( batchesTable.length > 0 ) {
                batchesTable.fnAdjustColumnSizing();
            }
			);
			
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
	//$("#updateBatchButton").bind("click", updateBatch);
	$("#deleteBatchButton").bind("click", deleteBatch);
	
} );

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

function updateBatch(){
	//TODO: AJAX call and return from DB b4 changing UI
	
	//TODO: Update probably needs to choose last param based on position in table vs its own ID
	self.batchesTable.fnUpdate({"IngrID":$('#editIdInput').val(),"UPC":$('#editUpcInput').val(),
									"DOP":$('#editDopInput').val(),"Exp":$('#editExpInput').val(),
									"Price":$('#editPriceInput').val(),"Distributor":$('#editDistInput').val(),
									"SubIngr":$('#editSubInput').val()}, parseInt(self.selectedRow[0].innerText)-1);
	$('#editBatchSection').addClass('hidden');
	$('#editBatchSection').removeClass('column');
	//$('#addBatchSection').removeClass('hidden');							
									
}