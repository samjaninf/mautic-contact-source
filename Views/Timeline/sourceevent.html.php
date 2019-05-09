<?php

/*
 * @copyright   2014 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

$message = $event['extra']['message'];
$logs    = $event['extra']['logs'];
?>

<style>

/* Custom theme to be more friendly to non-developers */
.cm-s-cc {
    background: #fff;
    color: #424242;
    line-height: 22px;
    font-family: 'Roboto Mono', Menlo, Monaco, Consolas, "Courier New", monospace !important;
    font-size: 13px;
    font-weight: normal;
    padding: 0px;
}

.cm-s-cc .CodeMirror-gutters {
    background: #fff;
    color: #616161;
    border: none;
}
/*.cm-s-cc .CodeMirror-cursors { visibility: visible !important; }*/
.cm-s-cc .CodeMirror-cursor { border-left: 1px solid #303030 !important; background: #303030; width: 2px; }
.cm-s-cc .CodeMirror-guttermarker,
.cm-s-cc .CodeMirror-guttermarker-subtle,
.cm-s-cc .CodeMirror-linenumber { color: rgb(83,127,126); }
.cm-s-cc .CodeMirror-activeline-background { background: #b0bec5; }
/*.cm-s-cc .CodeMirror-selected { background: #b0bec5; }*/
.cm-s-cc .cm-comment { color: #616161; }
.cm-s-cc .cm-string { color: #009688; }
.cm-s-cc .cm-string-2 { color: #80CBC4; }
.cm-s-cc .cm-number { color: #7e57c2; }
.cm-s-cc .cm-atom { color: #7e57c2; }
.cm-s-cc .cm-keyword { color: #ff5722; }
.cm-s-cc .cm-variable { color: #009688; }
.cm-s-cc .cm-def { color: #FD971F; }
.cm-s-cc .cm-property { color: #0288d1; }
.cm-s-cc .cm-tag { color: #1c75d1; }
.cm-s-cc .cm-error { color: #EC5F67; }
.cm-s-cc .cm-meta { color: #80CBC4; }
.cm-s-cc .cm-operator { color: rgb(60, 73, 128); }
.cm-s-cc .cm-variable-2 { color: #80CBC4; }
.cm-s-cc .cm-variable-3 { color: #82B1FF; }
.cm-s-cc .cm-builtin { color: #ad9e53; }
.cm-s-cc .cm-attribute { color: #caa155; }
.cm-s-cc .cm-qualifier { color: #a69850; }
.cm-s-cc .CodeMirror-matchingbracket { font-weight: bold; color: #3c4980 !important; }

/* Codemirror Mustache tags to style like our tag-editor tags (sorta) */
.cm-mustache,
.cm-mustache-danger,
.cm-mustache-warn {
    color: #424242;
    background-color: rgba(187, 210, 236, 0.8);
    border-radius: 3px;
    padding: 2px;
}

.cm-mustache-danger {
    /*background-color: #d9534f;*/
    background-color: rgba(255, 124, 114, 0.8);
}

.cm-mustache-warn {
    /*background-color: #e2a231;*/
    background-color: rgba(255, 195, 86, 0.8);
}
.cm-mustache.CodeMirror-matchingbracket,
.cm-mustache-danger.CodeMirror-matchingbracket,
.cm-mustache-warn.CodeMirror-matchingbracket {
    color: #424242 !important;
    font-weight: bold;
    border-radius: 3px;
    padding: 2px 0;
    /*margin: 0 -1px;*/
}

.cm-mustache.CodeMirror-selected,
.cm-mustache-danger.CodeMirror-selected,
.cm-mustache-warn.CodeMirror-selected {
    background: #fff;
}
</style>

<dl class="dl-horizontal small">
    <dt>Message:</dt>
    <dd><?=$message; ?></dd>
    <div class="small" style="max-width: 100%;">
        <strong><?php echo $view['translator']->trans('mautic.contactsource.timeline.logs.heading'); ?></strong>
        <br/>
        <textarea class="codeMirror-json"><?php echo $logs; ?></textarea>
    </div>
</dl>

<script defer> 
$buttons = mQuery('.contact-source-button').parent().parent();
$buttons.on('click', function(){ 
    console.log('lol');
    mQuery('textarea.codeMirror-json').each(function(i, element){ 
        if(mQuery(element).is(':visible')) {
        CodeMirror.fromTextArea(element, {
            mode: {
                name: 'javascript',
                json: true
            },
            theme: 'cc',
            gutters: [],
            lineNumbers: false,
            lineWrapping: true,
            readOnly: true
        });
        }
});

}); 
</script>
