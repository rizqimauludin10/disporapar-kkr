<?php 
   $images = get_post_meta( get_the_ID(), 'indutri_gallery_images' , false );
   $extra_link = get_post_meta(get_the_ID(), 'indutri_service_extra_link', true);
   $icons = function_exists('rwmb_meta') ? rwmb_meta( 'indutri_service_icon', array( 'limit' => 1 ) ) : false;
   $icon = reset( $icons );
   $service_link = get_the_permalink();
   if(!empty($extra_link)){
      $service_link = $extra_link;
   }
   if(!isset($excerpt_words)){
      $excerpt_words = 20;
   }
   $thumbnail = 'post-thumbnail';
   if(isset($thumbnail_size) && $thumbnail_size){
      $thumbnail = $thumbnail_size;
   }
?>
<div class="item">
   <div class="service-item-v2">     
      
      <div class="service-image">
         <?php the_post_thumbnail($thumbnail); ?>
         <?php if($icon && isset($icon['url'])){ ?>
            <div class="service-icon">
               <?php gaviasthemer_indutri_print_icon($icon['url'], get_the_title()); ?>
            </div> 
         <?php } ?>
      </div>   

      <div class="service-content">
         <div class="content-inner">
            <h3 class="title">
               <a href="<?php echo esc_url($service_link) ?>"><?php the_title(); ?></a>
            </h3>
            <div class="desc"><?php echo indutri_limit_words($excerpt_words, get_the_excerpt(), get_the_content()); ?></div> 
            <div class="readmore">
               <a class="btn-inline" href="<?php echo esc_url($service_link) ?>"><span><?php echo esc_html__('Read More', 'indutri'); ?></span></a>
            </div>
         </div>    
      </div>
   </div>
</div>