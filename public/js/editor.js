
$(document).ready(function () {
    $('.renderBtn').on('click', function () {
        const MathPreview = $(this).parent().find('.MathPreview');
        const id = $(MathPreview).attr('id');
        $(this).parent().find('.MathPreview').toggle();
        const editorContainer = $(this).parent().find('.editor-container');
        const showExitText = $(MathPreview).css('display') == 'none' || $(MathPreview).css("visibility") == "hidden";
        if (!showExitText) {
            $(this).attr('value', 'Exit')
        } else {
            $(this).attr('value', 'Preview')
        }


        $(editorContainer).toggle();
        const textareaId = $(this).parent().find('textarea').attr('id')

        const content = tinyMCE.get(`${textareaId}`).getContent();
        if (!window.typesetInput) {
            alert('Somethin went wrong, try again')
        }
        window.typesetInput(id, content);
    })

    var preProssesInnerHtml;
    tinymce.init({
        selector: '#question-content',
        menubar: false,
        toolbar:
            "undo redo | formatselect | bold italic | \
          alignleft aligncenter alignright | \
          tiny_mce_wiris_formulaEditor | tiny_mce_wiris_formulaEditorChemistry | \
          bullist numlist outdent indent | help | fullscreen | table",
        plugins: [
            "advlist autolink lists link image",
            "charmap print anchor help",
            "searchreplace visualblocks code paste",
            "insertdatetime media table wordcount",
            "imagetools advlist autolink spellchecker",
            "fullscreen",
        ], external_plugins: {
            'tiny_mce_wiris': 'https://cdn.jsdelivr.net/npm/@wiris/mathtype-tinymce5@7.24.1/plugin.min.js'
        },
        paste_as_text: false,
        setup: function (editor) {
            editor.ui.registry.addButton('tiny_mce_wiris_formulaEditor', {
                icon: 'bold',    // the 'bold' icon  created from 'bold.svg'
                onAction: function (_) {
                    editor.insertContent('&nbsp;<strong>It\'s my icon button!</strong>&nbsp;');
                }
            });
        },

        //To preview the correct content
        init_instance_callback: function (editor) {
            editor.on('BeforeExecCommand', function (e) {
                if (e.command == "mcePreview") {
                    //store content prior to changing.
                    preProssesInnerHtml = editor.getContent();
                    console.log(preProssesInnerHtml);
                    // convert(preProssesInnerHtml)

                    editor.setContent("changed content");
                }
            });
            editor.on("ExecCommand", function (e) {
                if (e.command == "mcePreview") {
                    //Restore initial content.
                    editor.setContent(preProssesInnerHtml);
                }
            });
        }
    });


    tinymce.init({
        selector: '.option-editor',
        menubar: false,
        toolbar:
            "undo redo | formatselect | bold italic | \
          alignleft aligncenter alignright | \
          tiny_mce_wiris_formulaEditor | tiny_mce_wiris_formulaEditorChemistry | \
          bullist numlist outdent indent | fullscreen | table",
        plugins: [
            "advlist autolink lists link image",
            "charmap print anchor help",
            "searchreplace visualblocks code paste",
            "insertdatetime media table wordcount",
            "imagetools advlist autolink spellchecker",
            "fullscreen",
        ], external_plugins: {
            'tiny_mce_wiris': 'https://cdn.jsdelivr.net/npm/@wiris/mathtype-tinymce5@7.24.1/plugin.min.js'
        },
        paste_as_text: false,
        setup: function (editor) {
            editor.ui.registry.addButton('tiny_mce_wiris_formulaEditor', {
                icon: 'bold',    // the 'bold' icon  created from 'bold.svg'
                onAction: function (_) {
                    editor.insertContent('&nbsp;<strong>It\'s my icon button!</strong>&nbsp;');
                }
            });
        },

    });

});