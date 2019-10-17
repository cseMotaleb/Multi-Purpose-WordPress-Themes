<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function eae_elementor_init(){
    Elementor\Plugin::instance()->elements_manager->add_category(
        'themesmoon-elementor',
        [
            'title'  => 'Corpea Elements',
            'icon' => 'apps'
        ],
        0
    );
}
add_action('elementor/init','eae_elementor_init');

function corpea_all_category_list( $cat ){
    $data = array();
    $data['allpost'] = 'All Category';
    $query1 = get_terms( $cat );
    if( $query1 ){
        foreach ( $query1 as $post ) {
            if( isset($data[ $post->slug ]) ){
               $data[ $post->slug ] = $post->name; 
            }
        }
    }
    return $data;
}
function add_new_elements(){
  require_once plugin_dir_path( __FILE__ ).'thmoon-title.php';
  require_once plugin_dir_path( __FILE__ ).'thmoon-button.php';
  require_once plugin_dir_path( __FILE__ ).'thmoon-counter.php';
  require_once plugin_dir_path( __FILE__ ).'thmoon-testimonial.php';
  require_once plugin_dir_path( __FILE__ ).'thmoon-slider-2.php';
  require_once plugin_dir_path( __FILE__ ).'thmoon-about.php';

  /*require_once plugin_dir_path( __FILE__ ).'thmoon-woo.php';*/
 
require_once plugin_dir_path( __FILE__ ).'thmoon-post-grid.php';
require_once plugin_dir_path( __FILE__ ).'thmoon-post-grid-2.php';
  /*require_once plugin_dir_path( __FILE__ ).'thmoon-client-slider.php';

   require_once plugin_dir_path( __FILE__ ).'thmoon-post-grid-2.php';
   require_once plugin_dir_path( __FILE__ ).'thmoon-hire-button.php';
   
*/

/* require_once plugin_dir_path( __FILE__ ).'thmoon-gmap.php';*/
  require_once plugin_dir_path( __FILE__ ).'thmoon-portfolio.php';
  require_once plugin_dir_path( __FILE__ ).'thmoon-team.php';
  require_once plugin_dir_path( __FILE__ ).'thmoon-feature-box.php';
  require_once plugin_dir_path( __FILE__ ).'thmoon-pricing.php';
  require_once plugin_dir_path( __FILE__ ).'thmoon-tabs.php';
}
add_action('elementor/widgets/widgets_registered','add_new_elements');