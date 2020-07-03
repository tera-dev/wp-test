<?php
/**
 * Добавление нового виджета Foo_Widget.
 */
class ImageUrlWidget extends WP_Widget {

  function ImageUrlWidget() {
      $widget_ops = array('classname' => 'image-url');
      $this->WP_Widget('image-url-widget', 'Слайд страницы', $widget_ops);
  }

  function widget($args, $instance) {
      echo $before_widget;
      echo esc_url($instance['image_uri']);
      echo $after_widget;
  }

  function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
      return $instance;
  }

  function form($instance) {
?>

  <p>
      <label for="<?= $this->get_field_id( 'image_uri' ); ?>">Image</label>
      <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
      <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>" value="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin-top:5px;" />
      <input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
  </p>

<?php
  }
}


// queue up the necessary js
function hrw_enqueue()
{
  wp_enqueue_media();
  wp_enqueue_script('ads_script', get_template_directory_uri() . '/js/admin-scripts.js', false, '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'hrw_enqueue');

