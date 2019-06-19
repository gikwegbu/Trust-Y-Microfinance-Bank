 
 
 $(document).ready(function(){
	 
	 
 
	$("#cloud-container").load("cloud.php #uploads-populated");
	
 
 
	
$(".glyphicon-upload").click(function(){
	
	$('html, body').animate({ scrollTop: $("#cloud-container").offset().top });	
	
	
	
	$("#cloud-container").load("cloud.php");
	$(".glyphicon-upload").hide();
	
	});

 $('#uploadprogress').hide();
  $('#uploadfile').click(function(){
	  
	   $('#uploadprogress').show();
  
    
  });
 });
