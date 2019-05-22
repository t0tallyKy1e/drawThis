/*
	Kyle Demers
    04/19/2016
    Final Project - Display word and category
*/

$(document).ready(setup);

function setup(){
	showCategory();
}//close setup

function showCategory(){
	var user = $('#userNum').val();
	var opp = $('#oppNum').val();
	
	$.ajax({
		type: "POST",
		url:"../php/checkCategory.php",
		data: {id:user, oppid:opp},
		success: function(response){
			$("#categoryDisplay").html(response);
		}//close success function
	});//close ajax
}//close showSubject