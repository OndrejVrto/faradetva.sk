var editor_config = {
  path_absolute: "/",
  selector: 'textarea#editorContent',
  language: 'sk',
  language_url: 'https://cdn.jsdelivr.net/npm/tinymce-langs@1.0.0/langs/sk.js',
  relative_urls: false,
  // basic
  // plugins: 'code table lists',
  // full with premium
  // plugins: 'advlist anchor autolink autoresize autosave bbcode charmap code codesample colorpicker contextmenu directionality emoticons fullpage fullscreen help hr image imagetools importcss insertdatetime legacyoutput link lists media nonbreaking noneditable pagebreak paste preview print quickbars save searchreplace spellchecker tabfocus table template textcolor textpattern toc visualblocks visualchars wordcount',
  //full without premium
  // plugins: 'advlist anchor autolink autoresize autosave charmap code codesample directionality emoticons fullscreen help hr image importcss insertdatetime link lists media nonbreaking noneditable pagebreak paste preview print quickbars save searchreplace tabfocus table template textpattern visualblocks visualchars wordcount',
  // optimal
  plugins: 'anchor autolink autosave code codesample directionality emoticons fullscreen help hr charmap image insertdatetime link lists media nonbreaking noneditable pagebreak preview print save searchreplace table template textpattern visualblocks visualchars wordcount',
  toolbar: "undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | bullist numlist | link image media",
  toolbar_mode: 'floating',
  height: 500,
  image_caption: true,
  file_picker_callback: function file_picker_callback(callback, value, meta) {
    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
    var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
    var cmsURL = editor_config.path_absolute + 'admin/laravel-file-manager?editor=' + meta.fieldname;

    if (meta.filetype == 'image') {
      cmsURL = cmsURL + "&type=Images";
    } else {
      cmsURL = cmsURL + "&type=Files";
    }

    tinyMCE.activeEditor.windowManager.openUrl({
      url: cmsURL,
      title: 'Filemanager',
      width: x * 0.8,
      height: y * 0.8,
      resizable: "yes",
      close_previous: "no",
      onMessage: function onMessage(api, message) {
        callback(message.content);
      }
    });
  }
};
tinymce.init(editor_config);
