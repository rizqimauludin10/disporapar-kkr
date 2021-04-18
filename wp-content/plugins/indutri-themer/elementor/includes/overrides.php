<?php
use Elementor\Controls_Manager;
use Elementor\Repeater;
class GVA_Elementor_Override{
   public function __construct() {
      $this->add_actions();
      $this->elementor_init_setup();
   }

   function elementor_init_setup(){
      if(!get_option('elementor_allow_svg', '')) update_option( 'elementor_allow_svg', 1 );
      if(!get_option('elementor_load_fa4_shim', '')) update_option( 'elementor_load_fa4_shim', 'yes' );
      if(!get_option('elementor_disable_color_schemes', '')) update_option( 'elementor_disable_color_schemes', 'yes' );
      if(!get_option('elementor_disable_typography_schemes', '')) update_option( 'elementor_disable_typography_schemes', 'yes' );
      if(!get_option('elementor_container_width', '')) update_option( 'elementor_container_width', '1200' );
      $cpt_support = get_option( 'elementor_cpt_support' );
      if( empty($cpt_support) ){
         $cpt_support[] = 'page';
         $cpt_support[] = 'footer';
         $cpt_support[] = 'gva_header';
         update_option('elementor_cpt_support', $cpt_support);
      }else{
         if( !in_array('footer', $cpt_support) || !in_array('gva_header', $cpt_support) ){
            $cpt_support[] = 'footer';
            $cpt_support[] = 'gva_header';
            update_option('elementor_cpt_support', $cpt_support);
         }
      }
   }

   public function add_actions() {
      add_action( 'elementor/element/column/layout/after_section_end', [ $this, 'after_column_end' ], 10, 2 );
      add_action( 'elementor/element/section/section_layout/after_section_end', [ $this, 'after_row_end' ], 10, 2 );

      add_action( 'elementor/element/section/section_structure/after_section_end', [ $this, 'row_color_theme' ], 10, 2 );

      //Color theme for Elements
      add_action( 'elementor/element/icon-box/section_icon/after_section_end', array($this,'icon_color_theme'), 10, 2 );
      add_action( 'elementor/element/icon-list/section_icon/after_section_end', array($this,'icon_color_theme'), 10, 2 );
   }

   public function after_column_end( $obj, $args ) {
      $obj->start_controls_section(
         'gva_section_column',
         array(
            'label' => esc_html__( 'Gavias Extra Settings', 'indutri-themer' ),
            'tab'   => Controls_Manager::TAB_LAYOUT,
         )
      );
      $obj->add_control(
         '_gva_extra_colum_background_color',
         [
            'label' => __( 'Background Color Available', 'indutri-themer' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
               '' => __( '-- None --', 'indutri-themer' ),
               'col-bg-theme' => __( 'Background Theme', 'indutri-themer' ),
               'col-bg-theme-2' => __( 'Background Theme Second', 'indutri-themer' ),
               'col-bg-fill-left' => __( 'Background Color Fill to Left', 'indutri-themer' ),
               'col-bg-fill-right' => __( 'Background Color Fill to Right', 'indutri-themer' ),
            ],
            'default' => 'top',
            'prefix_class' => '',
         ]
      );

      $obj->add_control(
         '_gva_colum_bakcground_color',
         [
            'label' => __( 'Background Color', 'indutri-themer' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
               '{{WRAPPER}}.col-bg-fill-left, {{WRAPPER}}.col-bg-fill-left:after ' => 'background-color: {{VALUE}};',
               '{{WRAPPER}}.col-bg-fill-right, {{WRAPPER}}.col-bg-fill-right:after ' => 'background-color: {{VALUE}};'
            ],
            'condition' => [
               '_gva_extra_colum_background_color' => ['col-bg-fill-left', 'col-bg-fill-right']
            ],
         ]
      );

      $obj->add_control(
         '_gva_extra_classes',
         [
            'label' => __( 'Background Style Available', 'indutri-themer' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
               '' => __( '-- None --', 'indutri-themer' ),
               'bg-overflow-left' => __( 'Background Overflow Left', 'indutri-themer' ),
               'bg-overflow-right' => __( 'Background Overflow Right', 'indutri-themer' ),
            ],
            'default' => 'top',
            'prefix_class' => 'column-style-',
         ]
      );
 
 
      $obj->end_controls_section();    

      //Header Builder
      $obj->start_controls_section(
         'gva_section_row',
         array(
            'label' => esc_html__( 'Gavias Extra Settings Column for Header Builder', 'indutri-themer' ),
            'tab'   => Controls_Manager::TAB_LAYOUT,
         )
      );

      // Has megamenu
      $obj->add_control(
         'row_has_megamenu',
         [
            'label'  => esc_html__( 'Column include main-menu', 'indutri-themer' ),
            'type'      => Controls_Manager::HEADING
         ]
      );

      $obj->add_control(
         '_gva_has_megamenu',
         [
            'label'     => __( 'Enable if Column include main-menu', 'indutri-themer' ),
            'type'      => Controls_Manager::SELECT,
            'label_block'  => true,
            'options'   => [
               'column-main-menu' => __( 'Enable', 'indutri-themer' ),
               '' => __( 'Disable', 'indutri-themer' ),
            ],
            'default'         => '',
            'prefix_class'    => '',
         ]
      ); 
      $obj->end_controls_section();    

   }

   public function after_row_end( $obj, $args ) {
      
      //Background Row
      $obj->start_controls_section(
         'gva_style_arrow_row',
         array(
            'label' => esc_html__( 'Arrow Background', 'indutri-themer' ),
            'tab'   => Controls_Manager::TAB_LAYOUT,
         )
      );

      // Arrow I
      $obj->add_control(
         'gva_arrow_row_1_control',
         [
            'label'     => __('Show Arrow I ----------------', 'indutri-themer'),
            'type'      => Controls_Manager::SWITCHER,
            'default'   => 'no',
         ]
     );

      $obj->add_control(
         'gva_style_arrow_row_1',
         [
            'label'  => esc_html__( 'Arrow I', 'indutri-themer' ),
            'type'      => Controls_Manager::HEADING,
            'condition' => [
               'gva_arrow_row_1_control' => ['yes']
            ]
         ]
      );

      $obj->add_control(
         'arrow_1_image',
         [
            'label' => __( 'Arrow Image', 'indutri-themer' ),
            'type' => Controls_Manager::MEDIA,
            'selectors' => [
               '{{WRAPPER}} > div.arrow-1' => 'background-image:url("{{URL}}");',
            ],
            'condition' => [
               'gva_arrow_row_1_control' => ['yes']
            ]
         ]
      );

      $obj->add_responsive_control(
         'arrow_1_width',
         [
            'label' => __( 'Width', 'indutri-themer' ),
            'type' => Controls_Manager::SLIDER,
            'default' => [
              'size' => 300
            ],
            'range' => [
              'px' => [
                  'min' => 0,
                  'max' => 1000,
              ],
            ],
            'condition' => [
               'gva_arrow_row_1_control' => ['yes']
            ],
            'selectors' => [
              '{{WRAPPER}} > div.arrow-1' => 'width: {{SIZE}}{{UNIT}};',
            ],
         ]
      );

      $obj->add_responsive_control(
         'arrow_1_height',
         [
            'label' => __( 'Height', 'indutri-themer' ),
            'type' => Controls_Manager::SLIDER,
            'default' => [
              'size' => 300
            ],
            'range' => [
              'px' => [
                  'min' => 0,
                  'max' => 1000,
              ],
            ],
            'condition' => [
               'gva_arrow_row_1_control' => ['yes']
            ],
            'selectors' => [
              '{{WRAPPER}} > div.arrow-1' => 'height: {{SIZE}}{{UNIT}};',
            ],
         ]
      );

      $obj->add_control(
         'arrow_1_x',
         [
            'label'    => esc_html__( 'Position X', 'indutri-themer' ),
            'type'     => Controls_Manager::SELECT,
            'options'  => array(
               'arrow_1_x_top' => 'Top',
               'arrow_1_x_bottom' => 'Bottom',
            ),
            'default' => 'arrow_1_x_top',
            'prefix_class' => '',
            'condition' => [
               'gva_arrow_row_1_control' => ['yes']
            ]
         ]
      );

      $obj->add_control(
         'arrow_1_y',
         [
            'label'    => esc_html__( 'Position Y', 'indutri-themer' ),
            'type'     => Controls_Manager::SELECT,
            'options'  => array(
               'arrow_1_y_left' => 'Left',
               'arrow_1_y_right' => 'Right',
            ),
            'default' => 'arrow_1_y_left',
            'prefix_class' => '',
            'condition' => [
               'gva_arrow_row_1_control' => ['yes']
            ]
         ]
      );
      $obj->add_control(
         'arrow_1_bg_position',
         [
            'label'    => esc_html__( 'Background Position', 'indutri-themer' ),
            'type'     => Controls_Manager::SELECT,
            'options' => [
               'center center' => _x( 'Center Center', 'indutri-themer' ),
               'center left' => _x( 'Center Left', 'indutri-themer' ),
               'center right' => _x( 'Center Right', 'indutri-themer' ),
               'top center' => _x( 'Top Center', 'indutri-themer' ),
               'top left' => _x( 'Top Left', 'indutri-themer' ),
               'top right' => _x( 'Top Right',  'indutri-themer' ),
               'bottom center' => _x( 'Bottom Center', 'indutri-themer' ),
               'bottom left' => _x( 'Bottom Left', 'indutri-themer' ),
               'bottom right' => _x( 'Bottom Right', 'indutri-themer' ),
            ],
            'default'   => 'top left',
            'condition' => [
               'gva_arrow_row_1_control' => ['yes']
            ],
            'selectors' => [
               '{{WRAPPER}} > div.arrow-1' => 'background-position: {{VALUE}}',
            ],
         ]
      );
      $obj->add_control(
         'arrow_1_animation',
         [
            'label'    => esc_html__( 'Animation', 'indutri-themer' ),
            'type'     => Controls_Manager::SELECT,
            'options' => [
               'left_shape'   => _x( 'Left -> Right -> Left',  'indutri-themer' ),
               'right_shape'  => _x( 'Right -> Left -> Right', 'indutri-themer' ),
               'top_shape'    => _x( 'Top -> Bottom -> Top',  'indutri-themer' ),
               'bottoms_hape' => _x( 'Bottom -> Top -> Bottom', 'indutri-themer' ),
            ],
            'default'   => 'top_shape',
            'condition' => [
               'gva_arrow_row_1_control' => ['yes']
            ],
            'selectors' => [
               '{{WRAPPER}} > div.arrow-1' => ' -webkit-animation: {{VALUE}} 5s infinite;animation: {{VALUE}} 5s infinite;',
            ],
         ]
      );
      $obj->add_control(
         'arrow_1_z_index',
         [
            'label'    => esc_html__( 'z-index', 'indutri-themer' ),
            'type'     => Controls_Manager::NUMBER,
            'min'      => 0,
            'max'      => 99,
            'step'     => 1,
            'condition' => [
               'gva_arrow_row_1_control' => ['yes']
            ],
            'selectors' => [
               '{{WRAPPER}} > div.arrow-1' => 'z-index: {{VALUE}}',
            ],
         ]
      );
      
      $obj->add_responsive_control(
         'arrow_1_space',
         [
            'label' => __( 'Space', 'indutri-themer' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'default' => [
               'top'       => 0,
               'right'     => 0,
               'left'      => 0,
               'bottom'    => 0,
               'unit'      => 'px'
            ],
            'condition' => [
               'gva_arrow_row_1_control' => ['yes']
            ],
            'selectors' => [
               '{{WRAPPER}} > div.arrow-1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
         ]
      );

      // Arrow II
      $obj->add_control(
         'gva_arrow_row_2_control',
         [
            'label'     => __('Show Arrow II ----------------', 'indutri-themer'),
            'type'      => Controls_Manager::SWITCHER,
            'default'   => 'no',
         ]
     );

      $obj->add_control(
         'gva_style_arrow_row_2',
         [
            'label'  => esc_html__( 'Arrow II', 'indutri-themer' ),
            'type'      => Controls_Manager::HEADING,
            'condition' => [
               'gva_arrow_row_2_control' => ['yes']
            ]
         ]
      );

      $obj->add_control(
         'arrow_2_image',
         [
            'label' => __( 'Arrow Image', 'indutri-themer' ),
            'type' => Controls_Manager::MEDIA,
            'selectors' => [
               '{{WRAPPER}} > div.arrow-2' => 'background-image:url("{{URL}}");',
            ],
            'condition' => [
               'gva_arrow_row_2_control' => ['yes']
            ]
         ]
      );

      $obj->add_responsive_control(
         'arrow_2_width',
         [
            'label' => __( 'Width', 'indutri-themer' ),
            'type' => Controls_Manager::SLIDER,
            'default' => [
              'size' => 300
            ],
            'range' => [
              'px' => [
                  'min' => 50,
                  'max' => 1000,
              ],
            ],
            'condition' => [
               'gva_arrow_row_2_control' => ['yes']
            ],
            'selectors' => [
              '{{WRAPPER}} > div.arrow-2' => 'width: {{SIZE}}{{UNIT}};',
            ],
         ]
      );

      $obj->add_responsive_control(
         'arrow_2_height',
         [
            'label' => __( 'Height', 'indutri-themer' ),
            'type' => Controls_Manager::SLIDER,
            'default' => [
              'size' => 300
            ],
            'range' => [
              'px' => [
                  'min' => 50,
                  'max' => 1000,
              ],
            ],
            'condition' => [
               'gva_arrow_row_2_control' => ['yes']
            ],
            'selectors' => [
              '{{WRAPPER}} > div.arrow-2' => 'height: {{SIZE}}{{UNIT}};',
            ],
         ]
      );

      $obj->add_control(
         'arrow_2_x',
         [
            'label'    => esc_html__( 'Position X', 'indutri-themer' ),
            'type'     => Controls_Manager::SELECT,
            'options'  => array(
               'arrow_2_x_top' => 'Top',
               'arrow_2_x_bottom' => 'Bottom',
            ),
            'default'   => 'arrow_2_x_bottom',
            'prefix_class' => '',
            'condition' => [
               'gva_arrow_row_2_control' => ['yes']
            ]
         ]
      );

      $obj->add_control(
         'arrow_2_y',
         [
            'label'    => esc_html__( 'Position Y', 'indutri-themer' ),
            'type'     => Controls_Manager::SELECT,
            'options'  => array(
               'arrow_2_y_left' => 'Left',
               'arrow_2_y_right' => 'Right',
            ),
            'default'   => 'arrow_2_y_right',
            'prefix_class' => '',
            'condition' => [
               'gva_arrow_row_2_control' => ['yes']
            ]
         ]
      );
      $obj->add_control(
         'arrow_2_bg_position',
         [
            'label'    => esc_html__( 'Background Position', 'indutri-themer' ),
            'type'     => Controls_Manager::SELECT,
            'options' => [
               'center center' => _x( 'Center Center', 'indutri-themer' ),
               'center left' => _x( 'Center Left', 'indutri-themer' ),
               'center right' => _x( 'Center Right', 'indutri-themer' ),
               'top center' => _x( 'Top Center', 'indutri-themer' ),
               'top left' => _x( 'Top Left', 'indutri-themer' ),
               'top right' => _x( 'Top Right',  'indutri-themer' ),
               'bottom center' => _x( 'Bottom Center', 'indutri-themer' ),
               'bottom left' => _x( 'Bottom Left', 'indutri-themer' ),
               'bottom right' => _x( 'Bottom Right', 'indutri-themer' ),
            ],
            'default'   => 'top right',
            'condition' => [
               'gva_arrow_row_2_control' => ['yes']
            ],
            'selectors' => [
               '{{WRAPPER}} > div.arrow-2' => 'background-position: {{VALUE}}',
            ],
         ]
      );
      $obj->add_control(
         'arrow_2_animation',
         [
            'label'    => esc_html__( 'Animation', 'indutri-themer' ),
            'type'     => Controls_Manager::SELECT,
            'options' => [
               'left_shape'   => _x( 'Left -> Right -> Left',  'indutri-themer' ),
               'right_shape'  => _x( 'Right -> Left -> Right', 'indutri-themer' ),
               'top_shape'    => _x( 'Top -> Bottom -> Top',  'indutri-themer' ),
               'bottom_shape' => _x( 'Bottom -> Top -> Bottom', 'indutri-themer' ),
            ],
            'default'   => 'bottom_shape',
            'condition' => [
               'gva_arrow_row_2_control' => ['yes']
            ],
            'selectors' => [
               '{{WRAPPER}} > div.arrow-2' => ' -webkit-animation: {{VALUE}} 5s infinite;animation: {{VALUE}} 5s infinite;',
            ],
         ]
      );
      $obj->add_control(
         'arrow_2_z_index',
         [
            'label'    => esc_html__( 'z-index', 'indutri-themer' ),
            'type'     => Controls_Manager::NUMBER,
            'min'      => 0,
            'max'      => 99,
            'step'     => 1,
            'condition' => [
               'gva_arrow_row_2_control' => ['yes']
            ],
            'selectors' => [
               '{{WRAPPER}} > div.arrow-2' => 'z-index: {{VALUE}}',
            ],
         ]
      );
      
      $obj->add_responsive_control(
         'arrow_2_space',
         [
            'label' => __( 'Space', 'indutri-themer' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'default' => [
               'top'       => 0,
               'right'     => 0,
               'left'      => 0,
               'bottom'    => 0,
               'unit'      => 'px'
            ],
            'condition' => [
               'gva_arrow_row_2_control' => ['yes']
            ],
            'selectors' => [
               '{{WRAPPER}} > div.arrow-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
         ]
      );

      $obj->end_controls_section();

      // Header Sticky
      $obj->start_controls_section(
         'gva_section_row_header',
         array(
            'label' => esc_html__( 'Gavias Settings Row of Header Builder', 'indutri-themer' ),
            'tab'   => Controls_Manager::TAB_LAYOUT,
         )
      );

      // Header Sticky
      $obj->add_control(
         'row_header_sticky',
         [
            'label'  => esc_html__( 'Sticky Row Settings (Use only for row in header)', 'indutri-themer' ),
            'type'      => Controls_Manager::HEADING
         ]
      );

      $obj->add_control(
         '_gva_sticky_menu',
         [
            'label'     => __( 'Sticky Menu Row', 'indutri-themer' ),
            'type'      => Controls_Manager::SELECT,
            'options'   => [
               '' => __( '-- None --', 'indutri-themer' ),
               'gv-sticky-menu' => __( 'Sticky Menu', 'indutri-themer' ),
            ],
            'default'         => '',
            'prefix_class'    => '',
            'description'     => esc_html__('You can only enable sticky menu for one row, please make sure display all sticky menu for other rows', 'indutri-themer' )
         ]
      );

      $obj->add_control(
         '_gva_sticky_background',
         [
            'label'     => __('Sticky Background Color', 'indutri-themer'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}}.stuck' => 'background: {{VALUE}}!important', 
            ],
            'condition' => [
               '_gva_sticky_menu!' => ''
            ]
         ]
      );
      $obj->add_control(
         '_gva_sticky_menu_text_color',
         [
            'label'     => __('Sticky Text Color', 'indutri-themer'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}}.stuck' => 'color: {{VALUE}}', 
            ],
            'condition' => [
               '_gva_sticky_menu!' => ''
            ]
         ]
      );
      $obj->add_control(
         '_gva_sticky_menu_link_color',
         [
            'label'     => __('Sticky Link Menu Color', 'indutri-themer'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}}.stuck .gva-navigation-menu ul.gva-nav-menu > li > a' => 'color: {{VALUE}}',
            ],
            'condition' => [
               '_gva_sticky_menu!' => ''
            ]
         ]
      );
      $obj->add_control(
         '_gva_sticky_menu_link_hover_color',
         [
            'label'     => __('Sticky Link Menu Hover Color', 'indutri-themer'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}}.stuck .gva-navigation-menu ul.gva-nav-menu > li > a:hover' => 'color: {{VALUE}}',
            ],
            'condition' => [
               '_gva_sticky_menu!' => ''
            ]
         ]
      );
      $obj->end_controls_section();
   }

      public function row_color_theme( $obj, $args ) {
      $obj->start_controls_section(
         'gva_section_icon_style',
         array(
            'label' => esc_html__( 'Row Theme Settings', 'krowd-themer' ),
            'tab'   => Controls_Manager::TAB_STYLE,
         )
      );

      $obj->add_control(
         'gva_row_color',
         [
            'label' => __( 'Background Color', 'gaviasthemer' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
               '' => __( '-- Default --', 'gaviasthemer' ),
               'theme'         => __( 'Background Color Theme', 'gaviasthemer' ),
               'theme-second'  => __( 'Background Color Theme Second', 'gaviasthemer' ),
            ],
            'default' => '',
            'prefix_class' => 'bg-row-',
         ]
      );

      $obj->end_controls_section(); 
   }

   public function icon_color_theme( $obj, $args ) {
      $obj->start_controls_section(
         'gva_section_icon_style',
         array(
            'label' => esc_html__( 'Color Theme Settings', 'krowd-themer' ),
            'tab'   => Controls_Manager::TAB_STYLE,
         )
      );

      $obj->add_control(
         'gva_icon_color',
         [
            'label' => __( 'Icon Color', 'gaviasthemer' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
               '' => __( '-- Default --', 'gaviasthemer' ),
               'color-theme'         => __( 'Color Theme', 'gaviasthemer' ),
               'color-theme-second'  => __( 'Color Theme Second', 'gaviasthemer' ),
            ],
            'default' => '',
            'prefix_class' => 'icon-',
         ]
      );

      $obj->add_control(
         'gva_hover_color',
         [
            'label' => __( 'Link Hover Color', 'krowd-themer' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
               '' => __( '-- Default --', 'gaviasthemer' ),
               'color-theme'         => __( 'Color Theme', 'gaviasthemer' ),
               'color-theme-second'  => __( 'Color Theme Second', 'gaviasthemer' ),
            ],
            'default' => '',
            'prefix_class' => 'hover-',
         ]
     );
 
      $obj->end_controls_section(); 
   }
   
}

new GVA_Elementor_Override();

