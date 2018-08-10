(function($) {
"use strict";

  /* WordPress Media Uploader
  -------------------------------------------------------*/
  function widgetMediaUpload(type) {

    if ( mediaUploader ) {
      mediaUploader.open();
    }

    var mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Select an Image',
      button: {
        text: 'Use This Image'
      },
      multiple: false
    });

    mediaUploader.on('select', function() {
      var attachment = mediaUploader.state().get('selection').first().toJSON();
      $('.deo-' + type + '-hidden-input').val(attachment.url).trigger('change');
      $('.deo-' + type + '-media').attr('src', attachment.url);
    });

    mediaUploader.open();

  }

  $('body').on('click', '.deo-image-upload-button', function() {
    widgetMediaUpload('image');
  });

  $('body').on('click', '.deo-signature-upload-button', function() {
    widgetMediaUpload('signature');
  });

  $('body').on('click', '.deo-image-delete-button', function() {
    $('.deo-image-hidden-input').val('').trigger('change');
    $('.deo-image-media').attr('src', '');
  });

  $('body').on('click', '.deo-signature-delete-button', function() {
    $('.deo-signature-hidden-input').val('').trigger('change');
    $('.deo-signature-media').attr('src', '');
  });

})(jQuery);