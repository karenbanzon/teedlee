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

	$(".star-1").hover(function(){
		$(".star-1").addClass("colored");
	}, function() { $(".star").removeClass("colored"); });

	$(".star-2").hover(function(){
		$(".star-1").addClass("colored");
		$(".star-2").addClass("colored");
	}, function() { $(".star").removeClass("colored"); });

	$(".star-3").hover(function(){
		$(".star-1").addClass("colored");
		$(".star-2").addClass("colored");
		$(".star-3").addClass("colored");
	}, function() { $(".star").removeClass("colored"); });

	$(".star-4").hover(function(){
		$(".star-1").addClass("colored");
		$(".star-2").addClass("colored");
		$(".star-3").addClass("colored");
		$(".star-4").addClass("colored");
	}, function() { $(".star").removeClass("colored"); });

	$(".star-5").hover(function(){
		$(".star-1").addClass("colored");
		$(".star-2").addClass("colored");
		$(".star-3").addClass("colored");
		$(".star-4").addClass("colored");
		$(".star-5").addClass("colored");
	}, function() { $(".star").removeClass("colored"); });


 });