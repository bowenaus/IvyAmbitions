function formatDate(id){
	dateStr = document.getElementById(id).value;
	
	if (dateStr=="") 
		return false;
	
	if (/^\d{2}\/\d{2}\/\d{4}$/.test(dateStr))
		return true;
	
	if ((/^[0-9]+$/.test(dateStr) && dateStr.length == 8)  ) {
		document.getElementById(id).value= dateStr.slice(0,2) + "/" + dateStr.slice(2,4) + "/" + dateStr.slice(4,8); 
		return true;
	}
	
	alert("Invalid date formatting")
	
	document.getElementById(id).value= "";

	return false;
	
	
}




