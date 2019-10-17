<?php
header('Content-type: text/css');

$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $parse_uri[0].'wp-load.php';
require_once($wp_load);

global $themesmoon_options;

$output = '';

$headerbg = $themesmoon_options['header-bg'];
if(isset($headerbg)){
	$output .= '.header{ background: '.esc_attr($themesmoon_options['header-bg']) .'; }';
}


if(isset($themesmoon_options['footer-bg'])){
	$output .= '#footer{ background: '.esc_attr($themesmoon_options['footer-bg']) .'; }';
}

/* =============================================
* ===============  Quick Style =================
================================================*/
# Header ... 
if(isset($themesmoon_options['header_bg_color'])){
	$output .= '.newedge-topbar{ background: '.esc_attr($themesmoon_options['header_bg_color']) .'; }';
}

if(isset($themesmoon_options['header_text_color'])){
	$output .= '.top-right .top-align, .top-align >a { color: '.esc_attr($themesmoon_options['header_text_color']) .'; }';
	$output .= '.top-align >a{ border-left: 1px solid '.esc_attr($themesmoon_options['header_text_color']) .'; }';
	$output .= '.top-right >.top-align:last-child >a{ border-right: 1px solid '.esc_attr($themesmoon_options['header_text_color']) .'; }';
}
if(isset($themesmoon_options['header_border_color'])){
	$output .= '.top-align >a{ border-left: 1px solid '.esc_attr($themesmoon_options['header_border_color']) .'; }';
	$output .= '.top-right >.top-align:last-child >a{ border-right: 1px solid '.esc_attr($themesmoon_options['header_border_color']) .'; }';
	$output .= '.newedge-topbar { border-bottom: 1px solid '.esc_attr($themesmoon_options['header_border_color']) .'; }';
}
if(isset($themesmoon_options['header_text_hover_color'])){
	$output .= '.top-align >a:hover { color: '.esc_attr($themesmoon_options['header_text_hover_color']) .'; }';
}
if( $themesmoon_options['logo-width'] ){
    $output .= '.logo-wrapper img{ width: '. (int) esc_attr( $themesmoon_options['logo-width']) .'px; }';
}  
if( $themesmoon_options['logo-height'] ){
    $output .= '.logo-wrapper img{ height: '. (int) esc_attr( $themesmoon_options['logo-height'] ) .'px; }';
} 
// Header end..

# Supper menu.
if(isset($themesmoon_options['menu_bg'])){
	$output .= '.site-header, .primary .suppaMenu, #main-menu{ background: '.esc_attr($themesmoon_options['menu_bg']) .' !important; }';
}
if(isset($themesmoon_options['menu_font_color'])){
	$output .= '#main-menu .primary .suppaMenu .suppa_menu a .suppa_item_title, .primary .suppa_menu .suppa_top_level_link.current-menu-item .era_suppa_arrow_box span, .primary .suppa_top_level_link .ctf_suppa_fa_box_top_arrow,#main-menu .nav>li>a{ color: '.esc_attr($themesmoon_options['menu_font_color']) .' !important; }';
}
if(isset($themesmoon_options['menu-hover-color'])){
	$output .= '#main-menu .primary .suppaMenu .suppa_menu a .suppa_item_title:hover,#main-menu .nav>li>a:hover{ color: '.esc_attr($themesmoon_options['menu-hover-color']) .' !important; }';
}

// edit
if(isset($themesmoon_options['menu_bg_hover_color'])){
	$output .= '.primary .suppa_menu:hover .suppa_top_level_link, .primary .suppa_menu .suppa_top_level_link.current-menu-item{ background: '.esc_attr($themesmoon_options['menu_bg_hover_color']) .' !important; }';
}
// edit here

if(isset($themesmoon_options['submenu_bg'])){
	$output .= '#main-menu .primary .suppa_submenu,#main-menu .nav>li ul{ background: '.esc_attr($themesmoon_options['submenu_bg']) .'; }';
}
if(isset($themesmoon_options['submenu_hover_bg'])){
	$output .= '#main-menu .sub-menu li.active, #main-menu .nav>li>ul li:hover, #main-menu .nav>li.fixed-menu a { background: '.esc_attr($themesmoon_options['submenu_hover_bg']) .'; }';
}
if(isset($themesmoon_options['submenu_font_color'])){
	$output .= '#main-menu .nav>li>ul li a { color: '.esc_attr($themesmoon_options['submenu_font_color']) .'; }';
}
if(isset($themesmoon_options['submenu_hover_color'])){
	$output .= '#main-menu .nav>li>ul li a:hover { color: '.esc_attr($themesmoon_options['submenu_hover_color']) .'; }';
} 
if(isset($themesmoon_options['submenu_border_bottom'])){
	$output .= '#main-menu .nav>li>ul li { border-bottom-color: '.esc_attr($themesmoon_options['submenu_border_bottom']) .'; }';
}

// banner section...
if( $themesmoon_options['banner-title-padding-top'] ){
    $output .= '.sub-title-inner{ padding-top: '. (int) esc_attr( $themesmoon_options['banner-title-padding-top']) .'px; }';
}

if( $themesmoon_options['banner-title-padding-bottom'] ){
    $output .= '.sub-title-inner{ padding-bottom: '. (int) esc_attr( $themesmoon_options['banner-title-padding-bottom']) .'px; }';
}
if( $themesmoon_options['banner-margin-bottom'] ){
    $output .= '.sub-title{ margin-bottom: '. (int) esc_attr( $themesmoon_options['banner-margin-bottom']) .'px; }';
}

if(isset($themesmoon_options['subtitle-text-color'])){
	$output .= '.sub-title-inner h2 { color: '.esc_attr($themesmoon_options['subtitle-text-color']) .'; }';
}

if( $themesmoon_options['breadcrumb-font-size'] ){
    $output .= '.sub-title-inner .breadcrumb, .sub-title-inner .breadcrumb>li+li:before{ font-size: '. (int) esc_attr( $themesmoon_options['breadcrumb-font-size']) .'px; }';
}

if(isset($themesmoon_options['breadcrumb-text-color'])){
	$output .= '.sub-title-inner .breadcrumb  li a.breadcrumb_home, .sub-title-inner .breadcrumb>.active, .sub-title-inner .breadcrumb, .sub-title-inner .breadcrumb>li+li:before{ color: '.esc_attr($themesmoon_options['breadcrumb-text-color']) .'; }';
}


//footer
if(isset($themesmoon_options['top-footer-text-color'])){
	$output .= 'footer, .bottom-widget .widget h3.widget_title, .bottom-widget ul li a{ color: '.esc_attr($themesmoon_options['top-footer-text-color']) .'; }';
}

if(isset($themesmoon_options['top-footer-text-hover-color'])){
	$output .= '.bottom-widget .widget ul li a:hover{ color: '.esc_attr($themesmoon_options['top-footer-text-hover-color']) .'; }';
}

if(isset($themesmoon_options['top-footer-text-color'])){
	$output .= 'footer, .bottom-widget .widget h3.widget_title, .bottom-widget ul li a{ color: '.esc_attr($themesmoon_options['top-footer-text-color']) .'; }';
}


// copyright
if(isset($themesmoon_options['copyright-bg-color'])){
	$output .= '#footer{ background: '.esc_attr($themesmoon_options['copyright-bg-color']) .'; }';
}

if(isset($themesmoon_options['copyright-text-color'])){
	$output .= '.footer_copright p { color: '.esc_attr($themesmoon_options['copyright-text-color']) .'; }';
}
if(isset($themesmoon_options['copyright-link-color'])){
	$output .= '.footer_copright a{ color: '.esc_attr($themesmoon_options['copyright-link-color']) .'; }';
}
if(isset($themesmoon_options['copyright-hover-color'])){
	$output .= '.footer_copright a:hover { color: '.esc_attr($themesmoon_options['copyright-hover-color']) .'; }';
}


if (isset($themesmoon_options['comingsoon-en']) && $themesmoon_options['comingsoon-en']) {
	$output .= "body {
		background: #fff;
		display: table;
		width: 100%;
		height: 100%;
		min-height: 100%;
	}";
}
if(isset($themesmoon_options['css_editor'])){
	$output .= $themesmoon_options['css_editor'];
}


echo $output;