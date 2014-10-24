function myPrint(){
    var date = prompt("Please enter the date", "00/00/00");
	var name = prompt("Please enter the name of the product", "Chocolate");
	if (date==null || name==null){
		w.close;
		alert("You forgot the date or name!");
	}
	else{
		w=window.open();
			if (name.length<=5){
				w.document.write('<style>  p   {font-size:80px ; color:black; margin-left: auto; margin-right: auto;width: 6em } </style>');
			}
			if (name.length>5){
				w.document.write('<style>  p   {font-size:12px ; color:black } </style>');
			}
		w.document.write('<p id="label"></p>');
		w.document.getElementById("label").innerHTML = "The date is " + date + " and the ingridients are "+ name;
		w.print();
		w.close();
	}
}