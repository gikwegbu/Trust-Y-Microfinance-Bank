


$(function() {
	   
	$('#chatform').submit(function(e){
e.preventDefault();
var val=$('#msgbox').val();
if (val=='') {return false;	}
	
		$.ajax({
			type: 'POST',
			url: 'submit.php',
			data: $(this).serialize(),
			success: function() {
				
				$('#msgbox').val('');
			$('html, body').animate({ scrollTop: $(".scrl").offset().top });	

			}
		});
	});
 
		
	$('#follow').click(function(){
		
		var id = $('#followid').val();
		
		
		
		
		var dataString = 'follow=' + id;
		
		$.ajax({
			type: "POST",
			url: "following.php",
			data: dataString,
			success: function() {
			$("#fdiv").load("follow.php");

			}
		});
	});
	
	
	$('#unfollow').click(function(){
		
		var id = $('#unfollowid').val();
		
	
		
		var dataString = 'unfollow=' + id;
		
		$.ajax({
			type: "POST",
			url: "unfollowing.php",
			data: dataString,
			success: function() {
			$("#fdiv").load("follow.php");

			}
		});
	});
	

	

	
	
	
});