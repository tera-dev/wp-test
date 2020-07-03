<?php
/**
 * Добавление нового виджета Foo_Widget.
 */
class StatisticsDataHeadTextWidget extends WP_Widget {

  function StatisticsDataHeadTextWidget() {
      $widget_ops = array('classname' => 'stat-data-head-text');
      $this->WP_Widget('stat-data-head-text-widget', 'Текст перед отображенеим Статистики', $widget_ops);
  }

  function widget($args, $instance) {
    ?>
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center animate-box">
        <p><?php echo $instance['text']?></p>
      </div>
    </div>
    <?php  
  }

  function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['text'] = strip_tags( $new_instance['text'] );
      return $instance;
  }

  function form($instance) {
  ?>
    <p>
        <strong><label for="<?= $this->get_field_id( 'text' ); ?>">Название пункта</label></strong>
        <textarea type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'text' ); ?>" style="margin-top:5px;margin-bottom:5px;"><?= (!empty($instance['text'])) ? $instance['text'] : ''; ?></textarea>
    </p>
  <?php
  }
}
