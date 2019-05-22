/*
	Kyle Demers
	Web Dev 2
	drawThis - saves canvas drawing to database with AJAX call
*/

$(document).ready(setInterval(setup, 3000));

function setup(){
	var user = $('#userNum').val();
	var opp = $('#oppNum').val();
	var canvas = document.getElementById("defaultCanvas0");
	var dataURL = canvas.toDataURL('image/png');
	
	$.ajax({
		type: "POST",
		url: "../php/saveCanvas.php",
		data: {id:user,oppid:opp,image:dataURL},
		success: function(serverResponse){
		}//close function
	});//close ajax
}//close setup