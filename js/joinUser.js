/*
	Kyle Demers
	Web Dev 2
	drawThis - Sequence after user hits pick on a user
*/

$(document).ready(setup);

function setup(){
	$('#pickUser').click(play);
	$('.game').hide();	
}//close setup

function play(){
	var value = $('#users').val();
	
	$('#message').html(value);
	
	$("#oppNum").val(value);
	$('#oppSpot').show();
	$('#opponent').html(value);
	$('.game').show();
	$('#buttons').hide();
	
	var user = $('#userNum').val();
	var opp = $('#oppNum').val();
	
	$.ajax({
		type: "POST",
		url: "php/occupyStatus.php",
		data: {id:user},
		success: function(response){
			$.ajax({
				type: "POST",
				url: "php/startGame.php",
				data: {id:user, oppid:opp},
				success: function(serverResponse){
					var stopping_point = serverResponse.indexOf("<");
					var altered_response = "";
					for (var i = 0; i < stopping_point; i++) {
						altered_response = altered_response + serverResponse[i];
					} // close for

					$('#testScript').html(altered_response);
				}//close function
			});//close ajax
		}//close function
	});//close ajax
}//close play