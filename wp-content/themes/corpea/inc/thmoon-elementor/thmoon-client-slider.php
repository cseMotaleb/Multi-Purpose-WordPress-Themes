<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Elementor_Widget_Test extends \Elementor\Widget_Base {

	public function get_name() {
		return 'thmoon-client-slider';
	}

	public function get_title() {
		return __( 'client-slider', 'corpea' );
	}
	public function get_categories() {
		return [ 'themesmoon-elementor' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'corpea' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'corpea' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'corpea' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'List Content' , 'corpea' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'list_color',
			[
				'label' => __( 'Color', 'corpea' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'corpea' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Title #1', 'corpea' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'corpea' ),
					],
					[
						'list_title' => __( 'Title #2', 'corpea' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'corpea' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( $settings['list'] ) {
			echo '<dl>';
			foreach (  $settings['list'] as $item ) {
				echo '<dt class="elementor-repeater-item-' . $item['_id'] . '">' . $item['list_title'] . '</dt>';
				echo '<dd>' . $item['list_content'] . '</dd>';
			}
			echo '</dl>';
		}
	}

	protected function _content_template() {
		?>
		<# if ( settings.list.length ) { #>
		<dl>
			<# _.each( settings.list, function( item ) { #>
				<dt class="elementor-repeater-item-{{ item._id }}">{{{ item.list_title }}}</dt>
				<dd>{{{ item.list_content }}}</dd>
			<# }); #>
			</dl>
		<# } #>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Elementor_Widget_Test() );