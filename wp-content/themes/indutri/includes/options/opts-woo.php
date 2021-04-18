<?php
Redux::setSection( $opt_name, array(
   'icon' => 'el-icon-shopping-cart',
   'title' => esc_html__('Product Options', 'indutri'),
   'fields' => array(
      array(
        'id'        => 'products_per_page',
        'type'      => 'text',
        'title'     => esc_html__('Products Per Page', 'indutri'),
        'subtitle'  => esc_html__('Number value.', 'indutri'),
        'desc'      => esc_html__('The amount of products you would like to show per page on shop/category pages.', 'indutri'),
        'validate'  => 'numeric',
        'default'   => '24'
      )       
   )
));

Redux::setSection( $opt_name, array(
   'icon' => 'el-icon-shopping-cart',
   'title' => esc_html__('Shop Options', 'indutri'),
   'subsection' => true,
   'fields' => array(
      array(
         'id' => 'product_display_layout',
         'type' => 'select',
         'title' => esc_html__('Default Product Display Layout', 'indutri'),
         'subtitle' => "Choose the default product display layout for WooCommerce shop/category pages.",
         'options' => array(
            'grid'      => 'Grid',
            'list'   => 'List',
        ),
        'desc' => '',
        'default' => 'standard'
      ),
      array(
         'id' => 'product_columns_lg',
         'type' => 'select',
         'title' => esc_html__('Display Columns for Large Screen', 'indutri'),
         'subtitle' => "Choose the number of columns to display on shop/category pages.",
         'options' => array(
            '1'      => '1',
            '2'      => '2',
            '3'      => '3',
            '4'      => '4',
            '5'      => '5',
            '6'      => '6',
         ),
         'desc' => '',
         'default' => '3'
      ),

      array(
         'id' => 'product_columns_md',
         'type' => 'select',
         'title' => esc_html__('Display Columns for Medium Screen', 'indutri'),
         'subtitle' => "Choose the number of columns to display on shop/category pages.",
         'options' => array(
            '1'      => '1',
            '2'      => '2',
            '3'      => '3',
            '4'      => '4',
            '5'      => '5',
            '6'      => '6',
         ),
         'desc' => '',
         'default' => '3'
      ),

      array(
         'id' => 'product_columns_sm',
         'type' => 'select',
         'title' => esc_html__('Display Columns for Small Screen', 'indutri'),
         'subtitle' => "Choose the number of columns to display on shop/category pages.",
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
         'id' => 'product_columns_xs',
         'type' => 'select',
         'title' => esc_html__('Display Columns for Extra Small Screen', 'indutri'),
         'subtitle' => "Choose the number of columns to display on shop/category pages.",
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
         'id' => 'woo_sidebar_config',
         'type' => 'select',
         'title' => esc_html__('WooCommerce Sidebar Config', 'indutri'),
         'subtitle' => "Choose the sidebar config for WooCommerce shop/category pages.",
         'options' => array(
           'no-sidebars'     => 'No Sidebars',
           'left-sidebar'    => 'Left Sidebar',
           'right-sidebar'   => 'Right Sidebar'
         ),
         'desc' => '',
         'default' => 'no-sidebars'
      ),
      array(
         'id' => 'woo_left_sidebar',
         'type' => 'select',
         'title' => esc_html__('WooCommerce Left Sidebar', 'indutri'),
         'subtitle' => "Choose the left sidebar for WooCommerce shop/category pages.",
         'data'      => 'sidebars',
         'desc' => '',
         'default' => 'woocommerce_sidebar'
      ),
      array(
         'id' => 'woo_right_sidebar',
         'type' => 'select',
         'title' => esc_html__('WooCommerce Right Sidebar', 'indutri'),
         'subtitle' => "Choose the right sidebar for WooCommerce shop/category pages.",
         'data'      => 'sidebars',
         'desc' => '',
         'default' => 'woocommerce_sidebar'
      ),
      array(
         'id' => 'woo_shop_divide_0',
         'type' => 'divide'
      ),
      array(
         'id' => 'woo_breadcrumb_show_title',
         'type' => 'button_set',
         'title' => esc_html__('Breadcrumb Display Title Page', 'indutri'),
         'desc' => '',
         'options' => array(1 => 'Enable', 0 => 'Disable'),
         'default' => 1
      ),
      array(
         'id'        => 'woo_breadcrumb_padding_top',
         'type'      => 'slider',
         'title'     => esc_html__( 'Breadcrumb Padding Top', 'indutri' ),
         'default'   => 110,
         'min'       => 50,
         'max'       => 500,
         'step'      => 1,
         'display_value' => 'text',
      ),
      array(
         'id'        => 'woo_breadcrumb_padding_bottom',
         'type'      => 'slider',
         'title'     => esc_html__( 'Breadcrumb Padding Top', 'indutri' ),
         'default'   => 100,
         'min'       => 50,
         'max'       => 500,
         'step'      => 1,
         'display_value' => 'text',
      ),
      array(
         'id' => 'woo_breadcrumb_background_color',
         'type' => 'color',
         'title' => esc_html__('Background Overlay Color', 'indutri'),
         'default' => ''
      ),
      array(
         'id'        => 'woo_breadcrumb_background_opacity',
         'type'      => 'slider',
         'title'     => esc_html__( 'Breadcrumb Ovelay Color Opacity', 'indutri' ),
         'default'   => 50,
         'min'       => 0,
         'max'       => 100,
         'step'      => 2,
         'display_value' => 'text',
      ),
      array(
         'id' => 'woo_breadcrumb_image',
         'type' => 'button_set',
         'title' => esc_html__('Breadcrumb Image', 'indutri'),
         'desc' => '',
         'options' => array( 1 => 'Enable', 0 => 'Disable'),
         'default' => 'enable'
      ),
      array(
         'id' => 'woo_breadcrumb_background_image',
         'type' => 'media',
         'url' => true,
         'title' => esc_html__('Breadcrumb Background Image', 'indutri'),
         'default' => '',
         'required'  => array( 'woo_breadcrumb_image', '=', 1 )
      ),
      array(
         'id'    => 'woo_breadcrumb_text_stype',
         'type'    => 'select',
         'title'   => esc_html__( 'Breadcrumb Text Stype', 'indutri' ),
         'options' => 
         array(
            'text-light'     => esc_html__('Light', 'indutri'),
            'text-dark'      => esc_html__('Dark', 'indutri')
         ),
         'default' => 'text-light'
      ),
      array(
         'id'    => 'woo_breadcrumb_text_align',
         'type'    => 'select',
         'title'   => esc_html__( 'Breadcrumb Text Align', 'indutri' ),
         'options' => 
         array(
            'text-left'      => esc_html__('Left', 'indutri'),
            'text-center'    => esc_html__('Center', 'indutri'),
            'text-right'     => esc_html__('Right', 'indutri')
         ),
         'default' => 'text-left'
      )
   )
));

Redux::setSection( $opt_name, array(
   'icon' => 'el-icon-shopping-cart',
   'title' => esc_html__('Project/Product Options', 'indutri'),
   'subsection' => true,
   'fields' => array(
      array(
         'id' => 'upsell_heading_text',
         'type' => 'text',
         'title' => esc_html__('Upsell Heading Text', 'indutri'),
         'default' => esc_html__('Complete the look', 'indutri')
      ),
      array(
         'id' => 'related_heading_text',
         'type' => 'text',
         'title' => esc_html__('Related Heading Text', 'indutri'),
         'default' => esc_html__('Similar Projects', 'indutri'),
      ),
      array(
         'id' => 'related_subheading_text',
         'type' => 'text',
         'title' => esc_html__('Related Sub Heading Text', 'indutri'),
         'default' => esc_html__('Businesses You Can Back', 'indutri'),
      )
   )
));