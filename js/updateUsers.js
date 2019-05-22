/*
	Kyle Demers
	Web Dev 2
	drawThis - sequence after user hits refresh users
*/

$(document).ready(setup);

function setup(){
	$('#refresh').click(refresh);
}//close setup

function refresh(){
	$.ajax({
		type: "POST",
		url: "../php/addButton.php",
		success: function(response){
			$("#buttonSet").html(response);
		}//close success function
	});
}//close refresh