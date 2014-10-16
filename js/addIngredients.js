$(document).ready( function () {
	$(document).keypress(function(e) {
		if(e.which == 13) {
			var $focused = $(':focus');
			if ($focused == $('#addUpcInput')) {
				alert ('You Pressed Enter in UPC!');
			}
		}
	});

});