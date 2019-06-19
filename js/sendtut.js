$.ajaxSetup ({
	cache: false	//use for i.e browser to clean cache
});

/**
function scrl(){
	   
var $board = $('.board');

    var lastParagraphPosition = $('.board div:last').position();
    var scrollPosition = $board.scrollTop() + lastParagraphPosition.top;
    $('.board').animate({scrollTop: scrollPosition}, 300);

	
}
**/
function scrl(){
			$('html, body').animate({ scrollTop: $("#pushdown").offset().top });	
}
$(function(){
	$('.loader').remove();
		scrl();
   
	$('#tutform').submit(function(e){

var val=$('#textb').val();
if (val=='') {return false;	}
	
		$.ajax({
			type: 'POST',
			url: 'index.php',
			data: $(this).serialize(),
			success: function() {
				
				$('#textb').val('');
		scrl();
			}
		});
	});
 
	
})