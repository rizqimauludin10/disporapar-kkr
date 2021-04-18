<?php
   if (!defined('ABSPATH')) {
      exit; // Exit if accessed directly.
   }
   $button_style = $settings['button_style'] ? $settings['button_style'] : 'btn-line-white';
   $button_size = $settings['button_size'] ? $settings['button_size'] : '';
   $btn_classes = "btn-cta {$button_style} {$button_size}";
   $this->add_render_attribute('wrapper', 'class', ['gva-list-number' , $settings['style'] ]);
   $i = 0;
?>

<?php if( $settings['style'] == 'style-1' ){ ?>
   <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
      <ul class="list-number">
         <?php foreach ($settings['list_items'] as $item): $i++; ?>
            <li class="list-number-item">
               <div class="content-inner">
                  <div class="content-top">
                     <div class="number">
                        <span>
                        <?php printf("%02d", $i); ?>
                         <i class="arrow fas fa-chevron-right"></i>
                        </span>
                     </div>
                     <h3 class="title"><?php echo $item['title'] ?></h3>
                  </div>
                  <?php if($item['content']){ ?>
                     <div class="descrption"><?php echo $item['content'] ?></div>
                  <?php } ?>
               </div>   
            </li>
         <?php endforeach; ?>
      </ul>  
      <?php if($settings['button_url']['url']){ ?>
         <div class="list-number-action">
            <?php $this->gva_render_button($btn_classes); ?>
         </div>
      <?php } ?> 
   </div>
<?php } ?>     

<?php if( $settings['style'] == 'style-2' ){ ?>
   <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
      <ul class="list-number">
         <?php foreach ($settings['list_items'] as $item): $i++; ?>
            <li class="list-number-item">
               <div class="content-inner">
                  <h3 class="title">
                     <span>
                        <?php printf("%02d", $i); ?>
                     </span>
                     <?php echo $item['title'] ?>
                  </h3>
               </div>   
            </li>
         <?php endforeach; ?>
      </ul>  
      <?php if($settings['button_url']['url']){ ?>
         <div class="list-number-action">
            <?php $this->gva_render_button($btn_classes); ?>
         </div>
      <?php } ?> 
   </div>
<?php } ?>     
