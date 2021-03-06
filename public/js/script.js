/**
 * Created by Jho on 8/26/2016.
 */

function imgInputPreview(obj, target) {
    if ((obj)[0].files.length > 0) {
        var oFReader = new FileReader();

        oFReader.onload = function (oFREvent) {
            target.css('background-image', 'url('+oFREvent.target.result+')');
        };

        oFReader.readAsDataURL((obj)[0].files[0]);
    }
};

//Form field editor
fieldEditorReset = function() {
    $('.field-editor .field-editor-input').hide();
    $('.field-editor .field-editor-preview').show();
};

$(function () {
    fieldEditorReset();

    $('.field-editor .action').click(function (e) {
        e.preventDefault();

        var parent = $(this).closest('.field-editor');
        var preview = parent.find('.field-editor-preview');
        var input = parent.find('.field-editor-input');
        var name = parent.attr('rel');

        fieldEditorReset();

        if ($(this).parent().hasClass('field-editor-preview')) {
            preview.hide();
            input.show();
        } else {
            var value = input.find('[name="' + name + '"]').val();
            var placeholder = preview.find('.profile-entry-data');

            if( placeholder.hasClass('mask') ) {
                var value = Array(value.length+1).join('*');
            }

            placeholder.html(value);
            preview.show();
            input.hide();
        }
    });
});

$(function() {
    $('.upload-trigger').unbind('click').on('click', function(e) {
        e.stopImmediatePropagation();
        e.preventDefault();
        var target = $($(this).attr('rel'));
        target.click();

        target.on('change', function(e) {
            target.closest('form').submit();
        });
    });
});

$(function () {
    $.ajaxSetup({ cache: true });

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '260663264328654',
            xfbml      : true,
            version    : 'v2.8'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    $('.fb-share').on('click', function(e){
        var me = $(this);
        e.preventDefault();
        FB.ui({
            method: 'share',
            href: me.attr('href'),
        });
    });
});