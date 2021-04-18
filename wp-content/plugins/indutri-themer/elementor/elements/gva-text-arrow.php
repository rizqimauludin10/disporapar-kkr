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

class GVAElement_Text_Arrow extends GVAElement_Base{

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
        return 'gva-text-arrow';
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
        return __('GVA Text Arrow', 'indutri-themer');
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
        return 'eicon-text';
    }

    public function get_keywords() {
        return [ 'text', 'arrow' ];
    }

    public function get_script_depends() {
      return [];
    }

    public function get_style_depends() {
      return array();
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
            'section_list',
            [
                'label' => __('Content', 'indutri-themer'),
            ]
        );
        $this->add_control(
            'style',
            array(
                'label'   => esc_html__( 'Style', 'indutri-themer' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style-1',
                'options' => [
                  'style-1' => esc_html__('Style I', 'indutri-themer'),
                ]
            )
         );
        $this->add_control(
            'title',
            array(
                'label'       => __('Title', 'indutri-themer'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Best project planning', 'indutri-themer'),
                'label_block' => true,
            )
        );
        $this->add_control(
            'content',
            array(
                'label'   => __('Content', 'indutri-themer'),
                'default' => esc_html__('Lorem ipsum is simply free dolor sit amet, consectetur notted.', 'indutri-themer'),
                'type'    => Controls_Manager::TEXTAREA,
            )
        );
        $this->add_control(
            'selected_icon',
            [
                'label' => __( 'Icon', 'indutri-themer' ),
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'default' => [
                    'value' => 'fas fa-chevron-right',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => __( 'Link', 'indutri-themer' ),
                'type' => Controls_Manager::URL,
            ]
        );
        $this->end_controls_section();
        

         // Title Styling
        $this->start_controls_section(
            'section_style_icon',
            [
                'label' => __('Icon', 'indutri-themer'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_text_color',
            [
                'label'     => __('Icon Color', 'indutri-themer'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .gva-text-arrow .content-inner .title .icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label'     => __('Icon Size', 'indutri-themer'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 12,
                ],
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 30,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .gva-text-arrow .content-inner .title .icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_space',
            [
                'label'     => __('Icon Space', 'indutri-themer'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 8,
                ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 20,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .gva-text-arrow .content-inner .title .icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        

        $this->end_controls_section();

        // Title Styling
        $this->start_controls_section(
            'section_style_title',
            [
                'label' => __('Title', 'indutri-themer'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_text_color',
            [
                'label'     => __('Text Color', 'indutri-themer'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .gva-text-arrow .content-inner .title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'name_typography',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .gva-text-arrow .content-inner .title span',
            ]
        );

        $this->end_controls_section();

        // Content Styling
        $this->start_controls_section(
            'section_style_content',
            [
                'label' => __('Content', 'indutri-themer'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
 
        $this->add_control(
            'content_content_color',
            [
                'label'     => __('Text Color', 'indutri-themer'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .gva-text-arrow .content-inner .descrption' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'content_typography',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                'selector' => '{{WRAPPER}} .gva-text-arrow .content-inner .descrption',
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
      include $this->get_template('gva-text-arrow.php');
      print '</div>';
    }

}
