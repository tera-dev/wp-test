<?php
/**
 * Добавление нового виджета Foo_Widget.
 */
class ContactInformationWidget extends WP_Widget {

  function ContactInformationWidget() {
      $widget_ops = array('classname' => 'contact-information');
      $this->WP_Widget('contact-information-widget', 'Контактная информация', $widget_ops);
  }

  function widget($args, $instance) {
    $isWidgetForFooter = $args['class'] === 'contact-page_' ? true : false;
    $temp = $instance['adress'];
    $temp = str_replace(',',',<br>',$temp);
    ?>
      <div class="col-md-3 <?php echo $isWidgetForFooter ? 'col-md-push-1 animate-box' : ''?>">
        <?php if($isWidgetForFooter):?>
          <h3><?php echo $instance['column_name'] ?></h3>
        <?php else: ?>
          <h4><?php echo $instance['column_name'] ?></h4>
        <?php endif;?>
            <ul class="<?php echo $isWidgetForFooter ? 'contact-info' : 'fh5co-footer-links';?> ">
              <li><i class="icon-location4"></i><?php echo $temp ?></li>
              <li><i class="icon-phone3"></i><a href="tel:<?php 
                echo preg_replace('/[|\s|)|(|-]+?/', '',$instance['phone_number']) 
              ?>"><?php echo $instance['phone_number']  ?></a></li>
              <li><i class="icon-location3"></i><a href="mailto:<?php echo $instance['email'] ?>"><?php echo $instance['email'] ?></a></li>
              <li><i class="icon-globe2"></i><a href="<?php echo $instance['site_url'] ?>"><?php echo $instance['site_url'] ?></a></li>
          </ul>
      </div>
    <?php
  }

  function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['adress'] = strip_tags( $new_instance['adress'] );
      $instance['phone_number'] = strip_tags( $new_instance['phone_number'] );
      $instance['email'] = strip_tags( $new_instance['email'] );
      $instance['site_url'] = strip_tags( $new_instance['site_url'] );
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
      <label for="<?= $this->get_field_id( 'adress' ); ?>">Адрес</label>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'adress' ); ?>" value="<?= (!empty($instance['adress'])) ? $instance['adress'] : ''; ?>" style="margin-top:5px;" />
  </p>
  <p>
      <label for="<?= $this->get_field_id( 'phone_number' ); ?>">Телефон</label>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'phone_number' ); ?>" value="<?= (!empty($instance['phone_number'])) ? $instance['phone_number'] : ''; ?>" style="margin-top:5px;" />
  </p>
  <p>
      <label for="<?= $this->get_field_id( 'email' ); ?>">Email-адрес</label>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'email' ); ?>" value="<?= (!empty($instance['email'])) ? $instance['email'] : ''; ?>" style="margin-top:5px;" />
  </p>
  <p>
      <label for="<?= $this->get_field_id( 'site_url' ); ?>">Адрес сайта</label>
      <input type="text" class="widefat <?= $this->id ?>" name="<?= $this->get_field_name( 'site_url' ); ?>" value="<?= (!empty($instance['site_url'])) ? $instance['site_url'] : ''; ?>" style="margin-top:5px;" />
  </p>

<?php
  }
}


