var rawMaterialsList = [];
var selectedRow;
var rawMaterialsTable;
var self;

// Function for when page first loads, what you want it to do
$(document).ready( function () {
    self = this;

	// Load all Raw Materials  
	$.ajax({
		type: "POST",
		url: 'functions.php',
		cache: false,
		data: {'action': 'getRawMaterials'},
		success: function(data, status) {
			rawMaterialsList = data;
			self.rawMaterialsTable = $('#rawMaterialsTable').dataTable({
				"aaData": jQuery.parseJSON(rawMaterialsList),
				"aoColumns": [
					{"sTitle": "ID", "mData": 'IngrID' },
					{"mData": 'UPC' },
					{"mData": 'DOP' },
					{"mData": 'Exp' },
					{"mData": 'Price' },
					{"mData": 'Distributor' },
					{"mData": 'SubIngr' }
				]
			});
			
			// Mouseover row highlighting
			$('#rawMaterialsTable tbody').on('mouseover', 'tr', function() {
				$(this).addClass('highlight');
			});
			$('#rawMaterialsTable tbody').on('mouseout', 'tr', function() {
				$(this).removeClass('highlight');
			});
			
			// Mouse click row highlighting
			$('#rawMaterialsTable tbody').on('click', 'tr', function() {
			if ( $(this).hasClass('selected') ) {
				var tr = $(this)
				//Selected item will populate form
				loadEditForm(this.cells);
			}
			else {
				self.rawMaterialsTable.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
				self.selectedRow = this.cells;
				loadEditForm();
			}
	
	} );
		},
		error: function(xhr, desc, err) {
			alert("SOME ERROR LOADING RAW MATERIALS");
		}
	}); 
	
	//Set Button Functions
	$("#updateRawMaterialButton").bind("click", updateRawMaterial);
	$("#addRawMaterialButton").bind("click", addRawMaterial);
	
} );

// Load the Edit form with Raw Material's info
function loadEditForm(){
	$('#editRawMaterialSection').removeClass('hidden');
	$('#addRawMaterialSection').addClass('hidden');

	$('#editIdInput').val(self.selectedRow[0].innerText);
	$('#editUpcInput').val(self.selectedRow[1].innerText);
	$('#editDopInput').val(self.selectedRow[2].innerText);
	$('#editExpInput').val(self.selectedRow[3].innerText);
	$('#editPriceInput').val(self.selectedRow[4].innerText);
	$('#editDistInput').val(self.selectedRow[5].innerText);
	$('#editSubInput').val(self.selectedRow[6].innerText);
}

// Remove a Raw Material
function removeRawMaterial(){
	table.row('.selected').remove().draw( false );
}

function addRawMaterial(){
	//TODO: form validation
	var data = {"IngrID":$('#addIdInput').val(),"UPC":$('#addUpcInput').val(),
									"DOP":$('#addDopInput').val(),"Exp":$('#addExpInput').val(),
									"Price":$('#addPriceInput').val(),"Distributor":$('#addDistInput').val(),
									"SubIngr":$('#addSubInput').val()};
	$.ajax({
            type: 'POST',
            url: 'functions.php',
			cache: false,
			data: {'action': 'addRawMaterial', 'data': data},
            success: function () {
				// Maybe get the actual DB to populate row??
				var idx = self.rawMaterialsTable.fnSettings().fnRecordsTotal() + 1;
				self.rawMaterialsTable.fnAddData(data);
			}
    });
}

function updateRawMaterial(){
	//TODO: AJAX call and return from DB b4 changing UI
	
	//TODO: Update probably needs to choose last param based on position in table vs its own ID
	self.rawMaterialsTable.fnUpdate({"IngrID":$('#editIdInput').val(),"UPC":$('#editUpcInput').val(),
									"DOP":$('#editDopInput').val(),"Exp":$('#editExpInput').val(),
									"Price":$('#editPriceInput').val(),"Distributor":$('#editDistInput').val(),
									"SubIngr":$('#editSubInput').val()}, parseInt(self.selectedRow[0].innerText)-1);
	$('#editRawMaterialSection').addClass('hidden');
	$('#addRawMaterialSection').removeClass('hidden');							
									
}