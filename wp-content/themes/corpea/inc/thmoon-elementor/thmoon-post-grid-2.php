<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; # Exit if accessed directly

class Themesmoon_Widget_Posts_Grid_2 extends Widget_Base {

	public function get_name() {
		return 'thmoon-posts-grid-2';
	}

	public function get_title() {
		return __( 'Themesmoon Posts Grid 2', 'corpea' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'themesmoon-elementor' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
            'woo_product',
            [
                'label' 	=> __( 'Post Element', 'corpea' )
            ]
        );
		$this->add_control(
		  'post_number',
		  [
		    'label'         => __( 'Number of Posts', 'corpea' ),
            'type'          => Controls_Manager::NUMBER,
            'label_block'   => true,
            'default'       => __( '9', 'corpea' ),

		  ]
		);
		$this->add_control(
            'post_column',
            [
                'label'     => __( 'Number of Column', 'corpea' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 4,
                'options'   => [
                        '12' 	=> __( 'One Column', 'corpea' ),
                        '6' 	=> __( 'Two Column', 'corpea' ),
                        '4' 	=> __( 'Three Column', 'corpea' ),
                        '3' 	=> __( 'Four Column', 'corpea' ),
                    ],
            ]
        );
        $this->add_control(
          'post_cat',
          [
             'label'    => __( 'Product Category', 'corpea' ),
             'type'     => Controls_Manager::SELECT,
             'options'  => corpea_all_category_list( 'category' ),
             'multiple' => true,
             'default'  => 'allpost'
          ]
        );
        $this->add_control(
            'post_order_by',
            [
                'label'     => __( 'Order', 'corpea' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'DESC',
                'options'   => [
                        'DESC' 		=> __( 'Descending', 'corpea' ),
                        'ASC' 		=> __( 'Ascending', 'corpea' ),
                    ],
            ]
        );
        $this->add_control(
		  'textlimit',
		  [
		    'label'         => __( 'Text Limit Of Content', 'corpea' ),
            'type'          => Controls_Manager::NUMBER,
            'label_block'   => true,
            'default'       => 280,
		  ]
		); 
        $this->add_control(
			'post_pagination',
			[
				'label' 		=> __( 'Post Pagination', 'corpea' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'default' 		=> 'No',
				'label_on' 		=> __( 'Yes', 'corpea' ),
				'label_off' 	=> __( 'No', 'corpea' ),
				'selectors' 	=> [
					'{{WRAPPER}} iframe' => 'pointer-events: none;',
				],
			]
		);


        $this->end_controls_section();


        # Title Section
		$this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> __( 'Title', 'corpea' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'corpea' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .blog-post-item-col .corpea-index-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Title Color', 'corpea' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
				    	'type' => Scheme_Color::get_type(),
				    	'value' => Scheme_Color::COLOR_1,
					],
				'selectors' => [
					'{{WRAPPER}} .corpea-post .content-item-title a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography',
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .corpea-post .content-item-title a',
			]
		);
		$this->end_controls_section();
		# Title Section End

		#Pagination Section
		$this->start_controls_section(
			'section_pagination_style',
			[
				'label' 	=> __( 'Pagination', 'corpea' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
            'post_align',
            [
                'label'     => __( 'Alignment', 'corpea' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'      => [
                        'title' => __( 'Left', 'corpea' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center'    => [
                        'title' => __( 'Center', 'corpea' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'     => [
                        'title' => __( 'Right', 'corpea' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                    'justify'   => [
                        'title' => __( 'Justified', 'corpea' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'default'   => 'center',
                'selectors' => [
                    '{{WRAPPER}} .themesmoon-pagination' => 'text-align: {{VALUE}}; display: inline-block; width: 100%;',
                ],
            ]
        );
        $this->end_controls_section();

		#Subtitle Section
		$this->start_controls_section(
			'section_price_style',
			[
				'label' 	=> __( 'Subtitle', 'corpea' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' 	=> __( 'Content Color', 'corpea' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
				    	'type' => Scheme_Color::get_type(),
				    	'value' => Scheme_Color::COLOR_2,
					],
				'selectors' => [
					'{{WRAPPER}} .corpea-post .grid-data-excerpt' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography2',
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_2,
				'selector' 	=> '{{WRAPPER}} .corpea-post .grid-data-excerpt',
			]
		);
	} # function _register_controls end

	protected function render( ) {

		$settings 			= $this->get_settings();
		$post_number 		= $settings['post_number'];
		$post_column 		= $settings['post_column'];
		$post_cat 			= $settings['post_cat'];
		$post_order_by 		= $settings['post_order_by'];
		$post_pagination 	= $settings['post_pagination'];
		$textlimit			= $settings['textlimit'];
		$page_numb 			= max( 1, get_query_var('paged') );


		//Query Build
		$arg = array(
				'post_type'   =>  'post',
				'post_status' => 'publish',
			);
		if( $post_order_by ){
			$arg['order'] = $post_order_by;
		}
		if( $page_numb ){
			$arg['paged'] = $page_numb;
		}
		if( $post_number ){
			$arg['posts_per_page'] = $post_number;
		}
		if( $post_cat ){
			if( $post_cat != 'allpost' ){
				$cat_data = array();
				$cat_data['relation'] = 'AND';
				$cat_data[] = array(
						'taxonomy' 	=> 'category',
			          	'field' 	=> 'slug',
			          	'terms' 	=> $post_cat
					);
				$arg['tax_query'] = $cat_data;
			}
		}

		$data = new \WP_Query( $arg );
	?>
		

		<div class="row blog-grid-two">
			<?php if ( $data->have_posts() ) : ?>
		        <?php while ( $data->have_posts() ) : $data->the_post();
		        $permalink 	= get_permalink();
				$title 		= get_the_title();
				$media_url 	= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "corpea-large" );
				$media_url  = ( isset( $media_url[0] ) ) ? $media_url[0] : '';
		        ?>	
				<div class="blog-post-item-col col-<?php echo $post_column; ?>">
				    <article class="corpea-post corpea-single-post corpea-index-post grid2">
				    	<?php if ( has_post_thumbnail() ){ ?>
					        <div class="blog-details-img">
					            <a href="<?php echo esc_url($permalink); ?>">
					            	<?php the_post_thumbnail('corpea-large', array('class' => 'img-fluid')); ?>
					            </a>
					        </div>
				        <?php } ?>
				        <div class="corpea-blog-title grid2 clearfix">
				            <h2 class="content-item-title">
				                <a href="<?php echo esc_url($permalink); ?>"><?php the_title(); ?></a>
				            </h2>
				            <ul class="blog-post-meta clearfix">
				                <li>
				                    <div class="blog-date-wrapper">
				                        <a href="<?php echo esc_url($permalink); ?>"><time datetime="<?php echo get_the_date('Y-m-d') ?>"><?php echo get_the_date(); ?></time></a>
				                    </div>
				                </li>
				                <li class="meta-category">
				                    <?php printf(esc_html__('in #%s', 'corpea'), get_the_category_list(', ')); ?>
				                </li>
				            </ul>
				            <div class="entry-blog">
				                <div class="entry-summary grid2 clearfix">
				                    
				                    <div class="grid-data-excerpt"><?php echo themesmoon_the_excerpt_max_charlength( $textlimit ); ?>.....</div>
				                    
				                    <div class="data-author">
					                    <?php echo get_avatar( get_the_author_meta( 'email' ), 40 ); ?>
					                    <?php esc_html_e('  By ', 'corpea') ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('display_name'); ?></a>
				                    </div>
									
									<div class="data-comments">
										<i class="fa fa-comment"></i> <?php comments_number( 'No Comments', 'one Comment', '% Comments' ); ?>
									</div>
				                    
					            </div>
					        </div>
					    </div>
				    </article>
				</div>
		        <?php endwhile; ?>
		        <div class="col-12">
			        <?php
				        if( $post_pagination == 'yes' ){
				        	$max_page = $data->max_num_pages;
				        	echo themesmoon_pagination( $page_numb, $max_page ); 
				        }
			        ?>
		        </div>
		        <?php wp_reset_query(); ?>
		    <?php endif; ?>
		</div>


	<?php }
	protected function _content_template() { }
}

Plugin::instance()->widgets_manager->register_widget_type( new Themesmoon_Widget_Posts_Grid_2() );