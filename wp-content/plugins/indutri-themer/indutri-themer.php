<?php 
/**
 * Plugin Name: Indutri Themer
 * Description: Open Setting, Post Type, Shortcode ... for theme 
 * Version: 1.2.8
 * Author: Gaviasthemes Team
 */

define( 'GAVIAS_INDUTRI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'GAVIAS_INDUTRI_PLUGIN_DIR', plugin_dir_path( __FILE__ )  );

class Gavias_Indutri_Themer{

	public function __construct(){
		$this->include_files();
		$this->include_post_types();
      add_action('wp_head', array($this, 'gaviasthemer_ajax_url'));
      add_action('wp_enqueue_scripts', array($this, 'register_scripts'));
      load_plugin_textdomain('indutri-themer', false, 'indutri-themer/languages/');
      $this->gavias_plugin_update();

	}
   
   public function gaviasthemer_ajax_url(){
     echo '<script> var ajaxurl = "' . admin_url('admin-ajax.php') . '";</script>';
   }
 
	public function include_files(){
      require_once('redux/admin-init.php');
      require_once('includes/functions.php');
		require_once('includes/hook.php');
      require_once('includes/comment.php');
      require_once('includes/meta-term.php');
      require_once('elementor/init.php');   
	}

	public function include_post_types(){
      require_once('posttypes/footer.php');
      require_once('posttypes/header.php');
		require_once('posttypes/gallery.php');
		require_once('posttypes/portfolio.php');
      require_once('posttypes/team.php');
      require_once('posttypes/service.php');
	}

   public function register_scripts(){
      $js_dir = plugin_dir_url( __FILE__ ).'assets/js';
      wp_register_script('gavias-themer', $js_dir.'/main.js', array('jquery'), null, true);
      wp_enqueue_script('gavias-themer');
      wp_enqueue_style('gaviasthemer-update', plugin_dir_url( __FILE__ ).'assets/css/update.css');
   }

   public function gavias_plugin_update() {
      require 'plugin-update/plugin-update-checker.php';
      Puc_v4_Factory::buildUpdateChecker(
         'http://gaviasthemes.com/plugins/dummy_data/indutri-themer-update-plugin.json',
         __FILE__,
         'indutri-themer'
      );
   }

}

new Gavias_Indutri_Themer();
