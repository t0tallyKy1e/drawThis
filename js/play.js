/*
	Kyle Demers
	Web Dev 2
	drawThis - sequence after user hits play
*/

$(document).ready(setup);

function setup(){
	$('#play').click(addUser);
	$('#userStatus').hide();
	$('#oppSpot').hide();
	$('#buttons').hide();
}//close setup

function addUser(){
	$.ajax({
		type: "POST",
		url: "../php/addUser.php",
		success: function(response){
			var squigIndex = response.indexOf('~');
			var atIndex = response.indexOf('@');
			var status = "";
			var id = "";
			var count = 0;
			
			while(count < squigIndex){
				id = id + response[count];
				count++;
			}//close while
			
			count = squigIndex + 1;
			
			while(count < atIndex){
				status = status + response[count];
				count++;
			}//close while
			
			$('#userStatus').show();
			$('#userNum').val(id);
			$("#user").append(id);
			$("#status").append(status);
			$("#play").hide();
			$('#buttons').show();
			
			$.ajax({
				type: "POST",
				url: "php/addButton.php",
				success: function(response){
					$("#buttonSet").html(response);
				}//close success function
			});
		}//close success function
	});//close ajax
}//close addUser