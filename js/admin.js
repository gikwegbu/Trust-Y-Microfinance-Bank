
$.ajaxSetup ({
	cache: false	//use for i.e browser to clean cache
});

$(function(){
	
	$('#selectallusers').click(function(){
		
		  if(this.checked){
	$('input:checkbox').attr('checked',true);
		  	
		  	
		
		  	}else{
		  			$('input:checkbox').removeAttr('checked');
		  	
		  	}
	})
	
	$('.base').click(function(e){
		e.preventDefault();
		
	$('.f-right').load($(this).attr("id")+'.php');
	})
	
	$('.hanger').click(function(e){
		e.preventDefault();
		
	$('.hanger-container').css('visibility','visible');
	$('.hanger-div').load($(this).attr("id")+'.php');
	})
	$('.hanger-exit').click(function(){
		$('.hanger-container').css('visibility','hidden');
		$('.hanger-container-php').remove();
	})
})