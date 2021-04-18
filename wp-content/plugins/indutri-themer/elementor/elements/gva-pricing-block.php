<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

/**
 * Elementor heading widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class GVAElement_Pricing_Block extends GVAElement_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'gva-pricing-block';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'GVA Pricing Block', 'indutri-themer' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-price-list';
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'pricing', 'block' ];
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'indutri-themer' ),
			]
		);
		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'indutri-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-1' 		=> __( 'Style I', 'indutri-themer' ),
					'style-2' 		=> __( 'Style II', 'indutri-themer' )
				],
				'default' => 'style-1',
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'indutri-themer' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'indutri-themer' ),
				'default' => __( 'Standard', 'indutri-themer' ),
				'label_block' => true
			]
		);
		$this->add_control(
			'subtitle_text',
			[
				'label' => __( 'Sub Title', 'indutri-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Private amenities', 'indutri-themer' ),
				'default' => __( 'Private amenities', 'indutri-themer' ),
				'label_block' => true,
				'condition' => [
					'style' => [ 'style-2']
				]
			]
		);
		$this->add_control(
			'desc_text',
			[
				'label' => __( 'Description', 'indutri-themer' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Your Description', 'indutri-themer' ),
				'default' => __( 'There are many new variatns of pasages of available text.', 'indutri-themer' ),
				'condition' => [
					'style' => [ 'style-2']
				]
			]
		);
		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'indutri-themer' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
				'default' => [
					'url' => GAVIAS_INDUTRI_PLUGIN_URL . 'elementor/assets/images/image-1.jpg',
				],
				'condition' => [
					'style' => ['style-2']
				],
			]
		);
		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'indutri-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '60.00', 'indutri-themer' ),
				'default' => __( '60.00', 'indutri-themer' ),
			]
		);

		$this->add_control(
			'currency',
			[
				'label' => __( 'Currency', 'indutri-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Currency', 'indutri-themer' ),
				'default' => __( '$', 'indutri-themer' ),
			]
		);

		$this->add_control(
			'period',
			[
				'label' => __( 'Period', 'indutri-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Monthly', 'indutri-themer' ),
				'default' => __( 'Monthly', 'indutri-themer' ),
			]
		);
		 $repeater = new Repeater();
        
        $repeater->add_control(
          'pricing_features',
			[
	         'name'        => 'pricing_features',
	         'label'       => __('Pricing Features', 'indutri-themer'),
	         'type'        => Controls_Manager::TEXT,
	         'default'     => 'Free text goes here',
	         'label_block' => true,
	         'rows'        => '10',
	     	]
	     );
	     $repeater->add_control(
          'selected_icon',
	     	[
	     		'name'        => 'selected_icon',
	         'label'       => __('Icon', 'indutri-themer'),
	         'type'        => Controls_Manager::ICONS,
	         'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'fa-solid',
				],
	     	]
	     );
		$this->add_control(
         'pricing_content',
         [
            'label'       => __('Pricing Features', 'indutri-themer'),
            'type'        => Controls_Manager::REPEATER,
             'fields' => $repeater->get_controls(),

            'title_field' => '{{{ pricing_features }}}',
            'default'     => array(
               array(
                  'pricing_features'  => esc_html__( 'High speed internet', 'indutri-themer' ),
                  'selected_icon' => array('value' => 'fas fa-check', 'library' => 'fa-solid')
               ),
               array(
                  'pricing_features'  => esc_html__( 'Free parking space', 'indutri-themer' ),
                  'selected_icon' => array('value' => 'fas fa-check', 'library' => 'fa-solid')
               ),
               array(
                  'pricing_features'  => esc_html__( 'Free parking space', 'indutri-themer' ),
                  'selected_icon' => array('value' => 'fas fa-check', 'library' => 'fa-solid')
               ),
               array(
                  'pricing_features'  => esc_html__( 'Full access', 'indutri-themer' ),
                  'selected_icon' => array('value' => 'fas fa-check', 'library' => 'fa-solid')
               )
            ),
         	'condition' => [
					'style' => ['style-1']
				],
         ]
      );

		$this->end_controls_section();

		$this->start_controls_section( //** Section Icon
			'section_Button',
			[
				'label' => __( 'Button', 'indutri-themer' ),
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' => __( 'Button URL', 'indutri-themer' ),
				'type' => Controls_Manager::URL,
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'indutri-themer' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Read More'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'indutri-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'indutri-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-pricing .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'selector' => '{{WRAPPER}} .gsc-pricing .title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_price_style',
			[
				'label' => __( 'Price Text', 'indutri-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
 
		$this->add_control(
			'sub_title_color',
			[
				'label' => __( 'Text Color', 'indutri-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-pricing .content-inner .plan-price .price-value' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_price_text',
				'selector' => '{{WRAPPER}} .gsc-pricing .content-inner .plan-price .price-value',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'indutri-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
 
		$this->add_control(
			'content_color',
			[
				'label' => __( 'Text Color', 'indutri-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-pricing .content-inner .plan-list li .text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_content',
				'selector' => '{{WRAPPER}} .gsc-pricing .content-inner .plan-list li .text',
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'indutri-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-pricing .content-inner .plan-list li .icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
         include $this->get_template('gva-pricing-block.php');
      print '</div>';
	}

}
