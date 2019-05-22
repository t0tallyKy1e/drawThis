/*
	Kyle Demers
	Web Dev 2
	drawThis - Check guess JS
*/

$(document).ready(setInterval(setup, 500));

function setup(){
	var user = $('#userNum').val();
	var opp = $('#oppNum').val();
	
	$.ajax({
		type: "POST",
		url: "../php/checkGuess.php",
		data: {id:user, oppid:opp},
		success: function(serverResponse){
			$('#message').show();
			$('#message').html(serverResponse);
		}//close function
	});//close ajax
}//close setup