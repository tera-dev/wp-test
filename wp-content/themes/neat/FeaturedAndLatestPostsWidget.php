<?php
/**
 * Добавление нового виджета Foo_Widget.
 */
class FeaturedAndLatestPostsWidget extends WP_Widget {

  function FeaturedAndLatestPostsWidget() {
      $widget_ops = array('classname' => 'featured-recent-posts');
      $this->WP_Widget('featured-recent-posts-widget', 'Лучший пост и свежие посты', $widget_ops);
  }

  function widget($args, $instance) {
    
    ?>

    <div id="fh5co-blog" class="blog-flex">
      
      <?php $featured_post = get_post($instance['featured_post_id']);?>
      
      <div class="featured-blog" style="background-image: url(<?php echo get_the_post_thumbnail_url($featured_post->ID) ?>);">
        <div class="desc-t">
          <div class="desc-tc">
            <span class="featured-head">Featured Posts</span>
            <h3><a href="<?php echo get_post_permalink($featured_post->ID) ?>"><?php echo $featured_post->post_title ?></a></h3>
            <span><a href="<?php echo get_post_permalink($featured_post->ID) ?>" class="read-button">Learn More</a></span>
          </div>
        </div>
      </div>
      
      <div class="blog-entry fh5co-light-grey">
        <div class="row animate-box">
          <div class="col-md-12">
            <h2>Latest Posts</h2>
          </div>
        </div>
        <div class="row latest-posts-flexible">

          <?php global $post; 
            $tmp_post = $post;
            $posts = get_posts( array(
              'numberposts' => $instance['latest_posts_amount'],
              'category'    => 3,
              'orderby'     => 'date',
              'order'       => 'DESC',
              'post_type'   => 'post',
              ) );
          ?>
          <?php foreach( $posts as $post ): setup_postdata($post);?>
            <div class="col-md-12 animate-box latest-post">
              <a href="<?php the_permalink() ?>" class="blog-post">
                <span class="img" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);"></span>
                <div class="desc">
                  <h3><?php the_title() ?></h3>
                  <span class="cat">
                    <?php $categories = get_the_category(get_the_ID());
                      foreach($categories  as $category ){
                        echo $category->name;
                      }
                    ?>
                  </span>
                </div>
              </a>
            </div>
          <?php endforeach;$post = $tmp_post;wp_reset_postdata();?>

        </div>
      </div>
    </div>


    <?php
  }

  function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['latest_posts_amount'] = strip_tags( $new_instance['latest_posts_amount'] );
      $instance['featured_post_id'] = strip_tags( $new_instance['featured_post_id'] );      
      return $instance;
  }

  function form($instance) {

    global $post;
    $tmp_post = $post;

    $posts = get_posts( array(
      'numberposts' => 15,
      'category'    => 3,
      'orderby'     => 'date',
      'order'       => 'DESC',
      'post_type'   => 'post',
    ) );
    ?>
    <p>
      <label for="<?= $this->get_field_id( 'featured_post_id' ); ?>">Выберите лучший пост</label>
      <select class="widefat js_custom_upload_media" style="margin-top:5px;margin-bottom:5px;" id="<?= $this->id ?>">
        <?php foreach( $posts as $post ): setup_postdata($post)?>
          <option value="<?php the_ID() ?>" <?php echo $instance['featured_post_id'] == get_the_ID() ? 'selected' : '' ?> ><?php echo get_the_title() . " (" . get_the_modified_date() . " | " . get_the_modified_time() . ")"?></option>
        <?php endforeach; $post = $tmp_post; wp_reset_postdata()?>
      </select>
      <input type="hidden" class="custom-hidden" name="<?= $this->get_field_name( 'featured_post_id' ); ?>" value="<?= (!empty($instance['featured_post_id'])) ? $instance['featured_post_id'] : ''; ?>">
    </p>
    <hr>
    <p>
        <label for="<?= $this->get_field_id( 'latest_posts_amount' ); ?>">Выберите количество свежих постов</label>
        <input type="number" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'latest_posts_amount' ); ?>" value="<?= (!empty($instance['latest_posts_amount'])) ? $instance['latest_posts_amount'] : ''; ?>" style="margin-top:5px;margin-bottom:5px;" />
    </p>
  

<?php
  }
}

add_action('admin_enqueue_scripts', 'ctup_wdscript');
function ctup_wdscript() {
  
    // die();
    wp_enqueue_script('eeads_script', get_template_directory_uri() . '/js/admin-scripts/admin-scripts.js',['jquery'], null, true);
}


