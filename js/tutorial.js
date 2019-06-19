$(function(){
	$('#loading').remove();

	

//$('#usertutorial-loader').load('usertutorials-ext.php');
	//$('#viewtutorial-loader').load('viewtutorials-ext.php');
	
   $('.start-tutorial').click(function(){
      
      var div='<div class="tutorial-popup alert alert-info"><span class="close times" data-dismiss="alert">&times;</span><h3>start a new tutorial</h3><form id="form" action="../tutorial/index.php" method="post"><input type="text" placeholder="title" name="title" class="form-control"/><textarea class="form-control" rows="8" cols="6" name="descrip" placeholder="description"></textarea>'+
       
      '<label id="paidlabel"for="paid">paid </label> <input type="checkbox" name="paid" id="paid" value="paid" /><button  type="submit" name="newtutorial"class="btn btn-success pull-right"><span class="glyphicon glyphicon-ok"></span></button></form></div>';
      $('body').append(div);
      $('#paid').change(function(){
          if(this.checked){
  var price= '<input id="price" type="number" placeholder="amount" name="price" class="form-control"/>';
  
     $('#paidlabel').before(price);
         
           
      }else{
      	$('#price').remove();
      }
         
      })
      
   });
   
   
  

   $('.leave-tutorial').click(function(){
   	var id=$(this).attr('id');
   	$('body').append('<div class="tutorial-popup alert alert-info">Are you sure you want to exit this this lecture ?.achievements made will be lost.<br>     <table class="table"> <tr><td>   <button class="btn btn-info" role="button"id="dismiss" data-dismiss="alert">Cancel</button> </td><td></td><td> <a id="proceed" class="btn btn-danger"  style="" class="btn btn-info">Proceed</a></td></tr></table></div> ');
   	
   	$('#proceed').attr('href','index.php?removeme='+id);
   	});
   	$('#dismiss').click(function(){
   		$('.alert').remove();
   	
   	})
   	
  
	
 $('#upload-btn').click(function(){
 	 
$('#uploadform-loader').load('upload.php');
   	$('#uploadform-loader').slideToggle();
   	  	
   	})
   
   
})