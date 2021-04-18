<?php
 function indutri_themer_build_meta_box() {
   echo'<div class="gva-meta-tabs"><div id="gva-meta-tabs-boxes"></div></div>';
}
   
function indutri_themer_register_meta_box_holder() {
   add_meta_box( 'gaviasthemer_meta_box', esc_html__( 'Meta Options', 'indutri-themer' ), 'indutri_themer_build_meta_box', '', 'normal', 'low' );
}

add_action( 'add_meta_boxes', 'indutri_themer_register_meta_box_holder' );

function indutri_themer_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'indutri_themer_mime_types');

function krowd_theme_archive_title( $title ) {
   if ( is_category() ) {
      $title = single_cat_title( '', false );
   } elseif ( is_tag() ) {
      $title = single_tag_title( '', false );
   } elseif ( is_author() ) {
      $title = '<span class="vcard">' . get_the_author() . '</span>';
   } elseif ( is_post_type_archive() ) {
      $title = post_type_archive_title( '', false );
   } elseif ( is_tax() ) {
      $title = single_term_title( '', false );
   }
   return $title;
}

add_filter( 'get_the_archive_title', 'krowd_theme_archive_title' );