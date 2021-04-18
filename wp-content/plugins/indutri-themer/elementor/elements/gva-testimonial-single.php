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

class GVAElement_Testimonial_Single extends GVAElement_Base{

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
        return 'gva-testimonials-single';
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
        return __('GVA Testimonials Single', 'indutri-themer');
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
        return [ 'testimonial', 'content', 'carousel' ];
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
            'section_testimonial',
            [
                'label' => __('Testimonials', 'indutri-themer'),
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
        $repeater = new Repeater();

        $repeater->add_control(
            'testimonial_content',
            [
                'label'       => __('Content', 'indutri-themer'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'This is due to their excellent service, competitive pricing and customer support. It’s throughly refresing to get such a personal touch.',
                'label_block' => true,
                'rows'        => '8',
            ]
        );
         $repeater->add_control(
            'testimonial_image',
            [
                'label'      => __('Testimonial Image', 'indutri-themer'),
                'default'    => [
                    'url' => GAVIAS_INDUTRI_PLUGIN_URL . 'elementor/assets/images/testimonial.jpg',
                ],
                'type'       => Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'testimonial_name',
            [
                'label'   => __('Name', 'indutri-themer'),
                'default' => 'John Doe',
                'type'    => Controls_Manager::TEXT,
            ]
        );
         $repeater->add_control(
            'testimonial_job',
            [
                'label'   => __('Job', 'indutri-themer'),
                'default' => 'Director',
                'type'    => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label'       => __('Testimonials Content Item', 'indutri-themer'),
                'type'        => Controls_Manager::REPEATER,
                 'fields' => $repeater->get_controls(),
                'title_field' => '{{{ testimonial_name }}}',
                'default'     => array(
                    array(
                        'testimonial_name'     => esc_html__( 'Christine Eve', 'indutri-themer' ),
                        'testimonial_image'    => [
                            'url' => GAVIAS_INDUTRI_PLUGIN_URL . 'elementor/assets/images/testimonial.jpg',
                        ],
                    ),
                    array(
                        'testimonial_name'     => esc_html__( 'Kevin Smith', 'indutri-themer' ),
                        'testimonial_image'    => [
                            'url' => GAVIAS_INDUTRI_PLUGIN_URL . 'elementor/assets/images/testimonial.jpg',
                        ],
                    ),
                ),
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

         $this->add_control_carousel( 'always_single',
            array(
               'style' => ['style-1', 'style-2']
            )
         );

        //Style Box
         $this->start_controls_section(
            'section_style_box',
            [
                'label' => __('Box Style', 'indutri-themer'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
            'box_image_size',
            [
                'label' => __( 'Image Size', 'indutri-themer' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 415,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .gva-testimonial-single .testimonial-item .testimonial-content .testimonial-left' => 'width: calc(100% - {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .gva-testimonial-single .testimonial-item .testimonial-content .testimonial-right' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'box_background_color',
            [
                'label'     => __('Background Color', 'indutri-themer'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .gva-testimonial-single .testimonial-item .testimonial-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'box_border_color',
            [
                'label'     => __('Border Color', 'indutri-themer'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .gva-testimonial-single .testimonial-item .testimonial-content' => 'border-left-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        // Style.
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
                    '{{WRAPPER}} .gva-testimonial-single .testimonial-content' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .gva-testimonial-single .icon-quote' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'content_typography',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                'selector' => '{{WRAPPER}} .gva-testimonial-single .testimonial-item .testimonial-content .testimonial-left .testimonial-quote',
            ]
        );

        $this->end_controls_section();

        // Image Styling
        $this->start_controls_section(
            'section_style_image',
            [
                'label'     => __('Image', 'indutri-themer'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'      => 'image_border',
                'selector'  => '{{WRAPPER}} .gva-testimonial-single .testimonial-image',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label'      => __('Border Radius', 'indutri-themer'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .gva-testimonial-single .testimonial-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Name Styling
        $this->start_controls_section(
            'section_style_name',
            [
                'label' => __('Name', 'indutri-themer'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'name_text_color',
            [
                'label'     => __('Text Color', 'indutri-themer'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .gva-testimonial-single .testimonial-item .testimonial-content .testimonial-left .testimonial-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'name_typography',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .gva-testimonial-single .testimonial-item .testimonial-content .testimonial-left .testimonial-name',
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
      if(isset($settings['style']) && $settings['style']){
         include $this->get_template('testimonials-single/gva-testimonials-' . $settings['style'] . '.php');
      }
      print '</div>';
    }

}
