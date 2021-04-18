<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
/**
 * Elementor tabs widget.
 *
 * Elementor widget that displays vertical or horizontal tabs with different
 * pieces of content.
 *
 * @since 1.0.0
 */
class GVAElement_Tabs_Content extends GVAElement_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve tabs widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'gva-tabs-content';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve tabs widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'GVA Tabs Content', 'indutri-themer' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve tabs widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-tabs';
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
		return [ 'tabs', 'accordion', 'toggle' ];
	}

	/**
	 * Register tabs widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_tabs',
			[
				'label' => __( 'GVA Tabs Content', 'indutri-themer' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label' => __( 'Title & Description', 'indutri-themer' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tab Title', 'indutri-themer' ),
				'placeholder' => __( 'Tab Title', 'indutri-themer' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'tab_image',
			[
				'label' => __( 'Choose Image', 'indutri-themer' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
				'default' => [
					'url' => Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label' => __( 'Content', 'indutri-themer' ),
				'default' => __( 'Tab Content', 'indutri-themer' ),
				'placeholder' => __( 'Tab Content', 'indutri-themer' ),
				'type' => Controls_Manager::WYSIWYG,
				'show_label' => false,
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' => __( 'Tabs Items', 'indutri-themer' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => __( 'Our Mission', 'indutri-themer' ),
						'tab_content' => __( "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.", 'indutri-themer' ),
					],
					[
						'tab_title' => __( 'Our Vision', 'indutri-themer' ),
						'tab_content' => __( "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.", 'indutri-themer' ),
					],
					[
						'tab_title' => __( 'Our History', 'indutri-themer' ),
						'tab_content' => __( "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.", 'indutri-themer' ),
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);
		
		$this->add_responsive_control(
			'tab_item_width',
			[
				'label' => __( 'Tab Item Width', 'indutri-themer' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 60,
						'max' => 300,
					],
					'%' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 31,
					'size_units' => '%' 
				],
				'selectors' => [
					'{{WRAPPER}} .gsc-tabs-content .nav_tabs > li' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		

		$this->start_controls_section(
			'section_tabs_style',
			[
				'label' => __( 'Tabs', 'indutri-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
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

		$this->add_control(
			'background_active',
			[
				'label' => __( 'Active Background Color', 'indutri-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffff',
				'selectors' => [
					'{{WRAPPER}} .gsc-tabs-color .nav_tabs > li.active a' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_active',
			[
				'label' => __( 'Active Color', 'indutri-themer' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#18212e',
				'selectors' => [
					'{{WRAPPER}} .gsc-tabs-color .nav_tabs > li.active a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_typography',
				'selector' => '{{WRAPPER}} .gsc-tabs-color .nav_tabs > li a',
			]
		);

		$this->add_control(
			'heading_content',
			[
				'label' => __( 'Content', 'indutri-themer' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Color', 'indutri-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-tabs-color .tab-content .tab-pane .tab-content-item' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .gsc-tabs-color .tab-content .tab-pane .tab-content-item',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render tabs widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$tabs = $this->get_settings_for_display( 'tabs' );
   	$_random = gaviasthemer_random_id();

		$id_int = substr( $this->get_id_int(), 0, 3 );
		?>
		<div class="gsc-tabs-content" role="tablist">
			<div class="tabs_wrapper">
				
				<ul class="nav nav_tabs clearfix">
					<?php
					foreach ( $tabs as $index => $item ) :
						$tab_count = $index + 1;

						$tab_title_setting_key = $this->get_repeater_setting_key( 'tab_title', 'tabs', $index );

						$this->add_render_attribute( $tab_title_setting_key, [
							'class' 			=> [  $index == 0 ? 'active show' : '' ],
							'data-toggle' 	=> 'tab',
							'href'			=> '#' . $_random .'-'. $index
						] );
						?>
						<li class="elementor-repeater-item-<?php echo esc_attr($item['_id']) ?>">
							<a <?php echo $this->get_render_attribute_string( $tab_title_setting_key ); ?>>
								<span><?php echo $item['tab_title']; ?></span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
				

				<div class="tab-content clearfix">
					<?php foreach ( $tabs as $index => $item ) :
						$tab_count = $index + 1;

						$tab_content_setting_key = $this->get_repeater_setting_key( 'tab_content', 'tabs', $index );
						$tab_content_setting_text_key = $this->get_repeater_setting_key( 'tab_content', 'tabs_text', $index );
						
						$image = $item['tab_image']['url']; 

						$this->add_render_attribute( $tab_content_setting_key, [
							'class' 				=> ['tab-pane fade in', $index == 0 ? 'active show' : '' ],
							'role'				=> 'tabpanel',
							'id' 					=> $_random .'-'. $index,
						] );

						$this->add_render_attribute( $tab_content_setting_text_key, [
							'class' 	=> ['tab-content-item', $image ? 'has_image' : 'no_image' ],
						] );

						$this->add_inline_editing_attributes( $tab_content_setting_text_key, 'advanced' );
						?>
						<div <?php echo $this->get_render_attribute_string( $tab_content_setting_key ); ?>>
							<?php if($image){ ?>
								<div class="tab-image">
									<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($item['tab_title']) ?>" />
								</div> 
							<?php } ?>
							<div <?php echo $this->get_render_attribute_string( $tab_content_setting_text_key ); ?>>
								<?php echo $this->parse_text_editor( $item['tab_content'] ); ?>
							</div>
						</div>
					
					<?php endforeach; ?>
				</div>
			</div>	
		</div>

		<?php
	}

}

