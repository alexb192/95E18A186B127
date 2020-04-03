tinymce.init({
  selector: "mytextarea",
  setup: function(editor) {
    editor.on("change", function() {
      editor.save();
    });
  }
});

function getText() {
  var content = tinyMCE.getContent("mytextarea");
  return content;
}
