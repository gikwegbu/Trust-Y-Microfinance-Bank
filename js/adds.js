$(function(){
	
	$(".adds-form").submit(function(){
		
		var id=$(this).attr('id');
		qstring='addid='+id;
		$.ajax({
			type: "POST",
			url:"index.php",
			data:qstring,
			success:function(response){
				alert(response);
				
			}
			
		});
		
		
		
	});
});