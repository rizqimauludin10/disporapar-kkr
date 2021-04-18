<?php
   use Elementor\Icons_Manager;

   $this->add_render_attribute('wrapper', 'class', ['gva-text-arrow' , $settings['style'] ]);
   $i = 0;
?>

<div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
   <div class="content-inner">
      <h3 class="title">
         <?php $this->gva_render_link_begin($settings['link']); ?>
            <?php Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true', 'class' => array('icon') ] ); ?>
            <span><?php echo $settings['title'] ?></span>
          <?php $this->gva_render_link_end($settings['link']); ?>
      </h3>
      <?php if($settings['content']){ ?>
         <div class="descrption"><?php echo $settings['content'] ?></div>
      <?php } ?>
   </div>   
</div>
