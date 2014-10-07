var packagingList = [];
var selectedRow;
var packagingTable;
var self;

// Function for when page first loads, what you want it to do
$(document).ready( function () {
    self = this;

	// Load all Packaging  
	$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'getPackaging'},
		success: function(data, status) {
			packagingList = data;
			self.packagingTable = $('#packagingTable').dataTable({
				"aaData": jQuery.parseJSON(packagingList),
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
			$('#packagingTable tbody').on('mouseover', 'tr', function() {
				$(this).addClass('highlight');
			});
			$('#packagingTable tbody').on('mouseout', 'tr', function() {
				$(this).removeClass('highlight');
			});
			
			// Mouse click row highlighting
			$('#packagingTable tbody').on('click', 'tr', function() {
			if ( $(this).hasClass('selected') ) {
				var tr = $(this)
				//Selected item will populate form
				loadEditForm(this.cells);
			}
			else {
				self.packagingTable.$('tr.selected').removeClass('selected');
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
	$("#updatePackagingButton").bind("click", updatePackaging);
	$("#addPackagingButton").bind("click", addPackaging);
	
} );

// Load the Edit form with Packaging's info
function loadEditForm(){
	$('#editPackagingSection').removeClass('hidden');
	$('#editPackagingSection').addClass('column');
	//$('#addPackagingSection').addClass('hidden');

	$('#editIdInput').val(self.selectedRow[0].innerText);
	$('#editUpcInput').val(self.selectedRow[1].innerText);
	$('#editDopInput').val(self.selectedRow[2].innerText);
	$('#editExpInput').val(self.selectedRow[3].innerText);
	$('#editPriceInput').val(self.selectedRow[4].innerText);
	$('#editDistInput').val(self.selectedRow[5].innerText);
	$('#editSubInput').val(self.selectedRow[6].innerText);
}

// Remove a Packaging
function removePackaging(){
	table.row('.selected').remove().draw( false );
}

function addPackaging(){
	//TODO: form validation
	var data = {"IngrID":$('#addIdInput').val(),"UPC":$('#addUpcInput').val(),
									"DOP":$('#addDopInput').val(),"Exp":$('#addExpInput').val(),
									"Price":$('#addPriceInput').val(),"Distributor":$('#addDistInput').val(),
									"SubIngr":$('#addSubInput').val()};
	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'addPackaging', 'data': data},
            success: function () {
				// Maybe get the actual DB to populate row??
				//var idx = self.packagingTable.fnSettings().fnRecordsTotal() + 1;
				//self.packagingTable.fnAddData(data);
			}
    });
}

function updatePackaging(){
	//TODO: AJAX call and return from DB b4 changing UI
	
	//TODO: Update probably needs to choose last param based on position in table vs its own ID
	self.packagingTable.fnUpdate({"IngrID":$('#editIdInput').val(),"UPC":$('#editUpcInput').val(),
									"DOP":$('#editDopInput').val(),"Exp":$('#editExpInput').val(),
									"Price":$('#editPriceInput').val(),"Distributor":$('#editDistInput').val(),
									"SubIngr":$('#editSubInput').val()}, parseInt(self.selectedRow[0].innerText)-1);
	$('#editPackagingSection').addClass('hidden');
	$('#editPackagingSection').removeClass('column');
	//$('#addPackagingSection').removeClass('hidden');							
									
}