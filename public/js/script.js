/**
 * Created by Jho on 8/26/2016.
 */

function imgInputPreview(obj, target) {
    if ((obj)[0].files.length > 0) {
        var oFReader = new FileReader();

        oFReader.onload = function (oFREvent) {
            console.log(target.attr('src', oFREvent.target.result));
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
            preview.find('.profile-entry-data').html(value);
            preview.show();
            input.hide();
        }
    });
});

$(function() {
    $('.upload-trigger').on('click', function(e) {
        e.preventDefault();
        var target = $($(this).attr('rel'));
        target.click();

        target.on('change', function(e) {
            target.closest('form').submit();
        });
    });
});