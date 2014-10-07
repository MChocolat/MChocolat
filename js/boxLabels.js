var boxLabelsList = [];
var selectedRow;
var boxLabelsTable;
var self;

// Function for when page first loads, what you want it to do
$(document).ready( function () {
    self = this;

	// Load all BoxLabels  
	$.ajax({
		type: "POST",
		url: '/functions.php',
		cache: false,
		data: {'action': 'getBoxLabels'},
		success: function(data, status) {
			boxLabelsList = data;
			self.boxLabelsTable = $('#boxLabelsTable').dataTable({
				"aaData": jQuery.parseJSON(boxLabelsList),
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
			$('#boxLabelsTable tbody').on('mouseover', 'tr', function() {
				$(this).addClass('highlight');
			});
			$('#boxLabelsTable tbody').on('mouseout', 'tr', function() {
				$(this).removeClass('highlight');
			});
			
			// Mouse click row highlighting
			$('#boxLabelsTable tbody').on('click', 'tr', function() {
			if ( $(this).hasClass('selected') ) {
				var tr = $(this)
				//Selected item will populate form
				loadEditForm(this.cells);
			}
			else {
				self.boxLabelsTable.$('tr.selected').removeClass('selected');
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
	$("#updateBoxLabelButton").bind("click", updateBoxLabel);
	$("#addBoxLabelButton").bind("click", addBoxLabel);
	
} );

// Load the Edit form with BoxLabel's info
function loadEditForm(){
	$('#editBoxLabelSection').removeClass('hidden');
	$('#editBoxLabelSection').addClass('column');
	//$('#addBoxLabelSection').addClass('hidden');

	$('#editIdInput').val(self.selectedRow[0].innerText);
	$('#editUpcInput').val(self.selectedRow[1].innerText);
	$('#editDopInput').val(self.selectedRow[2].innerText);
	$('#editExpInput').val(self.selectedRow[3].innerText);
	$('#editPriceInput').val(self.selectedRow[4].innerText);
	$('#editDistInput').val(self.selectedRow[5].innerText);
	$('#editSubInput').val(self.selectedRow[6].innerText);
}

// Remove a BoxLabel
function removeBoxLabel(){
	table.row('.selected').remove().draw( false );
}

function addBoxLabel(){
	//TODO: form validation
	var data = {"IngrID":$('#addIdInput').val(),"UPC":$('#addUpcInput').val(),
									"DOP":$('#addDopInput').val(),"Exp":$('#addExpInput').val(),
									"Price":$('#addPriceInput').val(),"Distributor":$('#addDistInput').val(),
									"SubIngr":$('#addSubInput').val()};
	$.ajax({
            type: 'POST',
            url: '/functions.php',
			cache: false,
			data: {'action': 'addBoxLabel', 'data': data},
            success: function () {
				// Maybe get the actual DB to populate row??
				//var idx = self.boxLabelsTable.fnSettings().fnRecordsTotal() + 1;
				//self.boxLabelsTable.fnAddData(data);
			}
    });
}

function updateBoxLabel(){
	//TODO: AJAX call and return from DB b4 changing UI
	
	//TODO: Update probably needs to choose last param based on position in table vs its own ID
	self.boxLabelsTable.fnUpdate({"IngrID":$('#editIdInput').val(),"UPC":$('#editUpcInput').val(),
									"DOP":$('#editDopInput').val(),"Exp":$('#editExpInput').val(),
									"Price":$('#editPriceInput').val(),"Distributor":$('#editDistInput').val(),
									"SubIngr":$('#editSubInput').val()}, parseInt(self.selectedRow[0].innerText)-1);
	$('#editBoxLabelSection').addClass('hidden');
	$('#editBoxLabelSection').removeClass('column');
	//$('#addBoxLabelSection').removeClass('hidden');							
									
}