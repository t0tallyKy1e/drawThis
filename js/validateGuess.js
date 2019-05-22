/*
	Kyle Demers
	Web Dev 2
	drawThis - validates guess from contestant
*/

$(document).ready(setup);

function setup(){
	$('#submit').click(validate);
	//submit on enter
	$('#userGuess').keyup(function(event){
		if(event.keyCode == 13){
			$('#submit').click();
		}//close if
	});//close function
	$('#message').hide();
}//close setup

function validate(){
	var guess = $('#userGuess').val();
	var user = $('#userNum').val();
	var opp = $('#oppNum').val();
	
	if(guess.length < 1){
		$('#userGuess').addClass('error');
		$('#message').html('enter something please');
		$('#message').show();
	}//closeif
	else{
	
		$('#message').hide();
		$.ajax({
			type: "POST",
			url: "../php/validateGuess.php",
			data: {user:user, opp:opp, answer:guess},
			success: function(response){
				$('#message').show();
				$('#message').html(response);
			}//close success function
		});//close ajax
	}//close else
}//close validate