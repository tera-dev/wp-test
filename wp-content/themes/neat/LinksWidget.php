<?php
/**
 * Добавление нового виджета Foo_Widget.
 */
class LinksWidget extends WP_Widget {

  function LinksWidget() {
      $widget_ops = array('classname' => 'links');
      $this->WP_Widget('links-widget', 'Тексты ссылок', $widget_ops);
  }

  function widget($args, $instance) {
      ?>
        <div class="col-md-3 text-center">
            <h4><?php echo $instance['column_name'] ?> </h4>
            <ul class="fh5co-footer-links">
                <li><a href="<?php echo home_url() ?>"><?php echo $instance['home_url_text']?></a></li>
                <li><a href="<?php echo get_post_type_archive_link('work-projects') ?>"><?php echo $instance['work_url_text']?></a></li>
                <li><a href="#" class="go-to-services"><?php echo  $instance['services_url_text']?></a></li>
                <li><a href="<?php echo get_category_link(get_cat_ID('blog')) ?>"><?php echo $instance['blog_url_text'] ?></a></li>
                <li><a href="<?php echo get_post(10)->guid ?>"><?php echo $instance['about_url_text'] ?></a></li>
            </ul>
        </div>
      <?php
  }

  function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['home_url_text'] = strip_tags( $new_instance['home_url_text'] );
      $instance['work_url_text'] = strip_tags( $new_instance['work_url_text'] );
      $instance['services_url_text'] = strip_tags( $new_instance['services_url_text'] );
      $instance['blog_url_text'] = strip_tags( $new_instance['blog_url_text'] );   
      $instance['about_url_text'] = strip_tags( $new_instance['about_url_text'] );
      $instance['column_name'] = strip_tags( $new_instance['column_name'] );
      return $instance;
  }

  function form($instance) {
?>
  <p>
      <strong><label for="<?= $this->get_field_id( 'column_name' ); ?>">Название колонки</label></strong>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'column_name' ); ?>" value="<?= (!empty($instance['column_name'])) ? $instance['column_name'] : ''; ?>" style="margin-top:5px;margin-bottom:5px;" />
  </p>
  <hr>
  <p>
      <label for="<?= $this->get_field_id( 'home_url_text' ); ?>">Текст для ссылки на Home</label>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'home_url_text' ); ?>" value="<?= (!empty($instance['home_url_text'])) ? $instance['home_url_text'] : ''; ?>" style="margin-top:5px;" />
  </p>
  <p>
      <label for="<?= $this->get_field_id( 'work_url_text' ); ?>">Текст для ссылки на Work</label>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'work_url_text' ); ?>" value="<?= (!empty($instance['work_url_text'])) ? $instance['work_url_text'] : ''; ?>" style="margin-top:5px;" />
  </p>
  <p>
      <label for="<?= $this->get_field_id( 'services_url_text' ); ?>">Текст для ссылки на Services</label>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'services_url_text' ); ?>" value="<?= (!empty($instance['services_url_text'])) ? $instance['services_url_text'] : ''; ?>" style="margin-top:5px;" />
  </p>
  <p>
      <label for="<?= $this->get_field_id( 'blog_url_text' ); ?>">Текст для ссылки на Blog</label>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'blog_url_text' ); ?>" value="<?= (!empty($instance['blog_url_text'])) ? $instance['blog_url_text'] : ''; ?>" style="margin-top:5px;" />
  </p>
  <p>
      <label for="<?= $this->get_field_id( 'about_url_text' ); ?>">Текст для ссылки на About us</label>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'about_url_text' ); ?>" value="<?= (!empty($instance['about_url_text'])) ? $instance['about_url_text'] : ''; ?>" style="margin-top:5px;" />
  </p>

<?php
  }
}



