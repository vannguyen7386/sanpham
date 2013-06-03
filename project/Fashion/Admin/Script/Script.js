$(document).ready(function(){
	$('input.CheckAll').toggle(function(){
		$('input.Checked').attr('checked',true);
		$(this).attr('value','Uncheck');},
		function(){
		$('input.Checked').attr('checked',false);
		$(this).attr('value','CheckAll');
	});
   
});