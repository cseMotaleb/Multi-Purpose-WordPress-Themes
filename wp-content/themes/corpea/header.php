<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage corpea
 * @since 1.0.0
 */

global $themesmoon_options;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- PLACE FAVICON ICON--> 
     <?php  if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
      if(isset($themesmoon_options['favicon'])){  ?>
        <link rel="shortcut icon" href="<?php echo esc_url($themesmoon_options['favicon']['url']); ?>" type="image/x-icon"/>
      <?php }else{ ?> 
        <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri().'/images/plus.png'); ?>" type="image/x-icon"/>
      <?php }
    }
    ?> 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    
    <?php wp_head(); ?>
  </head>
  <?php 

     if ( isset($themesmoon_options['boxfull-en']) ) {
      $layout = esc_attr($themesmoon_options['boxfull-en']);
     }else{
        $layout = 'fullwidth';
     }
 ?>

<body <?php body_class( $layout.'-bg' ); ?>> 
  <div id="page" class="hfeed site <?php echo esc_attr($layout); ?>">
  <?php 
    $headerlayout = '';
    if (isset( $_REQUEST['header-demo'])) {
      $headerlayout = esc_attr($_REQUEST['header-demo']);
      
    }else {
      if ( isset($themesmoon_options['header-layout']) ) { 
        $headerlayout = esc_attr($themesmoon_options['header-layout']);

      }
    }
  ?> 
    <!--SATART PRELOADER-->
    <div class="preloader">
      <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
      </div>
    </div>
    <!--END PRELOADER-->
   <!-- SATART HEADER AREA-->
    <header>
      <!-- START TOPBAR AREEA -->
      <div class="topbar">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-4">
              <div class="single_topbar hidden">
                  <i class="fas fa-map-marker-alt"></i>
                <p><?php echo balanceTags($themesmoon_options['Top-Header-address']); ?></p>
                
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-6">
              <div class="single_topbar">
               <i class="fas fa-envelope-open"></i>
                <p><?php echo balanceTags($themesmoon_options['top-header-email']); ?></p>
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-6 text-left bt-left">
              <div class="single_topbar">
                <i class="fas fa-phone"></i>
                <p><?php echo balanceTags($themesmoon_options['top-header-number']); ?> </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--END  TOPBAR AREA-->
      <!--SATART MAIN HEADER-->
      <div class="header-section transparent pin-style">
        <div class="container">
          <div class="mod-menu">
            <div class="row">
              <!-- Logo -->
              <div class="col-sm-2">
            <div class="logo sty-one">
                <a  href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
                                <?php
                                    if (isset($themesmoon_options['logo']))
                                   {
                                        
                                        if($themesmoon_options['logo-text-en']) { ?>
                                            <h1 class="site-title"> <?php echo esc_html($themesmoon_options['logo-text']); ?> </h1>
                                        <?php }
                                        else
                                        {
                                            if(!empty($themesmoon_options['logo'])) {
                                            ?>
                                                <img class="enter-logo img-responsive" src="<?php echo esc_url($themesmoon_options['logo']['url']); ?>" alt="Logo" title="Logo">
                                            <?php
                                            }else{
                                                echo esc_html(get_bloginfo('name'));
                                            }
                                        }
                                   }
                                    else
                                   {
                                        echo esc_html(get_bloginfo('name'));
                                   }
                                ?>
                             </a>
                           </div>
         

              </div>
              <!-- End Logo -->
              <div class="col-sm-10">
                <div class="main-nav">
                  <ul class="nav navbar-nav top-nav">
                    <!-- Cart -->
                    <li class="cart-parent">
                      <a href="javascript:void(0)" title=""><i aria-hidden="true" class="fa fa-shopping-cart"></i><span class="number">2</span></a>
                      <div class="cart-box">
                        <div class="content">
                          <div class="row">
                            <div class="col-xs-8">2 item(s)</div>
                            <div class="col-xs-4 text-right"><span>$98</span></div>
                          </div>
                          <ul>
                            <li><img src="<?php echo get_template_directory_uri(); ?>/img/cart-1.jpg" alt="">Fashion Hat <span>$49</span> <a href="#" title="" class="close-btn">x</a></li>
                            <li><img src="<?php echo get_template_directory_uri(); ?>/img/cart-2.jpg" alt="">Fashion Hat <span>$49</span> <a href="#" title="" class="close-btn">x</a></li>
                          </ul>
                          <div class="row">
                            <div class="col-xs-6"><a href="#" title="View Cart" class="btn btn-block btn-warning">View Cart</a></div>
                            <div class="col-xs-6"><a href="#" title="Check out" class="btn btn-block btn-primary">Check out</a></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <!-- End Cart --> 
                    <!--start Search -->
                    <li class="search-parent">
                      <a href="javascript:void(0)" title=""><i aria-hidden="true" class="fa fa-search"></i></a>
                      <div class="search-box">
                        <div class="content">
                          <div class="form-control">
                            <?php echo get_search_form();?>
                           
                          </div>
                          <a href="#" class="close-btn">x</a> 
                        </div>
                      </div>
                    </li>
                    <!-- End Search -->
                    <!--Mobile nav icon-->
                    <li class="visible-xs menu-icon"><a href="javascript:void(0)" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false"> <i aria-hidden="true" class="fa fa-bars"></i></a></li>
                    <!--End Mobile nav icon-->
                  </ul>
                  <!--Start Main Nav-->
                  <div id="menu" class="collapse">
                    <?php 
                        wp_nav_menu(  
                            array(
                              'theme_location' => 'primary',
                              'container'   => '', 
                              'menu_class'   => 'nav navbar-nav',
                              'fallback_cb' => 'wp_page_menu',
                              'depth'     => 4,
                              'walker'     => new Megamenu_Walker()
                              )
                        ); 
                    ?>  
                 
                  </div>

                  <!-- End Main Nav --> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--SATART MAIN HEADER-->
    </header>
    