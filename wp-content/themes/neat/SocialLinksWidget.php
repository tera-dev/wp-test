<?php
/**
 * Добавление нового виджета Foo_Widget.
 */
class SocialLinksWidget extends WP_Widget {

  function SocialLinksWidget() {
      $widget_ops = array('classname' => 'social-links');
      $this->WP_Widget('social-links-widget', 'Ссылки на соц.сети', $widget_ops);
  }

  function widget($args, $instance) {
    ?>
      <p>
        <ul class="fh5co-social-icons">
          <li><a href="<?php echo $instance['twitter']?>"><i class="icon-twitter"></i></a></li>
          <li><a href="<?php echo $instance['facebook']?>"><i class="icon-facebook"></i></a></li>
          <li><a href="<?php echo $instance['linkedin']?>"><i class="icon-linkedin"></i></a></li>
          <li><a href="<?php echo $instance['dribbble']?>"><i class="icon-dribbble"></i></a></li>
        </ul>
      </p>
    <?php
  }

  function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['twitter'] = strip_tags( $new_instance['twitter'] );
      $instance['facebook'] = strip_tags( $new_instance['facebook'] );
      $instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
      $instance['dribbble'] = strip_tags( $new_instance['dribbble'] );
      
      return $instance;
  }

  function form($instance) {
?>
  <p>
      <label for="<?= $this->get_field_id( 'twitter' ); ?>">Ссылка на Twitter</label>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'twitter' ); ?>" value="<?= (!empty($instance['twitter'])) ? $instance['twitter'] : ''; ?>" style="margin-top:5px;margin-bottom:5px;" />
  </p>
  <p>
      <label for="<?= $this->get_field_id( 'facebook' ); ?>">Ссылка на Facebook</label>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'facebook' ); ?>" value="<?= (!empty($instance['facebook'])) ? $instance['facebook'] : ''; ?>" style="margin-top:5px;" />
  </p>
  <p>
      <label for="<?= $this->get_field_id( 'linkedin' ); ?>">Ссылка на LinkedIn</label>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'linkedin' ); ?>" value="<?= (!empty($instance['linkedin'])) ? $instance['linkedin'] : ''; ?>" style="margin-top:5px;" />
  </p>
  <p>
      <label for="<?= $this->get_field_id( 'dribbble' ); ?>">Ссылка на Dribbble</label>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'dribbble' ); ?>" value="<?= (!empty($instance['dribbble'])) ? $instance['dribbble'] : ''; ?>" style="margin-top:5px;" />
  </p>

<?php
  }
}


