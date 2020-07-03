// console.log('worked');
jQuery(window).on('load', function () {
  // console.log('worked');
    
      // var _custom_media = true,
      //     _orig_send_attachment = wp.media.editor.send.attachment;
      //     console.log(wp.media.editor.send.attachment)
      // $('body').on('change', select_selector, function () {
        
      //   var select_id = $(this).attr('id');
      //   wp.media.editor.send.attachment = function (props, attachment) {
      //     console.log(attachment);
      //     if (_custom_media) {
      //       // console.log('dfgfgsdjh');
      //       // $('.' + button_id + '_img').attr('src', attachment.url);
      //       $('.custom-hidden').val(attachment.url);
      //     } else {
      //       return _orig_send_attachment.apply($('#' + select_id), [props, attachment]);
      //     }
      //   }
      //   wp.media.editor.open($('#' + select_id));
      //   return false;
      // });
      // console.log(jQuery('.custom-hidden').val());
      if (jQuery('.custom-hidden').val() !== '') {
        console.log('yesssssssss');
        jQuery('select.js_custom_upload_media').val(jQuery('.custom-hidden').val());
      }
      jQuery('select.js_custom_upload_media').on('change',function() {
          console.log('worked');
          jQuery('.custom-hidden').val(jQuery(this).val());
        })
        
  });