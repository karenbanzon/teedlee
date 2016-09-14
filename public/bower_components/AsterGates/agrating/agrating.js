(function( $ ) {
    $.fn.agrating = function( options )
    {
        var me = $(this);
        var container = me.find('#ag-images');
        var stars = me.find('.star');
        var rating = me.find('input[name="rating"]');
        var vote = me.find('#ag-vote');
        var skip = me.find('#ag-skip');
        var token = me.find('input[name="_token"]').val();

        var settings = $.extend({
            data: [],
            start: 0,
        }, options);

        return this.each(function()
        {
            stars.on('mouseover', function(e) {
                if( rating.val() == '' ) {
                    activate($(this));
                }
            });

            stars.on('mouseout', function(e) {
                if( rating.val() == '' ) {
                    $(this).removeClass('colored');
                }
            });

            stars.on('click', function(e)
            {
                e.preventDefault();

                if( $(this).data('value') != '' && $(this).data('value')==rating.val() )
                {
                    rating.val('');
                } else {
                    activate($(this));
                    rating.val($(this).data('value'));
                }
            });

            vote.on('click', function(e) {
                e.preventDefault();
                $.post('/vote', {
                    'id' : me.find('[name="submission_id"]').val(),
                    'rating' : rating.val(),
                    'comment' : me.find('[name="comment"]').val(),
                    '_token' : token,

                }).done(function( data ) {
                    advance();

                }).fail(function( data ){
                    advance();
                });
            });

            skip.on('click', function(e) {
                e.preventDefault();
                advance();
            });

            container.slick({
                "slideToShow": 1,
            });

            update(settings.data[settings.start]);
        });

        function activate(obj)
        {
            obj.addClass('colored');

            $.each(obj.prevAll(), function () {
                $(this).addClass('colored');
            });

            $.each(obj.nextAll(), function () {
                $(this).removeClass('colored');
            });
        }

        function reset()
        {
            stars.removeClass('colored');
            rating.val('');
        }

        function update( data )
        {
            reset();

            me.find('[name="submission_id"]').val(data.id);
            me.find('#ag-title').html(data.title);
            me.find('#ag-author').html(data.user.username);
            me.find('#ag-author').closest('a').attr('href', 'user/' + data.user.username);

            container.html('');

            $.each(data.images, function( index, image ) {
                container.append('<div><img src="' + image.path +'" alt="" class="ag-image" /></div>')
            });
        }

        function advance()
        {
            if( settings.start < settings.data.length ) {
                settings.start++;
                update(settings.data[settings.start]);
                me.fadeOut('fast', function() {
                    $(this).fadeIn('slow');
                });

            } else {
                me.html('<h3 class="text-center">Congratulations!<br/>You have completed the public voting.</h3>');
            }
        }
    };
}( jQuery ));