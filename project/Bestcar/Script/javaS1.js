// JavaScript Document
$(document).ready(function(){
	$('dd').hide();
	$('dt a').click(function(){
		$('dd:visible').slideUp('slow');
		if($(this).parent().next().is(':hidden') == true) 
			$(this).parent().next().slideDown('slow');
		return false;
	});
	
	$('#Sidebar ul li a').hover(function(){
		$(this).fadeTo('fast',0.7)},
		function(){$(this).fadeTo('fast',1.0)							 
	});
	
	$("#Sidebar ul li").hover(function(){ 

        $(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		$(this).find('div:first').css('display','block');
        },function(){ 
        $(this).find('ul:first').css({visibility: "hidden"}).hide(400);
		$(this).find('div:first').css('display','none');
		
    }); 
 
	$('.hide').hide();
	$('.detail').click(function(){
		$('.hide:visible').fadeOut('slow');						
		$(this).parent().next().fadeIn('slow');
		return false;
	})
	$('.ReadLess').click(function(){
		$(this).parent().parent().fadeOut('slow');
		return false;
	})
	
	$('#featured li a img').css('opacity',0.5);
	$('.selected').css('opacity',1.0);
	$('#featured li a').hover(function(){
		$(this).children('img').fadeTo('fast',1.0)},								   
		function(){	
		$(this).children().not('.selected').fadeTo('fast',0.5);	
	});
	
	$('#featured li a').click(function(){
		var $this = $(this),$url = $this.attr('href');
		 $('#featured li a img').removeClass('selected');
		 $this.children('img').addClass('selected');
		 $('.ImageBox').children('img')
		 	.fadeOut(400,function(){
				$(this)
				.attr('src',$url)
				.load(function(){
					$(this).fadeIn(400);
				});
			});
		 $('#featured li a img').not('.selected').fadeTo('fast',0.5);		
		 return false;
	});
});
