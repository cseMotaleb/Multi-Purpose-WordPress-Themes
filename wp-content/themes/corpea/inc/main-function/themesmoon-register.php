<?php
/*-------------------------------------------*
 *      Themesmoon Style
 *------------------------------------------*/
if(!function_exists('corpea_style')):

    function corpea_style(){
        global $themesmoon_options;
        // CSS
        wp_enqueue_style( 'bootstrap.min.css', corpea_CSS . 'bootstrap.min.css',false,'all');
        wp_enqueue_style( 'magnific.popup.css', corpea_CSS . 'magnific-popup.css',false,'all');
        wp_enqueue_style( 'theme.defaul.css', corpea_CSS . 'owl.theme.default.min.css',false,'all');
        wp_enqueue_style( 'owl.carousel.min.css', corpea_CSS . 'owl.carousel.min.css',false,'all');
        wp_enqueue_style( 'animate.css', corpea_CSS . 'animate.css',false,'all');
        wp_enqueue_style( 'fontawesome.css', corpea_CSS . 'fontawesome-all.min.css',false,'all');
        wp_enqueue_style( 'prettyPhoto.css', corpea_CSS . 'prettyPhoto.css',false,'all');
        wp_enqueue_style( 'nice.css', corpea_CSS . 'nice-select.css',false,'all');
        wp_enqueue_style( 'screen.css', corpea_CSS . 'screen.css',false,'all');
        wp_enqueue_style( 'style.css', corpea_CSS . 'style.css',false,'all');
        wp_enqueue_style( 'responsive.css', corpea_CSS . 'responsive.css',false,'all');
       ;
       
        // JS
        wp_enqueue_script('main-tether','https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js',array(),false,true);
        wp_enqueue_script('popper.js',corpea_JS.'popper.min.js',array(),false,true);
        wp_enqueue_script('bootstrap.js',corpea_JS.'bootstrap.min.js',array(),false,true);
        wp_enqueue_script('megamenu.main.js',corpea_JS.'megamenu.main.js',array(),false,true);
        wp_enqueue_script('wow.min.js',corpea_JS.'wow.min.js',array(),false,true);
        wp_enqueue_script('nice-select.js',corpea_JS.'nice-select.js',array(),false,true);
        wp_enqueue_script('isotope.pkgd.min.js',corpea_JS.'isotope.pkgd.min.js',array(),false,true);
        wp_enqueue_script('magnific.popup.js',corpea_JS.'magnific.popup.js',array(),false,true);
        wp_enqueue_script('scrollUp.min.js',corpea_JS.'jquery.scrollUp.min.js',array(),false,true);
        wp_enqueue_script('carousel.min.js',corpea_JS.'owl.carousel.min.js',array(),false,true);
        wp_enqueue_script('imagesloaded.pkgd',corpea_JS.'imagesloaded.pkgd.min.js',array(),false,true);
        wp_enqueue_script('waypoints.js',corpea_JS.'waypoints.min.js',array(),false,true);
        wp_enqueue_script('counterup.js',corpea_JS.'jquery.counterup.min.js',array(),false,true);
        /*wp_enqueue_script('map.js',corpea_JS.'map.js',array(),false,true);*/
        wp_enqueue_script('slick.js',corpea_JS.'slick.min.js',array(),false,true);
        wp_enqueue_script('prettyPhoto.js',corpea_JS.'jquery.prettyPhoto.js',array(),false,true);
        wp_enqueue_script('prettySocial.js',corpea_JS.'jquery.prettySocial.min.js',array(),false,true);
        wp_enqueue_script('widgetjs.js',corpea_JS.'widget-js.js',array(),false,true);
        wp_enqueue_script('countdown.js',corpea_JS.'jquery.countdown.min.js',array(),false,true);

        wp_enqueue_media();
        if( isset($themesmoon_options['custom-preset-en']) && $themesmoon_options['custom-preset-en']==0 ) {
            wp_enqueue_style( 'themeum-preset', get_template_directory_uri(). '/css/presets/preset' . $themesmoon_options['preset'] . '.css', array(),false,'all' );       
        }else {
            wp_enqueue_style('quick-preset',get_template_directory_uri().'/quick-preset.php',array(),false,'all');
        }
        wp_enqueue_style('quick-preset',get_template_directory_uri().'/quick-preset.php',array(),false,'all');
        wp_enqueue_style('quick-style',get_template_directory_uri().'/quick-style.php',array(),false,'all');
        // Single Comments
        if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); }

        wp_enqueue_script('corpea-main',corpea_JS.'main.js',array(),false,true);
    }
    add_action('wp_enqueue_scripts','corpea_style');

endif;

 


/*-------------------------------------------------------
*           Include the TGM Plugin Activation class
*-------------------------------------------------------*/

require_once( get_template_directory()  . '/inc/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'Themesmoon_plugins_include');

if(!function_exists('Themesmoon_plugins_include')):

    function Themesmoon_plugins_include()
    {
        $plugins = array(

                array(
                    'name'                  => 'Themeum Core',
                    'slug'                  => 'themeum-core',
                    'source'                => get_stylesheet_directory() . '/inc/plugins/themeum-core.zip',
                    'required'              => true,
                    'version'               => '',
                    'force_activation'      => false,
                    'force_deactivation'    => false,
                    'external_url'          => '',
                ), 
                array(
                    'name'                  => esc_html__( 'Elementor', 'corpea' ),
                    'slug'                  => 'elementor',
                    'required'              => true,
                    'version'               => '',
                    'force_activation'      => false,
                    'force_deactivation'    => false,
                    'external_url'          => esc_url('https://downloads.wordpress.org/plugin/elementor.1.6.2.zip'),
                ),      
                array(
                    'name'                  => 'revslider',
                    'slug'                  => 'revslider',
                    'source'                => get_stylesheet_directory() . '/inc/plugins/revslider.zip',
                    'required'              => true,
                    'version'               => '',
                    'force_activation'      => false,
                    'force_deactivation'    => false,
                    'external_url'          => '',
                ),                         
                                                   
                array(
                    'name'                  => 'Social Count Plus',
                    'slug'                  => 'social-count-plus',
                    'source'                => 'https://downloads.wordpress.org/plugin/social-count-plus.3.3.2.zip',
                    'required'              => false,
                    'version'               => '',
                    'force_activation'      => true,
                    'force_deactivation'    => true,
                    'external_url'          => '',
                ),
                array(
                    'name'                  => 'Contact Form7 Widget For Elementor Page Builder',
                    'slug'                  => 'cf7-widget-elementor',
                    'required'              => false,
                    'version'               => '',
                    'force_activation'      => false,
                    'force_deactivation'    => false,
                    'external_url'          => 'https://downloads.wordpress.org/plugin/mailchimp-for-wp.4.5.1.zip',
                ),     
                array(
                    'name'                  => 'MailChimp for WordPress',
                    'slug'                  => 'mailchimp-for-wp',
                    'required'              => false,
                    'version'               => '',
                    'force_activation'      => false,
                    'force_deactivation'    => false,
                    'external_url'          => 'https://downloads.wordpress.org/plugin/mailchimp-for-wp.3.1.2.zip',
                ),                                 
                array(
                    'name'                  => 'Woocoomerce',
                    'slug'                  => 'woocommerce',
                    'required'              => false,
                    'version'               => '',
                    'force_activation'      => false,
                    'force_deactivation'    => false,
                    'external_url'          => 'https://downloads.wordpress.org/plugin/woocommerce.3.0.4.zip', 
                ),  
                array(
                    'name'                  => 'Contact Form 7',
                    'slug'                  => 'contact-form-7',
                    'required'              => false,
                    'version'               => '',
                    'force_activation'      => false,
                    'force_deactivation'    => false,
                    'external_url'          => 'https://downloads.wordpress.org/plugin/contact-form-7.4.3.1.zip',
                ),
                array(
                    'name'                  => 'Widget Importer Exporter',
                    'slug'                  => 'widget-importer-exporter',
                    'required'              => false,
                    'version'               => '',
                    'force_activation'      => false,
                    'force_deactivation'    => false,
                    'external_url'          => 'https://downloads.wordpress.org/plugin/widget-importer-exporter.1.4.5.zip',
                ),                

                    );
            $config = array(
                    'domain'            => 'corpea',           // Text domain - likely want to be the same as your theme.
                    'default_path'      => '',                           // Default absolute path to pre-packaged plugins
                    'parent_menu_slug'  => 'themes.php',                 // Default parent menu slug
                    'parent_url_slug'   => 'themes.php',                 // Default parent URL slug
                    'menu'              => 'install-required-plugins',   // Menu slug
                    'has_notices'       => true,                         // Show admin notices or not
                    'is_automatic'      => false,                        // Automatically activate plugins after installation or not
                    'message'           => '',                           // Message to output right before the plugins table
                    'strings'           => array(
                                'page_title'                                => esc_html__( 'Install Required Plugins', 'corpea' ),
                                'menu_title'                                => esc_html__( 'Install Plugins', 'corpea' ),
                                'installing'                                => esc_html__( 'Installing Plugin: %s', 'corpea' ), // %1$s = plugin name
                                'oops'                                      => esc_html__( 'Something went wrong with the plugin API.', 'corpea'),
                                'return'                                    => esc_html__( 'Return to Required Plugins Installer', 'corpea'),
                                'plugin_activated'                          => esc_html__( 'Plugin activated successfully.','corpea'),
                                'complete'                                  => esc_html__( 'All plugins installed and activated successfully. %s', 'corpea' ) // %1$s = dashboard link
                        )
            );

            tgmpa( $plugins, $config );

            }

endif;