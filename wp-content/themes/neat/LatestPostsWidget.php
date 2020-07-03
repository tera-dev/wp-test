<?php
/**
 * Добавление нового виджета Foo_Widget.
 */
class LatestPostsWidget extends WP_Widget {

  function LatestPostsWidget() {
      $widget_ops = array('classname' => 'latest-posts');
      $this->WP_Widget('latest-posts-widget', 'Новые посты', $widget_ops);
  }

  function widget($args, $instance) {
      ?>
     <div class="col-md-3">
        <h4><?php echo $instance['column_name'] ?></h4>
        <ul class="fh5co-footer-links">
            <?php 
            global $post;
            $tmp_post = $post;
            $posts = get_posts( array(
                'numberposts' =>  $instance['posts_amount'],
                'category'    => 3,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'post_type'   => 'post',) );?>
            <?php foreach( $posts as $post ): setup_postdata($post);?>
                <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
            <?php endforeach;$post = $tmp_post;?>
            
            <?php wp_reset_postdata();?>
        </ul>
    </div>
      <?php
  }

  function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['posts_amount'] = strip_tags( $new_instance['posts_amount'] );   
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
      <label for="<?= $this->get_field_id( 'posts_amount' ); ?>">Количество постов</label>
      <input type="number" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'posts_amount' ); ?>" value="<?= (!empty($instance['posts_amount'])) ? $instance['posts_amount'] : ''; ?>" style="margin-top:5px;" />
  </p>

<?php
  }
}



