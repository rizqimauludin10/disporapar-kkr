<?php
  function indutri_get_all_menus(){
     $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 
     $results = array();
     foreach ($menus as $key => $menu) {
      $results[$menu->slug] = $menu->name;
     }
     return $results;
  }

  Redux::setSection( $opt_name, array(
    'title' => esc_html__('Header Options', 'indutri'),
    'desc' => '',
    'icon' => 'el-icon-compass',
    'fields' => array(
      array(
        'id' => 'header_layout',
        'type' => 'select',
        'title' => esc_html__('Header Layout', 'indutri'),
        'subtitle' => esc_html__('Select a header layout option from the examples.', 'indutri'),
        'desc' => '',
        'options' => indutri_get_headers(false),
        'default' => 'header-1'
      ),
      array(
        'id' => 'header_logo', 
        'type' => 'media',
        'url' => true,
        'title' => esc_html__('Logo in header default', 'indutri'), 
        'default' => ''
      ),  
      array(
        'id'  => 'header_mobile_settings',
        'type'  => 'info',
        'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Header Mobile settings', 'indutri' ) . '</h3>'
      ),
      array(
        'id' => 'hm_logo',
        'type' => 'media',
        'url' => true,
        'title' => esc_html__('Header Mobile | Logo', 'indutri'),
        'default' => ''
      ),
      array(
        'id' => 'hm_my_account_menu',
        'type' => 'select',
        'title' => esc_html__('Header Mobile | My Account Menu', 'indutri'),
        'options' => indutri_get_all_menus(),
        'default' => 'my-account'
      ),
      array(
        'id' => 'hm_text_login',
        'type' => 'text',
        'title' => esc_html__('Header Mobile | Text Sign in or Register', 'indutri'),
        'default' => esc_html__('Sign in or Register', 'indutri')
      ),
      array(
        'id' => 'hm_text_login_url',
        'type' => 'text',
        'title' => esc_html__('Header Mobile | Link Login', 'indutri'),
        'default' => ''
      ),
      array(
        'id' => 'hm_text_create_project',
        'type' => 'text',
        'title' => esc_html__('Header Mobile | Text Create A Project', 'indutri'),
        'default' => esc_html__('Create A Project', 'indutri')
      ),
      array(
        'id' => 'hm_create_project_url',
        'type' => 'text',
        'title' => esc_html__('Header Mobile | Link Create A Project', 'indutri'),
        'default' => '#'
      ),
    )
  ));