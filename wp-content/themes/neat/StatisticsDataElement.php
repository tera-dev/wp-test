<?php
/**
 * Добавление нового виджета Foo_Widget.
 */
class StatisticsDataElement extends WP_Widget {

  function StatisticsDataElement() {
      $widget_ops = array('classname' => 'stat-data-element');
      $this->WP_Widget('stat-data-element-widget', 'Пункт статистики', $widget_ops);
  }

  function widget($args, $instance) {
    ?>
    <div class="col-md-3 text-center">
      <span class="fh5co-counter js-counter" data-from="0" data-to="<?php echo $instance['item_amount'] ?>" data-speed="5000" data-refresh-interval="50"></span>
      <span class="fh5co-counter-label"><?php echo $instance['item_name'] ?></span>
    </div>
    <?php  
  }

  function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['item_name'] = strip_tags( $new_instance['item_name'] );
      $instance['item_amount'] = strip_tags( $new_instance['item_amount'] );
      return $instance;
  }

  function form($instance) {
?>
  <p>
      <strong><label for="<?= $this->get_field_id( 'item_name' ); ?>">Название пункта</label></strong>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'item_name' ); ?>" value="<?= (!empty($instance['item_name'])) ? $instance['item_name'] : ''; ?>" style="margin-top:5px;margin-bottom:5px;" />
  </p>
  <hr>
  <p>
      <label for="<?= $this->get_field_id( 'item_amount' ); ?>">Значение</label>
      <input type="number" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'item_amount' ); ?>" value="<?= (!empty($instance['item_amount'])) ? $instance['item_amount'] : ''; ?>" style="margin-top:5px;" />
  </p>

<?php
  }
}
