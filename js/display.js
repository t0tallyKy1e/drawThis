/*
	Kyle Demers
    04/19/2016
    Final Project - Display word and category
*/

$(document).ready(setup);

function setup(){
	var number = Math.floor((Math.random() * 20) + 1);
	showSubject(number);
}//close setup

function showSubject(tempNumber){
	var user = $('#userNum').val();
	var opp = $('#oppNum').val();
	
	$.ajax({
		type: "POST",
		url:"../php/getRandom.php",
		data: {id:user, oppid:opp},
		success: function(response){
			var squigIndex = response.indexOf('~');
			var atIndex = response.indexOf('@');
			var bangIndex = response.indexOf('!');
			var i = 0;
			var word = "";
			var category = "";
			var number = "";
			
			while(i < squigIndex){
				word = word + response[i];
				i++;
			}//close while
			
			i = squigIndex + 1;
			
			while(i < atIndex){
				category = category + response[i];
				i++;
			}//close while
			
			i = atIndex + 1;
			
			while(i < bangIndex){
				number = number + response[i];
				i++;
			}//close while
			
			$("#secretWord").html(word);
			$("#categoryDisplay").html(category);
			$("#hidden").val(number);
		}//close success function
	});//close ajax
}//close showSubject