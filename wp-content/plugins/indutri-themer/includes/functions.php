<?php
if(!function_exists('gaviasthemer_random_id')){
  function gaviasthemer_random_id($length=4){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';
    for ($i = 0; $i < $length; $i++) {
      $string .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $string;
  }
}  

function gaviasthemer_get_select_term( $taxonomy ) {
  global $wpdb;
  $cats = array();
  $query = "SELECT a.name,a.slug,a.term_id FROM $wpdb->terms a JOIN  $wpdb->term_taxonomy b ON (a.term_id= b.term_id ) where b.count>0 and b.taxonomy = '{$taxonomy}' and b.parent = 0";

  $categories = $wpdb->get_results($query);
  $cats['Choose Category'] = '';
  foreach ($categories as $category) {
     $cats[html_entity_decode($category->name, ENT_COMPAT, 'UTF-8')] = $category->slug;
  }
  return $cats;
}
  
function gaviasthemer_indutri_print_icon($file, $alt){
  $html = '';
  $ext = pathinfo($file, PATHINFO_EXTENSION);
  
  if($ext == 'svg'){
    $iconfile = new DOMDocument();
    $iconfile->load($file);
    $html = $iconfile->saveHTML($iconfile->getElementsByTagName('svg')[0]);
  }else{
    $html = '<img src="' . esc_url($file) . '" alt="' . esc_html($alt) . '" />';
  }

  if( empty( trim($html) ) ){
    $html = '<img src="' . esc_url($file) . '" alt="' . esc_html($alt) . '" />';
  }
  
  echo $html;
}
