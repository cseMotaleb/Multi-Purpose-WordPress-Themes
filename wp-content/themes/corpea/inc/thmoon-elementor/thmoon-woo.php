<?php

namespace Elementor;

class corpea_widget_products extends Widget_Base {

	public function get_categories() {
		return array( 'themesmoon-elementor' );
	}

	public function get_name() {
		return 'products';
	}

	public function get_title() {
		return esc_html__( 'Woo - Products', 'corpea' );
	}

	public function get_icon() {
		return 'eicon-woocommerce';
	}

	protected function _register_controls() {
		$this->sectionGeneral();
		$this->sectionQuery();
		$this->sectionPagination();
	}

	private function sectionGeneral() {
		$this->start_controls_section(
			'product_content',
			array(
				'label' => esc_html__( 'General', 'corpea' ),
			)
		);

		$this->add_control(
			'col',
			array(
				'type'    => Controls_Manager::SELECT,
				'label'   => esc_html__( 'Columns', 'corpea' ),
				'default' => 4,
				'options' => array(
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
					5 => 5,
					6 => 6,
				),
			)
		);

		$this->add_control(
			'pro_pagi',
			array(
				'type'         => Controls_Manager::SWITCHER,
				'label'        => esc_html__( 'Pagination', 'corpea' ),
				'default'      => '',
				'label_on'     => esc_html__( 'Yes', 'corpea' ),
				'label_off'    => esc_html__( 'No', 'corpea' ),
				'return_value' => 'yes',
			)
		);

		$this->end_controls_section();
	}

	private function sectionQuery() {
		$this->start_controls_section(
			'product_query',
			array(
				'label' => esc_html__( 'Query', 'corpea' ),
			)
		);

		$this->add_control(
			'product_cat',
			array(
				'label'     => esc_html__( 'Categories', 'corpea' ),
				'type'      => Controls_Manager::SELECT2,
				'options'   => corpea_get_narrow_data( 'term', 'product_cat' ),
				'multiple'  => true,
			)
		);

		$this->add_control(
			'pro_exclude',
			array(
				'label'     => esc_html__( 'Exclude product', 'corpea' ),
				'type'      => Controls_Manager::SELECT2,
				'options'   => corpea_get_narrow_data( 'post', 'product' ),
				'multiple'  => true,
			)
		);

		$this->add_control(
			'count',
			array(
				'label'     => esc_html__( 'Posts Per Page', 'corpea' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 6,
				'min'       => 1,
				'max'       => 100,
				'step'      => 1,
			)
		);

		$this->add_control(
			'order_by',
			array(
				'label'     => esc_html__( 'Order By', 'corpea' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'id',
				'options'   => array(
					'id'   => esc_html__( 'ID', 'corpea' ),
					'name' => esc_html__( 'Name', 'corpea' ),
					'date' => esc_html__( 'Date', 'corpea' ),
					'rand' => esc_html__( 'Random', 'corpea' ),
				),
			)
		);

		$this->add_control(
			'order',
			array(
				'label'     => esc_html__( 'Order', 'corpea' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'ASC',
				'options'   => array(
					'ASC'   => esc_html__( 'ASC', 'corpea' ),
					'DESC'  => esc_html__( 'DESC', 'corpea' ),
				),
			)
		);

		$this->end_controls_section();
	}

	private function sectionPagination() {
		$this->start_controls_section(
			'pro_pagi_section',
			array(
				'label'     => esc_html__( 'Pagination', 'corpea' ),
				'condition' => array(
					'pro_pagi' => 'yes',
				),
			)
		);

		$this->add_responsive_control(
			'pagi_position',
			array(
				'type'    => Controls_Manager::CHOOSE,
				'label'   => esc_html__( 'Alignment', 'corpea' ),
				'options' => array(
					'left' => array(
						'title' => esc_html__( 'Left', 'corpea' ),
						'icon'  => 'fa fa-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'corpea' ),
						'icon'  => 'fa fa-align-center',
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'corpea' ),
						'icon'  => 'fa fa-align-right',
					),
				),
				'default'        => 'center',
				'tablet_default' => 'center',
				'mobile_default' => 'center',
				'selectors'      => array(
					'{{WRAPPER}} .ht-pagination' => 'text-align: {{VALUE}};',
				),
			)
		);

		$this->add_responsive_control(
			'pagi_space',
			array(
				'type'       => Controls_Manager::DIMENSIONS,
				'label'      => esc_html__( 'Space', 'corpea' ),
				'size_units' => array( 'px', 'em' ),
				'default'    => array(
					'top'      => '30',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px',
					'isLinked' => false,
				),
				'tablet_default' => array(
					'top'      => '20',
					'right'    => '0',
					'bottom'   => '20',
					'left'     => '0',
					'unit'     => 'px',
					'isLinked' => false,
				),
				'mobile_default' => array(
					'top'      => '15',
					'right'    => '0',
					'bottom'   => '15',
					'left'     => '0',
					'unit'     => 'px',
					'isLinked' => false,
				),
				'selectors' => array(
					'{{WRAPPER}} .ht-pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$cat_id   = $settings['product_cat'];
		$paged    = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$args     = array(
			'post_type'      => 'product',
			'post_status'    => 'publish',
			'post__not_in'   => $settings['pro_exclude'],
			'posts_per_page' => $settings['count'],
			'orderby'        => $settings['order_by'],
			'order'          => $settings['order'],
			'paged'          => $paged,
		);

		if ( ! empty( $cat_id ) ) :
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'term_id',
					'terms'    => $cat_id,
				),
			);
		endif;

		$products_query = new \WP_Query( $args );
		if ( ! $products_query->have_posts() ) {
			return;
        }

		?>
		<div class="corpea-widget-products">
			
		<?php
				global $woocommerce_loop;

				$woocommerce_loop['columns'] = (int) $settings['col'];

				woocommerce_product_loop_start();

		while ( $products_query->have_posts() ) :
			$products_query->the_post();
			//fw_print( get_the_title() );
			wc_get_template_part( 'content', 'product' );
				endwhile;

				woocommerce_product_loop_end();

				woocommerce_reset_loop();

		if ( 'yes' == $settings['pro_pagi'] ) {
			corpea_paging( $products_query );
		}

				wp_reset_postdata();
			?>
		</div>
		
		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new corpea_widget_products() );
