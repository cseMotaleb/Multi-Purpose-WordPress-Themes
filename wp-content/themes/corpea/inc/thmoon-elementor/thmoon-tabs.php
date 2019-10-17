<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Themesmoon_Tabs extends Widget_Base {

	public function get_name() {
		return 'tabs';
	}

	public function get_title() {
		return __( 'Themesmoon Tabs', 'corpea' );
	}

	public function get_icon() {
		return 'eicon-tabs';
	}

	public function get_categories() {
		return [ 'themesmoon-elementor' ];
	}

	protected function _register_controls() {




		$this->start_controls_section(
			'section_tabs',
			[
				'label' => __( 'Tabs', 'corpea' ),
			]
		);
		$this->add_control(
			'type',
			[
				'label' 			=> __( 'Type', 'corpea' ),
				'type' 				=> Controls_Manager::SELECT,
				'default' 			=> 'horizontal',
				'options' 			=> [
					'horizontal' 	=> __( 'Horizontal', 'corpea' ),
					'vertical' 		=> __( 'Vertical', 'corpea' ),
				],
				'prefix_class' 		=> 'elementor-tabs-view-',
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' 				=> __( 'Tabs Items', 'corpea' ),
				'type' 					=> Controls_Manager::REPEATER,
				'default' 				=> [
					[
						'tab_title' 	=> __( 'Tab #1', 'corpea' ),
						'tab_content' 	=> __( 'I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'corpea' ),
					],
					[
						'tab_title' 	=> __( 'Tab #2', 'corpea' ),
						'tab_content' 	=> __( 'I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'corpea' ),
					],
				],
				'fields' => [
					[
						'name' 			=> 'icon',
						'label' 		=> __( 'Icon', 'corpea' ),
						'type' 			=> Controls_Manager::ICON,
						'label_block' 	=> true,
						'default' 		=> '',
					],
					[
						'name' 			=> 'tab_title',
						'label' 		=> __( 'Title & Content', 'corpea' ),
						'type' 			=> Controls_Manager::TEXT,
						'default' 		=> __( 'Tab Title', 'corpea' ),
						'placeholder' 	=> __( 'Tab Title', 'corpea' ),
						'label_block' 	=> true,
					],
					[
						'name' 			=> 'tab_content',
						'label' 		=> __( 'Content', 'corpea' ),
						'default' 		=> __( 'Tab Content', 'corpea' ),
						'placeholder' 	=> __( 'Tab Content', 'corpea' ),
						'type' 			=> Controls_Manager::WYSIWYG,
						'show_label' 	=> false,
					],
				],
				'title_field' 			=> '{{{ tab_title }}}',
			]
		);
		$this->add_control(
			'view',
			[
				'label' 		=> __( 'View', 'corpea' ),
				'type' 			=> Controls_Manager::HIDDEN,
				'default' 		=> 'traditional',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
		$tabs = $this->get_settings( 'tabs' );
		?>
		<div class="elementor-tabs themeum-tabs" role="tablist">
			<?php
			$counter = 1; ?>
			<div class="elementor-tabs-wrapper themeum-nav-wrapper" role="tab">
				<?php foreach ( $tabs as $item ) : ?>
					<div class="elementor-tab-title elementor-tab-desktop-title" data-tab="<?php echo $counter; ?>">
						<div><?php if( $item['icon'] ){ echo '<i class="'.esc_attr( $item['icon'] ).'"></i>'; } ?></div>
						<?php echo $item['tab_title']; ?>
					</div>
				<?php
					$counter++;
				endforeach; ?>
			</div>

			<?php
			$counter = 1; ?>
			<div class="elementor-tabs-content-wrapper themeum-content-wrapper" role="tabpanel">
				<?php foreach ( $tabs as $item ) : ?>
					<div class="elementor-tab-title elementor-tab-mobile-title" data-tab="<?php echo $counter; ?>">
						<div><?php if( $item['icon'] ){ echo '<i class="'.esc_attr( $item['icon'] ).'"></i>'; } ?></div>
						<?php echo $item['tab_title']; ?>
					</div>
					<div class="elementor-tab-content elementor-clearfix" data-tab="<?php echo $counter; ?>"><?php echo $this->parse_text_editor( $item['tab_content'] ); ?></div>
				<?php
					$counter++;
				endforeach; ?>
			</div>
		</div>
		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Themesmoon_Tabs() );