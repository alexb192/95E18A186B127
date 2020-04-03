tinymce.init({
  selector: "#mytextarea"
});

function getText() {
  var content = tinyMCE.getContent("mytextarea");
  return content;
}
