<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

class GVAElement_Icon_Box_Group extends GVAElement_Base{

    /**
     * Get widget name.
     *
     * Retrieve testimonial widget name.
     *
     * @since  1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'gva-icon-box-group';
    }

    /**
     * Get widget title.
     *
     * Retrieve testimonial widget title.
     *
     * @since  1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __('GVA Icon Box Group', 'indutri-themer');
    }

    /**
     * Get widget icon.
     *
     * Retrieve testimonial widget icon.
     *
     * @since  1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-posts-carousel';
    }

    public function get_keywords() {
        return [ 'icon', 'box', 'content', 'carousel', 'grid' ];
    }

    public function get_script_depends() {
      return [
          'jquery.owl.carousel',
          'gavias.elements',
      ];
    }

    public function get_style_depends() {
      return array('owl-carousel-css');
    }

    /**
     * Register testimonial widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'indutri-themer'),
            ]
        );

        $repeater = new Repeater();
        
        $repeater->add_control(
          'title',
          [
            'label'       => __('Title', 'indutri-themer'),
            'type'        => Controls_Manager::TEXT,
            'default'     => 'Add your Title',
            'label_block' => true,
          ]
        );
        $repeater->add_control(
          'desc',
          [
            'label'       => __('Description', 'indutri-themer'),
            'type'        => Controls_Manager::TEXTAREA,
            'default'     => 'There are many new variations of pasages of available text.',
            'label_block' => true,
            'condition' => [
              'style' => ['style-2'],
            ],
          ]
        );
        $repeater->add_control(
          'selected_icon',
          [
            'label'      => __('Choose Icon', 'indutri-themer'),
            'type'       => Controls_Manager::ICONS,
            'default' => [
              'value' => 'fas fa-home',
              'library' => 'fa-solid',
            ]
          ]
        );
        $repeater->add_control(
          'link',
          [
            'label'     => __( 'Link', 'indutri-themer' ),
            'type'      => Controls_Manager::URL,
            'placeholder' => __( 'https://your-link.com', 'indutri-themer' ),
            'label_block' => true
          ]
        );
        $repeater->add_control(
          'active',
          [
            'label' => __( 'Active', 'indutri-themer' ),
            'type' => Controls_Manager::SWITCHER,
            'placeholder' => __( 'Active', 'indutri-themer' ),
            'default' => 'no'
          ]
        );

        $this->add_control(
          'icon_boxs',
          [
            'label'       => __('Brand Content Item', 'indutri-themer'),
            'type'        => Controls_Manager::REPEATER,
             'fields' => $repeater->get_controls(),
            'title_field' => '{{{ title }}}',
            'default'     => array(
              array(
                'title'  => esc_html__( 'We’re providing the best industrial services', 'indutri-themer' ),
              ),
              array(
                'title'  => esc_html__( 'We’re providing the best industrial services', 'indutri-themer' ),
              ),
              array(
                'title'  => esc_html__( 'We’re providing the best industrial services', 'indutri-themer' ),
              ),
            )
          ]
        );
        $this->add_control( // xx Layout
            'layout_heading',
            [
                'label'   => __( 'Layout', 'indutri-themer' ),
                'type'    => Controls_Manager::HEADING,
            ]
        );
         $this->add_control(
            'layout',
            [
                'label'   => __( 'Layout Display', 'indutri-themer' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid'      => __( 'Grid', 'indutri-themer' ),
                    'carousel'  => __( 'Carousel', 'indutri-themer' ),
                ]
            ]
        );
  
        $this->add_control(
            'style',
            [
                'label' => __( 'Style', 'indutri-themer' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style-1' => esc_html__('Style I', 'indutri-themer'),
                ],
                'default' => 'style-1',
            ]
        );
        $this->add_control(
            'view',
            [
                'label'   => __('View', 'indutri-themer'),
                'type'    => Controls_Manager::HIDDEN,
                'default' => 'traditional',
            ]
        );
        $this->end_controls_section();

        $this->add_control_carousel(false, array('layout' => 'carousel'));

        $this->add_control_grid(array('layout' => 'grid'));

        // Icon Styling
        $this->start_controls_section(
          'section_style_icon',
          [
            'label' => __( 'Icon', 'indutri-themer' ),
            'tab'   => Controls_Manager::TAB_STYLE,
          ]
        );

        $this->add_control(
          'icon_color',
          [
            'label' => __( 'Icon Color', 'indutri-themer' ),
            'type' => Controls_Manager::COLOR,
            'scheme' => [
              'type' => Scheme_Color::get_type(),
              'value' => Scheme_Color::COLOR_1,
            ],
            'default' => '',
            'selectors' => [
              '{{WRAPPER}} .gsc-icon-box-group .icon-box-item-content .box-icon i' => 'color: {{VALUE}};',
              '{{WRAPPER}} .gsc-icon-box-group .icon-box-item-content svg' => 'fill: {{VALUE}};'
            ],
          ]
        );

        $this->add_responsive_control(
          'icon_size',
          [
            'label' => __( 'Size', 'indutri-themer' ),
            'type' => Controls_Manager::SLIDER,
            'default' => [
              'size' => 62
            ],
            'range' => [
              'px' => [
                'min' => 20,
                'max' => 80,
              ],
            ],
            'selectors' => [
              '{{WRAPPER}} .gsc-icon-box-group .icon-box-item-content .box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
              '{{WRAPPER}} .gsc-icon-box-group .icon-box-item-content .box-icon svg' => 'width: {{SIZE}}{{UNIT}};'
            ],
          ]
        );

        $this->add_responsive_control(
          'icon_space',
          [
            'label' => __( 'Spacing', 'indutri-themer' ),
            'type' => Controls_Manager::SLIDER,
            'default' => [
              'size' => 0,
            ],
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 50,
              ],
            ],
            'selectors' => [
              '{{WRAPPER}} .gsc-icon-box-group .icon-box-item-content .icon-inner' => 'padding-bottom: {{SIZE}}{{UNIT}};',
            ],
          ]
        );

        $this->add_responsive_control(
          'icon_padding',
          [
            'label' => __( 'Padding', 'indutri-themer' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors' => [
              '{{WRAPPER}} .gsc-icon-box-group .icon-box-item-content .icon-inner .box-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
          ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
          'section_style_content',
          [
            'label' => __( 'Content', 'indutri-themer' ),
            'tab'   => Controls_Manager::TAB_STYLE,
          ]
        );

        $this->add_control(
          'heading_title',
          [
            'label' => __( 'Title', 'indutri-themer' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
          ]
        );

        $this->add_responsive_control(
          'title_bottom_space',
          [
            'label' => __( 'Spacing', 'indutri-themer' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
              'px' => [
                'min' => 0,
                'max' => 100,
              ],
            ],
            'default' => [
              'size'  => 5
            ],
            'selectors' => [
              '{{WRAPPER}} .gsc-icon-box-group .icon-box-item-content .title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
            ],
          ]
        ); 

        $this->add_control(
          'title_color',
          [
            'label' => __( 'Color', 'indutri-themer' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
              '{{WRAPPER}} .gsc-icon-box-group .icon-box-item-content .title' => 'color: {{VALUE}};',
              '{{WRAPPER}} .gsc-icon-box-group .icon-box-item-content .title a' => 'color: {{VALUE}};',
            ],
            'scheme' => [
              'type' => Scheme_Color::get_type(),
              'value' => Scheme_Color::COLOR_1,
            ],
          ]
        );

        $this->add_group_control(
          Group_Control_Typography::get_type(),
          [
            'name' => 'title_typography',
            'selector' => '{{WRAPPER}} .gsc-icon-box-group .icon-box-item-content .title, {{WRAPPER}} .gsc-icon-box-group .icon-box-item-content .title a',
            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
          ]
        );

        $this->add_control(
          'heading_description',
          [
            'label' => __( 'Description', 'indutri-themer' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
            'condition' => [
              'style' => ['style-2'],
            ],
          ]
        );

        $this->add_control(
          'description_color',
          [
            'label' => __( 'Color', 'indutri-themer' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
              '{{WRAPPER}} .gsc-icon-box-group .icon-box-item-content .desc' => 'color: {{VALUE}};',
            ],
            'scheme' => [
              'type' => Scheme_Color::get_type(),
              'value' => Scheme_Color::COLOR_3,
            ],
            'condition' => [
              'style' => ['style-2'],
            ],
          ]
        );

        $this->add_group_control(
          Group_Control_Typography::get_type(),
          [
            'name' => 'description_typography',
            'selector' => '{{WRAPPER}} .gsc-icon-box-group .icon-box-item-content',
            'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            'condition' => [
              'style' => ['style-2'],
            ],

          ]
        );

        $this->end_controls_section();
    }

    /**
     * Render testimonial widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render() {
      $settings = $this->get_settings_for_display();
      printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
        if( !empty($settings['layout']) ){
          include $this->get_template('icon-box-group/' . $settings['layout'] . '.php');
        }
      print '</div>';
    }

}
