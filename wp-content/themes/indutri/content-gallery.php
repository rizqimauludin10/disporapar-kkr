<?php
/**
 * The template for displaying posts in the Video post format
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2020 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */
?>
<?php 
	$thumbnail = 'post-thumbnail';
	if(isset($thumbnail_size) && $thumbnail_size){
		$thumbnail = $thumbnail_size;
	}
	if(is_single()){
		$thumbnail = 'full';
	}
	if(!isset($excerpt_words)){
    	$excerpt_words = indutri_get_option('blog_excerpt_limit', 20);
  	}
   $classes = 'post-content-inner';
   if(!is_single()){ $classes .= ' post-block post-block-1'; }
?>
<article id="post-<?php echo esc_attr(get_the_ID()); ?>" <?php post_class(); ?>>
	
	<div class="<?php echo esc_attr($classes) ?>">

		<div class="post-thumbnail">
			<?php
				$image_gallery_val = get_post_meta( get_the_ID(), 'indutri_thumbnail_gallery' , false );
				?>
				<?php if($image_gallery_val && is_array($image_gallery_val) && count($image_gallery_val>0)){ ?>
					<div class="blog-gallery">
						<div class="init-carousel-owl owl-carousel" data-items="1"  data-nav="true" >
							<?php
							foreach($image_gallery_val as $gimg_id): ?>
								<div class="item text-center">
									<a href="<?php echo esc_url(get_the_permalink()); ?>">
										<?php echo wp_get_attachment_image( $gimg_id, $thumbnail ); ?>
									</a>
								</div>
							<?php endforeach;
							?>
						</div>
					</div>
				<?php }else{
					the_post_thumbnail( $thumbnail, array( 'alt' => get_the_title() ) );
				} ?>
		</div>	

		<?php if ( is_single() ){ ?>
			<div class="entry-meta-inner">
	         <div class="entry-meta">
	            <?php indutri_posted_on(); ?>
	         </div>
	      </div>   
			<h1 class="entry-title"><?php echo the_title() ?></h1>
		<?php } ?>

		<div class="entry-content">
			<div class="content-inner">
				<?php if(!is_single()){ ?>
	            <div class="entry-meta">
	               <?php indutri_posted_on(); ?>
	           </div> 
		         <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
		      <?php } ?>	

				<?php if(is_single()){
					the_content( sprintf(
						esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'indutri' ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'indutri' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
				}else{
					echo indutri_limit_words( $excerpt_words, get_the_excerpt(), get_the_content() );
				}
				?>
				<?php the_tags( '<footer class="entry-footer"><span class="tag-links">', '', '</span></footer>' ); ?>
			</div>
			
		</div><!-- .entry-content -->	

	</div>		

</article><!-- #post-## -->
