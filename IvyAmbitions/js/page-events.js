/*
	page-events.js
	
	Contains all custom scripts written to provide interactivity throughout the site
*/

function show(id){
	var id = document.getElementById(id);
	id.style.display = 'block';
}

function hide(id){
	var id = document.getElementById(id);
	id.style.display = 'none';
}

function toggle_visibility(id) {
   var id = document.getElementById(id);
   if(id.style.display == 'block')
	  id.style.display = 'none';
   else
	  id.style.display = 'block';
}

