<?php $indutri_options = indutri_get_options(); ?>

<div class="header-mobile header_mobile_screen">

  <div class="header-mobile-content">
    <div class="container">
      <div class="row"> 
       
        <div class="left col-md-3 col-sm-3 col-xs-3">
          <?php get_template_part('templates/parts/canvas-mobile'); ?>
        </div>

        <div class="center text-center col-md-6 col-sm-6 col-xs-6 mobile-logo">
          <div class="logo-menu">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <img src="<?php echo ((isset($indutri_options['hm_logo']['url']) && $indutri_options['hm_logo']['url']) ? $indutri_options['hm_logo']['url'] : get_template_directory_uri().'/images/logo-mobile.png'); ?>" alt="<?php bloginfo( 'name' ); ?>" />
            </a>
          </div>
        </div>

        <div class="right col-md-3 col-sm-3 col-xs-3">
          <div class="main-search gva-search">
            <a class="control-search">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M225.474,0C101.151,0,0,101.151,0,225.474c0,124.33,101.151,225.474,225.474,225.474    c124.33,0,225.474-101.144,225.474-225.474C450.948,101.151,349.804,0,225.474,0z M225.474,409.323    c-101.373,0-183.848-82.475-183.848-183.848S124.101,41.626,225.474,41.626s183.848,82.475,183.848,183.848    S326.847,409.323,225.474,409.323z"></path></g></g><g><g><path d="M505.902,476.472L386.574,357.144c-8.131-8.131-21.299-8.131-29.43,0c-8.131,8.124-8.131,21.306,0,29.43l119.328,119.328    c4.065,4.065,9.387,6.098,14.715,6.098c5.321,0,10.649-2.033,14.715-6.098C514.033,497.778,514.033,484.596,505.902,476.472z"></path></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            </a>
            <div class="gva-search-content search-content">
              <div class="search-content-inner">
                <div class="content-inner"><?php get_search_form(); ?></div>  
              </div>  
            </div>
          </div>
        </div> 

      </div>  
    </div>  
  </div>

</div>