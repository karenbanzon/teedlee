$(document).ready(function() 
 {
    
	$( '.dropdown-toggle' ).click(function(e) {
		e.preventDefault();
		$(this).next('.dropdown-menu').slideToggle(300);
	});

  $('.toggle-nav').click(function(e) {
    e.preventDefault();
    $('#site-wrapper').toggleClass('show-nav');  
  });


 });