/*
Any site-specific scripts you might have.
*/

jQuery.noConflict();
jQuery(document).ready(function($){

    $('.entry img').each(function(){
        $(this).removeAttr('width')
        $(this).removeAttr('height');
    });
    
    $('input:text').focus(function(){
		var newValue = $(this).val();
		if($(this).val() == 'hola'){
			$(this).attr('value','');
		} else {
			$(this).val(newValue);
		}
	});
	
	$('input:text').blur(function(){
		var newValue = $(this).val();
		if($(this).val() == ''){
			$(this).attr('value','hola');
		} else {
			$(this).val(newValue);
		}
	});
	
	/*
	* menu mobile
	*/
	$('.open')
      .bind('click focus', function(){
        $('#menu-third').slideToggle();
        $('.open').toggleClass('active');
    }); 
   
   $('.close')
      .bind('click focus', function(){
        $('#menu-third').slideToggle();
        $('.open').toggleClass('active');
    }); 
 
});

/************************* 
	Functiones
**************************/
jQuery(function() {  
	if( jQuery('.blog-content').length) {
		var $container = jQuery('.blog-content');
		
		$container.imagesLoaded( function(){
		  $container.isotope({
			    itemSelector : 'article',
			    layoutMode : 'masonry',
			    itemPositionDataEnabled: true
		  });
		});
	}
});



