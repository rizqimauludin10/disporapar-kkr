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

class GVAElement_List_Number extends GVAElement_Base{

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
        return 'gva-list-number';
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
        return __('GVA List Number', 'krowd-themer');
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
        return 'eicon-bullet-list';
    }

    public function get_keywords() {
        return [ 'list', 'number' ];
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
                'label' => __('Number List', 'krowd-themer'),
            ]
        );
        $this->add_control(
            'style',
            array(
                'label'   => esc_html__( 'Style', 'krowd-themer' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style-1',
                'options' => [
                  'style-1' => esc_html__('Style I', 'krowd-themer'),
                  'style-2' => esc_html__('Style II', 'krowd-themer')
                ]
            )
         );
        $repeater = new Repeater();
        
        $repeater->add_control(
            'title',
            [
                'label'       => __('Content', 'krowd-themer'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Services for a global network of creators.', 'krowd-themer'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label'   => __('Content', 'krowd-themer'),
                'default' => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.', 'krowd-themer'),
                'type'    => Controls_Manager::TEXTAREA,
                'condition' => [
                    'style' => ['style-1']
                ]
            ]
        );

        $this->add_control(
            'list_items',
            [
                'label'       => __('Content Item', 'krowd-themer'),
                'type'        => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
                'default'     => array(
                    array(
                        'title'     => esc_html__('Services for a global network of creators', 'krowd-themer' ),
                        'content'  => esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.', 'krowd-themer' )
                    ),
                    array(
                        'title'     => esc_html__('About our workspace offering' ),
                        'content'  => esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.', 'krowd-themer' )
                    ),
                ),
            ]
        );
    
        $this->end_controls_section();
        
        $this->start_controls_section( //** Section Button
            'section_button',
            [
                'label' => __( 'Button', 'krowd-themer' ),
            ]
        );
        $this->add_control(
            'button_url',
            [
                'label' => __( 'Button URL', 'krowd-themer' ),
                'type' => Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'krowd-themer' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Read More'
            ]
        );
        $this->add_control(
            'button_style',
            [
                'label' => __( 'Button Style', 'krowd-themer' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'btn-theme'         => esc_html__('Button Theme', 'krowd-themer'),
                    'btn-theme-2'       => esc_html__('Button Theme Second', 'krowd-themer'),
                    'btn-black'         => esc_html__('Button Black', 'krowd-themer')
                ],
                'default' => 'btn-theme',
            ]
        );
        $this->add_control(
            'button_size',
            [
                'label' => __( 'Button Size', 'krowd-themer' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    ''                  => esc_html__('Button Size Default', 'krowd-themer'),
                    'btn-size-small'    => esc_html__('Button Size Small', 'krowd-themer')
                ],
                'default' => '',
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button Text Color', 'krowd-themer' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gsc-heading .heading-action .btn-cta' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_background',
            [
                'label' => __( 'Button Background', 'krowd-themer' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gsc-heading .heading-action .btn-cta' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .gsc-heading .heading-action .btn-cta::before' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_color_hover',
            [
                'label' => __( 'Button Color Hover', 'krowd-themer' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gsc-heading .heading-action .btn-cta:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_background_hover',
            [
                'label' => __( 'Button Background Hover', 'krowd-themer' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gsc-heading .heading-action .btn-cta:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .gsc-heading .heading-action .btn-cta:hover:before' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

         // Title Styling
        $this->start_controls_section(
            'section_style_number',
            [
                'label' => __('Number', 'krowd-themer'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'number_text_color',
            [
                'label'     => __('Text Color', 'krowd-themer'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .gva-list-number ul.list-number li.list-number-item .content-inner .content-top .number' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .gva-list-number ul.list-number li.list-number-item .content-inner .content-top .number svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'number_bg_color',
            [
                'label'     => __('Background Color', 'krowd-themer'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .gva-list-number ul.list-number li.list-number-item .content-inner .content-top .number' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Title Styling
        $this->start_controls_section(
            'section_style_title',
            [
                'label' => __('Title', 'krowd-themer'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_text_color',
            [
                'label'     => __('Text Color', 'krowd-themer'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .gva-list-number ul.list-number li.list-number-item .content-inner .content-top .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'name_typography',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .gva-list-number ul.list-number li.list-number-item .content-inner .content-top .title',
            ]
        );

        $this->end_controls_section();

        // Content Styling
        $this->start_controls_section(
            'section_style_content',
            [
                'label' => __('Content', 'krowd-themer'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
 
        $this->add_control(
            'content_content_color',
            [
                'label'     => __('Text Color', 'krowd-themer'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .gva-list-number ul.list-number li.list-number-item .content-inner .descrption' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'content_typography',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                'selector' => '{{WRAPPER}} .gva-list-number ul.list-number li.list-number-item .content-inner .descrption',
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
      include $this->get_template('gva-list-number.php');
      print '</div>';
    }

}
