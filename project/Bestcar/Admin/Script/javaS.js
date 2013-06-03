$(document).ready(function(){
	$('#menu li a').hover(function(){
		$(this).children().animate({'left':30},'fast')},function(){
		$(this).children().animate({'left':10},'fast')	
		
	});	
});


	  