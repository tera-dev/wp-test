<?php
/**
 * Добавление нового виджета Foo_Widget.
 */
class ProjectsBlockDescription extends WP_Widget {

  function ProjectsBlockDescription() {
      $widget_ops = array('classname' => 'projects-block-descr');
      $this->WP_Widget('projects-block-descr-widget', 'Текст перед отображенеим Проектов', $widget_ops);
  }

  function widget($args, $instance) {
      ?>
     <div class="row animate-box">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
            <h2><?php echo $instance['header_name'] ?></h2>
            <p><?php echo $instance['descr_text'] ?></p>
        </div>
    </div>
      <?php
  }

  function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['descr_text'] = strip_tags( $new_instance['descr_text'] );   
      $instance['header_name'] = strip_tags( $new_instance['header_name'] );   
      return $instance;
  }

  function form($instance) {
?>
  <p>
      <strong><label for="<?= $this->get_field_id( 'header_name' ); ?>">Название заголовка</label></strong>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'header_name' ); ?>" value="<?= (!empty($instance['header_name'])) ? $instance['header_name'] : ''; ?>" style="margin-top:5px;margin-bottom:5px;" />
  </p>
  <hr>
  <p>
      <label for="<?= $this->get_field_id( 'descr_text' ); ?>">Текст описания</label>
      <textarea class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'descr_text' ); ?>" style="margin-top:5px;"> <?= (!empty($instance['descr_text'])) ? $instance['descr_text'] : ''; ?></textarea>
  </p>

<?php
  }
}



