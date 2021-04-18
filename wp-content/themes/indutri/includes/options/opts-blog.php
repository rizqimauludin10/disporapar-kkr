<?php
Redux::setSection( $opt_name, array(
   'title'     => esc_html__( 'Blog Options', 'indutri' ),
   'icon'      => 'el-icon-website',
   'fields' => array(
      array(
        'id'  => 'blog_archive_info',
        'type'   => 'info',
        'icon'   => true,
        'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Archive/Listing', 'indutri' ) . '</h3>',
      ),
      array(
        'id' => 'blog_columns_lg',
        'type' => 'select',
        'title' => esc_html__('Display Columns for Large Screen', 'indutri'),
        'options' => array(
           '1'      => '1',
           '2'      => '2',
           '3'      => '3',
           '4'      => '4',
           '5'      => '5',
           '6'      => '6',
        ),
        'desc' => '',
        'default' => '2'
      ),
      array(
        'id' => 'blog_columns_md',
        'type' => 'select',
        'title' => esc_html__('Display Columns for Medium Screen', 'indutri'),
        'options' => array(
           '1'      => '1',
           '2'      => '2',
           '3'      => '3',
           '4'      => '4',
           '5'      => '5',
           '6'      => '6',
        ),
        'desc' => '',
        'default' => '2'
      ),
      array(
        'id' => 'blog_columns_sm',
        'type' => 'select',
        'title' => esc_html__('Display Columns for Small Screen', 'indutri'),
        'options' => array(
           '1'      => '1',
           '2'      => '2',
           '3'      => '3',
           '4'      => '4',
           '5'      => '5',
           '6'      => '6',
        ),
        'desc' => '',
        'default' => '1'
      ),
      array(
        'id' => 'blog_columns_xs',
        'type' => 'select',
        'title' => esc_html__('Display Columns for Extra Small Screen', 'indutri'),
        'options' => array(
           '1'      => '1',
           '2'      => '2',
           '3'      => '3',
           '4'      => '4',
           '5'      => '5',
           '6'      => '6',
        ),
        'desc' => '',
        'default' => '1'
      ),
      array(
        'id' => 'archive_post_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Archive Page Blog Sidebar Config', 'indutri'),
        'subtitle' => "Choose single post layout.",
        'options' => array(
          'no-sidebars'     => 'No Sidebars',
          'left-sidebar'    => 'Left Sidebar',
          'right-sidebar'      => 'Right Sidebar',
          'both-sidebars'      => 'Both Sidebars'
        ),
        'desc' => '',
        'default' => 'no-sidebars'
      ),
     array(
      'id' => 'archive_post_left_sidebar',
      'type' => 'select',
      'title' => esc_html__('Default Archive Page Blog Left Sidebar', 'indutri'),
      'subtitle' => "Choose the default left sidebar for Single Post.",
      'data'      => 'sidebars',
      'desc' => '',
      'default' => 'blog_sidebar'
     ),
      array(
      'id' => 'archive_post_right_sidebar',
      'type' => 'select',
      'title' => esc_html__('Default Archive Page Blog Right Sidebar', 'indutri'),
      'subtitle' => "Choose the default right sidebar for Single Post.",
      'data'      => 'sidebars',
      'desc' => '',
      'default' => 'blog_sidebar'
    ),
    array(
     'id'    => 'blog_excerpt_limit',
     'type'    => 'text',
     'title'   => esc_html__( 'Blog Excerpt Limit', 'indutri' ),
     'default' => '30',
   ),
      array(
         'id'  => 'blog_single_post_info',
         'type'   => 'info',
         'icon'   => true,
         'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Single Post', 'indutri' ) . '</h3>',
      ),
   array(
     'id' => 'single_post_sidebar',
     'type' => 'select',
     'title' => esc_html__('Default Single Sidebar Config', 'indutri'),
     'subtitle' => "Choose single post layout.",
     'options' => array(
        'no-sidebars'     => 'No Sidebars',
        'left-sidebar'    => 'Left Sidebar',
        'right-sidebar'      => 'Right Sidebar',
        'both-sidebars'      => 'Both Sidebars'
     ),
     'desc' => '',
     'default' => 'no-sidebars'
   ),
   array(
     'id' => 'single_post_left_sidebar',
     'type' => 'select',
     'title' => esc_html__('Default Single Left Sidebar', 'indutri'),
     'subtitle' => "Choose the default left sidebar for Single Post.",
     'data'      => 'sidebars',
     'desc' => '',
     'default' => 'blog_sidebar'
   ),
    array(
     'id' => 'single_post_right_sidebar',
     'type' => 'select',
     'title' => esc_html__('Default Single Right Sidebar', 'indutri'),
     'subtitle' => "Choose the default right sidebar for Single Post.",
     'data'      => 'sidebars',
     'desc' => '',
     'default' => 'blog_sidebar'
   )
   )
) );