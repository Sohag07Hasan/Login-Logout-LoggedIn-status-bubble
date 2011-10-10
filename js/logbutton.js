jQuery(document).ready(function($){
	
	
	
	//log in form shown if clicked
	$('.hide-down-arrow').bind('click',function(){		
		$('.if-user-not-loggedin').fadeOut('fast', function() {
			$(this).css({'display':'none'});
			$('.login-barextending').css({'display':'none'});			
			$('.while-logged-out').fadeIn('fast');
		});		
		return false;
	});
	
		
	//login form will be disappeared if clickd
	$('.show-arrow-up-link').click(function(){
		$('.while-logged-out').fadeOut('fast',function(){
			$(this).css({'display':'none'});
			$('.login-barextending').css({'display':'block'});						
			$('.if-user-not-loggedin').fadeIn('fast');
		});
		return false;
	});
	
	
});
