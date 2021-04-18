<?php
   if (!defined('ABSPATH')) {
      exit; // Exit if accessed directly.
   }

   $this->add_render_attribute('wrapper', 'class', [ 'gva-information' ]);

   ?>

   <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
      <?php
      foreach ($settings['informations'] as $info): ?>
         <?php $has_icon = (!empty($info['icon'])); ?>
         <div class="information-item">
            <?php if($has_icon){ ?>
               <div class="info-icon"><i class="elementor-icon <?php echo esc_attr($info['icon']); ?>"></i></div>
            <?php } ?>   
            <div class="info-content">
               <div class="title"><?php echo $info['title']; ?></div>
               <div class="content"><?php echo $info['content']; ?></div>
            </div>
         </div>
      <?php endforeach; ?>
   </div>
