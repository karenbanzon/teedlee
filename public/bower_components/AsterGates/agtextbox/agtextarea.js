/*
 * Generic texboxt limiter with counter
 * Copyright 2016 Jhourlad Estrella
 * MIT license
 */

(function( $ ) {
    $.fn.agtextarea = function( options )
    {
        var me = $(this);

        var settings = $.extend({
            indicator : me.next('.help-block'),
            limit : 200
        }, options);

        return this.each(function()
        {
            me.on('input propertychange', function (e) {
                if( !update(settings.indicator) )
                {
                    e.preventDefault();
                    e.stopPropagation();
                }
            });

            prepare();
            update(settings.indicator);
        });

        function prepare()
        {
            me.attr('maxlength', settings.limit);
        }

        function update(obj)
        {
            prepare(me);

            var remaining = settings.limit - me.val().length;

            if( remaining > 0 )
            {
                obj.html(remaining + ' characters remaining.');
                return true;
            } else {
                return false;
            }
        }
    };
}( jQuery ));