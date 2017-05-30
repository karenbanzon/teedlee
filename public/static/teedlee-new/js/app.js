$(document).foundation();

$(document).ready(function() 
 {

    $( '#submitSearch' ).click(function(e) {
        e.preventDefault();
        $( '#homeSearch' ).slideUp(300);
        $( '#categories' ).slideUp(300);
        $( '#standardSearch' ).fadeIn(300);
        $( '#searchResults' ).fadeIn(300);
        $( '#relatedAds' ).fadeIn(300);
        $( '.message-spelling' ).fadeIn(300);
        $( '.message-location' ).fadeIn(300);
        setTimeout(function(){
          $( '.callout' ).fadeOut(300);
        }, 3000);
        $(document).foundation();
    });

    $( '#spellCheckLink' ).click(function(e) {
        e.preventDefault();
        $( '#searchResults' ).slideUp(300);
        $( '.message-spelling' ).slideUp(300);
        $( '.message-noresults' ).fadeIn(300);
        $(document).foundation();
    });

    $( '.suggested-keywords a' ).click(function(e) {
        e.preventDefault();
        var keyword = $(this).attr('data-keyword');
        var count = $('#resultCount').attr('data-count');
        $('#searchQuery').val($('#searchQuery').val() + ' ' + keyword);
        $('#resultCount').html( count - 273 );
        $('#resultCount').attr('data-count', count - 273);
        $(this).fadeOut(300);
        if ( $('.suggested-keywords a:visible').length == 1 ) {
            $('.suggested-keywords').fadeOut(300);
        }
    });


 });