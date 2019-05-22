/*
	Kyle Demers
	Web Dev 2
	drawThis - get saved canvas from artist
*/

$(document).ready(setInterval(setup, 500));

function setup(){
	var user = $('#userNum').val();
	var opp = $('#oppNum').val();
	var image = '<img src="';
	var imageEnd = '"/>';
	
	$.ajax({
		url: "php/getCanvas.php",
		type: "POST",
		data: {id:user, oppid:opp},
		success: function(result){
			
		  $('#newCanvas').attr("src", result);
		}
	});
}