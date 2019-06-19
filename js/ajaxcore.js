$.ajaxSetup ({
	cache: false	//use for i.e browser to clean cache
});
$(function(){
		$("#a-post").load("vp-part.php");
$(".other-posts").load("otherposts.php");
$(".js-alert").remove();


   $('#comment').click(function(){
   
   var id=	$('#postid').val();
   var dataString='postid='+id;
   $.ajax({
   	type:"GET",
   	url:"comments.php",
   	data:dataString,
   	success:function(response){
   		  	$('#comments-container').html(response);
   	}
   });
   
   	});

/**
   $('.flag-comment').click(function(){
   
   var id=	$(this).attr('id');
   var dataString='flagcomment='+id;
   $.ajax({
   	type:"GET",
   	url:"comments.php",
   	data:dataString,
   	success:function(response){
   		  	alert('clicked');
   	}
   });
   
   	});

**/

   $('#commentform').submit(function(){
   

   $.ajax({
   	type:"GET",
   	url:"comments.php",
   	data:$(this).serialize(),
   	success:function(response){
   		  	$('#comments-container').html(response);
   		  
   	}
   });
   
   	});






   $('.addnew').click(function(){
      
      var div='<div class="tutorial-popup alert alert-info"><span class="close times" data-dismiss="alert">&times;</span><h3>Sell</h3><form id="sellform" action="index.php" method="post" enctype="multipart/form-data"><input type="text" placeholder="name of item" name="item" class="form-control"/><label for="file">preview image(if any):</label><input class="btn btn-primary" type="file" id="file" name="file" /><textarea class="form-control" rows="8" cols="6" name="description" placeholder="description"></textarea>'+' <input id="price" type="number" placeholder="price" name="price" class="form-control"/><button  type="submit" name="addstuff"class="btn btn-success pull-right"><span class="glyphicon glyphicon-ok"></span></button></form></div>';
      $('body').append(div);
   
         
      });
      
   



   $('#reportpost').click(function(){
  
     	$('body').append('<div class="hanger-container">'+
  '<div class="hanger">'+
     	'Why are you reporting this post ?<br><textarea id="other" placeholder="reasons" class="form-control" rows="5"max-size="200"></textarea><table class="table"> <tr><td>   <button role="close" class="btn btn-danger" data-dismiss="alert"id="cancel">Cancel</button> </td><td></td><td> <a id="proceed" class="btn btn-info"  style="" class="btn btn-info">Proceed</a></td></tr></table></div></div>');
     	
     	$("#cancel").click(function(){
     		$('.hanger-container').remove();
     		});
     		
     	$("#proceed").click(function(){
     		
     
    
   
 	var id=$("#postid").val();
     	
   			  var other=$("#other").val();
   	
     var reason=other;
   	qstring="report=" + id;
   	qstring+="&reason="+reason;

     		
$.ajax({
			type: "POST",
			url: "index.php",
			data: qstring,
			success: function(response) {
			$(".response-div").html(response);
$("#a-post").load("vp-part.php");
			$(".hanger-container").remove();
		
		
			}
		});
   });

});





   $('#reportupload').click(function(){
  
     	$('body').append('<div class="hanger-container">'+
   '<button class="btn btn-danger hanger-exit">Close</button>'+
   '<div class="hanger">'+
     	'Why are you reporting this post ?<br><textarea id="other" placeholder="reasons" class="form-control" rows="5"max-size="200"></textarea><table class="table"> <tr><td>   <button role="close" class="btn btn-danger" data-dismiss="alert"id="cancel">Cancel</button> </td><td></td><td> <a id="proceed" class="btn btn-info"  style="" class="btn btn-info">Proceed</a></td></tr></table></div></div>');
     	
     	$("#cancel").click(function(){
     		$('.hanger-container').remove();
     		});
     		
     	$("#proceed").click(function(){
     		
     
    
   
 	var id=$("#uploadid").val();
     	
   			  var other=$("#other").val();
   	
     var reason=other;
   	qstring="report=" + id;
   	qstring+="&reason="+reason;

     		
$.ajax({
			type: "POST",
			url: "index.php",
			data: qstring,
			success: function(response) {
			$(".response-div").html(response);
$("#a-post").load("vp-part.php");
			$(".hanger-container").remove();
		
			}
		});
   });

});




   $('#flag').click(function(){
   
   	var id=$("#postid").val();
   	
   	qstring="flag=" + id;

$.ajax({
			type: "POST",
			url: "index.php",
			data: qstring,
	success: function(response) {
			$(".response-div").html(response);

			}
		});
   });



   $('#comment').click(function(){
   
   	var id=$("#postid").val();
   	
   	qstring="comment=" + id;

$.ajax({
			type: "POST",
			url: "index.php",
			data: qstring,
			success: function() {
			
$("#a-post").load("vp-part.php");
		
			}
		});
   });
   
   
   $('.userjoined').click(function(){
   
   	var id=$("#tId").val();
   	
   	qstring="joined=" + id;

$.ajax({
			type: "GET",
			url: "ajax.php",
			data: qstring,
			success: function() {
			
$("#usersview").load("usersjoined.php");
		
			}
		});
   });




		$(".like-btn").click(function(){
		
		
	var id= $("#likeid").val();
qstring="like=" + id;

$.ajax({
			type: "GET",
			url: "index.php",
			data: qstring,
			success: function() {
			
		$("#a-post").load("vp-part.php");
		
			}
		});
		});
		
		
			$(".unlike-btn").click(function(){
			
		
	var id= $("#unlikeid").val();
qstring="unlike=" + id;

$.ajax({
			type: "GET",
			url: "index.php",
			data: qstring,
			success: function() {
			$("#a-post").load("vp-part.php");
		
			}
		});
		});
		
		
				$("#fdiv").load("follow.php");
	
	$("img").click(function() {
            
      $('body').append( '<div class="alert">'+
    
      '<a class="progress-div magictime boingInUp"  href="?savepic">' + '<button type="button" class="close" data-dismiss="alert">'+
'<span style="color:black;font-weight:bold;font-size:23px" aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+'<img class="img img-rounded fullview" width="310px" height="330px"  src="" /></a>');
      
          $('.progress-div').fadeIn(300);
		
	   $(".fullview").attr("src",$(this).attr("src"));
	   
	 	});
	  $(".list-group-item").mouseenter(function(){
				    $('.progress-div').slideDown(500);
  $('.progress-div').removeClass("boingInUp");
  $('.progress-div').addClass("boingOutDown");
		      $('.progress-div').remove();
			});
			
	$("div").mouseenter(function(){
				    $('.progress-div').slideDown(500);
  $('.progress-div').removeClass("boingInUp");
  $('.progress-div').addClass("boingOutDown");
		      
		    $('.progress1').remove();
			});
				$("body").mouseenter(function(){
				    $('.progress-div').slideDown(500);
  $('.progress-div').removeClass("boingInUp");
  $('.progress-div').addClass("boingOutDown");
		      $('.progress-div').remove();
			});
					
	$("table").mouseenter(function(){
					    $('.progress-div').slideDown(500);
  $('.progress-div').removeClass("boingInUp");
  $('.progress-div').addClass("boingOutDown");
		      $('.progress-div').remove();
			});
			
						
	$(".panel").mouseenter(function(){
					    $('.progress-div').slideDown(500);
  $('.progress-div').removeClass("boingInUp");
  $('.progress-div').addClass("boingOutDown");
		      $('.progress-div').remove();
			});
			
	
		$("#write").click(function(){
			$(".editor-div").load("sword.php");
		});
		
		
		
		$('#spass2').change(function(){
			if($(this).val()!=$('#spass1').val()){
					$('.response-div').html("passwords do no match");
	$(this).css('border-color','red');
						$('#submit-signup').attr('disabled',true);
						
			}else{
					$(this).css('border-color','green');
					$('#submit-signup').attr('disabled',false);
										$('.response-div').html("");
			}
		});
		
		
		
			$('#spass1').change(function(){
				var len=$(this).val();
			if(!(len.length >=6)){
					$('.response-div').html("password must be at least 6 characters long");
	$('#spass2').attr('disabled',true);
		$(this).css('border-color','red');
			}else{
						$(this).css('border-color','green');
	
					$('#spass2').attr('disabled',false);
			}
		});
		
		
		
		
			$('#tel').change(function(){
				var tel=$(this).val();
			if(!(tel.length >=11)){
					$('.response-div').html("phone must be al least 11 digits");
	$(this).css('border-color','red');
	$('#submit-signup').attr('disabled',true);
			}else{
					$(this).css('border-color','green');
					$('#submit-signup').attr('disabled',false);
															$('.response-div').html("");
			}
		});
		
		
		
		
		
$('#email').change(function(){
	var email=$(this).val();
	var qstring ='email='+email;
	$.ajax({
		type:"POST",
		url :"authenticate.php",
		data :qstring,
	success:function(response){
			$('.response-div').html(response);
			if(response=="email address is not registered"){
				$('#submit-login').attr('disabled',true);
				$('#email').css('border-color','red');
				
							$('#password').attr('disabled',true);
			}else{
							$('#submit-login').attr('disabled',false);
					$('#email').css('border-color','green');
								$('#password').attr('disabled',false);
			}
		}
	});
	
});


$('#password').change(function(){
	var password=$(this).val();
	var email=$('#email').val();
	var qstring ='password='+password;
	qstring+='&email='+email;
	$.ajax({
		type:"POST",
		url :"authenticate.php",
		data:qstring,
		before:function(){
					$('.response-div').html('<img src="../img/loading/loading19.gif');
		},
		success:function(response){
			$('.response-div').html(response);
			if(response=="password is incorrect"){
				$('#submit-login').attr('disabled',true);
					$('#password').css('border-color','red');
			}else{
							$('#submit-login').attr('disabled',false);
					$('#password').css('border-color','green');
			
			}
		},
		after:function(){
					$('.response-div').html(' ');
		}
	});
	
});
		
		
	})

function changeprofilepic(){
	
	
	
	$("body").append('<div class="alert magictime boingInUp profile-pic btn btn-primary" role="button">'+
'<button type="button" class="close" data-dismiss="alert">'+
'<span style="color:white" aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+
'<form class="a-right" enctype="multipart/form-data" action="?" method="post">'+
'<input type="hidden" name="GOTO" value="<? echo $_SERVER[DOCUMENT_ROOT]./ceet/students/index.php; ?>"'+
'<input class="btn btn-info" type="hidden" name="MAX_FILE_SIZE" value="5000000">'+
'<p class="a-left" >Set Profile Picture</p> <input class="btn btn-primary btn-block" name="profilepic" type="file">'+
'<input   name="setpic" value="setpic" type="hidden" />'+
'<input   class="a-left btn btn-info" type="submit" value="Set">'+
'</form></div>'
 );
	
	
	
}