$(document).ready( function () {
	$(document).keypress(function(e) {
		if(e.which == 13) {
			if (document.activeElement.id == 'addUpcInput') {
				alert ('You Pressed Enter in UPC!');
			}
		}
	});

});