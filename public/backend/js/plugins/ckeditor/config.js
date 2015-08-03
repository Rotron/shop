CKEDITOR.editorConfig = function( config )
{
  CKEDITOR.plugins.addExternal( 'youtube', '/backend/js/plugins/ckeditor/plugins/', 'plugin.js' );
  config.extraPlugins = 'youtube';
}
