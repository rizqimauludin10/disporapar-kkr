<?php
Redux::setSection( $opt_name, array(
   'title' => esc_html__('Breadcrumb Options', 'indutri'),
   'desc' => '',
   'icon' => 'el-icon-compass',
   'fields' => array(
      array(
        'id' => 'breadcrumb_show_title',
        'type' => 'button_set',
        'title' => esc_html__('Breadcrumb Display Title Page', 'indutri'),
        'desc' => '',
        'options' => array(1 => 'Enable', 0 => 'Disable'),
        'default' => 1
      ),
      array(
        'id'        => 'breadcrumb_padding_top',
        'type'      => 'slider',
        'title'     => esc_html__( 'Breadcrumb Padding Top', 'indutri' ),
        'default'   => 135,
        'min'       => 50,
        'max'       => 500,
        'step'      => 1,
        'display_value' => 'text',
      ),
      array(
        'id'        => 'breadcrumb_padding_bottom',
        'type'      => 'slider',
        'title'     => esc_html__( 'Breadcrumb Padding Top', 'indutri' ),
        'default'   => 135,
        'min'       => 50,
        'max'       => 500,
        'step'      => 1,
        'display_value' => 'text',
      ),
      array(
        'id' => 'breadcrumb_background_color',
        'type' => 'color',
        'title' => esc_html__('Background Overlay Color', 'indutri'),
        'default' => '#192437'
      ),
      array(
        'id'        => 'breadcrumb_background_opacity',
        'type'      => 'slider',
        'title'     => esc_html__( 'Breadcrumb Ovelay Color Opacity', 'indutri' ),
        'default'   => 50,
        'min'       => 0,
        'max'       => 100,
        'step'      => 1,
        'display_value' => 'text',
      ),
      array(
        'id' => 'breadcrumb_image',
        'type' => 'button_set',
        'title' => esc_html__('Enable Breadcrumb Image', 'indutri'),
        'desc' => '',
        'options' => array(1 => 'Enable', 0 => 'Disable'),
        'default' => 1
      ),
      array(
        'id' => 'breadcrumb_background_image',
        'type' => 'media',
        'url' => true,
        'title' => esc_html__('Breadcrumb Background Image', 'indutri'),
        'default' => '',
        'required'  => array( 'breadcrumb_image', '=', 1 )
      ),
      array(
        'id'    => 'breadcrumb_text_stype',
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
        'id'    => 'breadcrumb_text_align',
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
) );