/*
	Kyle Demers
	Web Dev 2
	drawThis - validates the added word
*/

$(document).ready(setup);

function setup(){
	$('#submit').click(validate);
	$('#clear').click(clear);
	$('#message').hide();
}//close setup

function clear(){
	$('.word').val("");
}//close clear

function validate(){
	var value = 0;
	var counter = 0;
	
	if(counter < 2){
		$('.validate').each(function(){
			value = $('.validate').val();
			
			if(value.length < 1){
				$('.validate').addClass('error');
				$('#message').html('enter something please');
				$('#message').show();
			}//close if
			else{
				counter++;
			}//close else
		});//close for each
	}//close if
	else{
		;//NoP
	}//close else
	
	if(counter < 2){
		$('#message').html('Something went wrong here.');
	}//close if
	else{
		$('.validate').removeClass('error');
		$('#message').hide();
		var info = new Array(10);
		var i = 0;
		
		$('.validate').each(function(){
			var value = $(this).val();
			info[i] = value;
			i++;
		});//close for each
	
		$('#message').hide();
		$.ajax({
			type: "POST",
			url: "../php/validateWord.php",
			data: {word:info[0],category:info[1]},
			success: function(response){
				$('#message').show();
				$('#message').html(response);
			}//close success function
		});//close ajax
	}//close else
}//close validate