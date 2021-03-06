/*
 * Rating module for Teedlee.PH
 * Copyright 2016 Jhourlad Estrella
 * Public license not available.
 */

(function( $ ) {
    $.fn.agrating = function( options )
    {
        var me = $(this);
        var container = me.find('#ag-images');
        var stars = me.find('.star');
        var rating = me.find('input[name="rating"]');
        var type = me.find('input[name="type"]');
        var flags = me.find('input[name="flags[]"]');
        var comment = me.find('textarea[name="comment"]');
        var vote = me.find('#ag-vote');
        var skip = me.find('#ag-skip');
        var share = me.find('.fb-share');
        var token = me.find('input[name="_token"]').val();
        var isEntry = me.has('[name="entry_id"]') && me.find('[name="contest_id"]').val();
        var contest_id = me.find('[name="contest_id"]').val();

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

                var _flags = [];
                me.find("input[name='flags[]']:checked").each(function(){
                    _flags.push($(this).val());
                });

                var params = {
                    'type' : type.val(),
                    'rating' : rating.val(),
                    'flags' : _flags,
                    'comment' : me.find('[name="comment"]').val(),
                    '_token' : token,

                };

                if( isEntry )
                {
                    params.entry_id = me.find('[name="entry_id"]').val();
                } else {
                    params.submission_id = me.find('[name="submission_id"]').val();
                }

                $.post('/vote', params).done(function( data ) {
                    next();

                }).fail(function( data ){
                    alert(data.responseText);
                });
            });

            skip.on('click', function(e) {
                e.preventDefault();
                next();
            });

            container.slick({
                "slideToShow": 1,
            });

            // me.swipe({
            //     swipe : function(event, direction, distance, duration, fingerCount, fingerData)
            //     {
            //         if( direction == 'up' ) {
            //             next();
            //         }
            //     }
            // });

            settings.start--;
            next();
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

            if( isEntry ) {
                me.find('[name="entry_id"]').val(data.id);
            } else {
                me.find('[name="submission_id"]').val(data.id);
            }

            me.find('#ag-title').html(data.title);
            me.find('#ag-author').html(data.user.username);
            me.find('#ag-author').closest('a').attr('href', 'user/' + data.user.username);
            me.find('#ag-author').closest('a').attr('href', 'user/' + data.user.username);

            if( isEntry ) {
                share.attr('href', '/vote/' + me.find('[name="entry_id"]').val() + '/fb');
            } else {
                share.attr('href', '/vote/' + me.find('[name="submission_id"]').val() + '/fb');
            }

            container.html('');

            $.each(data.images, function( index, image ) {
                container.append('<div><img src="' + image.path +'" alt="" class="ag-image" /></div>')
            });
        }

        function next()
        {
            if( settings.data.length > 0 && settings.start+1 < settings.data.length ) {
                comment.val('');
                rating.val('');
                flags.each(function(){ $(this).prop('checked', false); });
                settings.start++;

                update(settings.data[settings.start]);
                me.fadeOut('fast', function() {
                    $(this).fadeIn('slow');
                });

            } else {
                var param = isEntry ? '?contest=' + contest_id : '';
                window.location.href = '/vote/done' + param;
                exit;
            }
        }
    };
}( jQuery ));