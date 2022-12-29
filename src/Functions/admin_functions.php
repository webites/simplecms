<?php
session_start();

function display_notification()
{
    if ($_SESSION['alert']) {
        echo "<div class='dashboard__notification dashboard__notification--" . $_SESSION['type'] . "'>" . $_SESSION['alert'] . "
        <button id='dashboard__notification__close' class='dashboard__notification__close'><i class='bi bi-x-circle'></i></button>
        </div>";
        unset($_SESSION['alert']);
        unset($_SESSION['type']);
    }
}

function slug_creator($slug)
{
    return strtolower(str_replace(' ', '-', $slug));
}


function wyswig_loader()
{
    echo
    "<link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/plugins/image.min.css'>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
    <script>
        var editor = new FroalaEditor('#content', {
            fileUploadURL: '/images',
            fileUseSelectedText: true,
            imageManagerLoadURL: '/images',
            imageUploadRemoteUrls: false,
            toolbarButtons: {
                'moreText': {
                    'buttons': ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', 'textColor', 'backgroundColor', 'inlineClass', 'inlineStyle', 'clearFormatting']
                },
                'moreParagraph': {
                    'buttons': ['alignLeft', 'alignCenter', 'formatOLSimple', 'alignRight', 'alignJustify', 'formatOL', 'formatUL', 'paragraphFormat', 'paragraphStyle', 'lineHeight', 'outdent', 'indent', 'quote']
                },
                'moreRich': {
                    'buttons': ['insertLink', 'insertImage', 'insertVideo', 'insertTable', 'emoticons', 'fontAwesome', 'specialCharacters', 'embedly', 'insertHR']
                },
                'moreMisc': {
                    'buttons': ['undo', 'redo', 'fullscreen', 'print', 'getPDF', 'spellChecker', 'selectAll', 'html', 'help']
                }
            },
            imageInsertButtons: ['imageBack', '|', 'imageByURL'],
            videoInsertButtons: ['videoBack', '|', 'videoByURL', 'videoEmbed'],
            fontFamilySelection: true,
            fontSizeSelection: true,
            paragraphFormatSelection: true
        });
    </script>";
}
