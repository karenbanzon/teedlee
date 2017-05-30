$(document).ready(function() 
 {
    
	$( '#submitSearch' ).click(function(e) {
        e.preventDefault();
        $( '#homeSearch' ).slideUp(300);
        $( '#standardSearch' ).fadeIn(300);
    });


 });