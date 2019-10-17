<?php
header('Content-type: text/css');

$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $parse_uri[0].'wp-load.php';
require_once($wp_load);

global $themesmoon_options;

$output = '';


	$link_color = esc_attr($themesmoon_options['link-color']);

if(isset($themesmoon_options['custom-preset-en']) && $themesmoon_options['custom-preset-en']) {

	if(isset($link_color)){
		$output .= '#main-menu .sub-menu li.active, #main-menu .nav>li>ul li:hover,#main-menu .nav>li.fixed-menu a,
		.themeum-pagination .pagination>li.active >a,.themeum-pagination .pagination>li>a:focus, .themeum-pagination .pagination>li>a:hover, 
		.themeum-pagination .pagination>li>span:focus, .themeum-pagination .pagination>li>span:hover,

		.title-icon-style,.btn-style:hover,.post-navigation .previous-post a:hover,.poll-submit:hover,
		.post-navigation .next-post a:hover,#comments .form-submit #submit:hover,.btn.btn-primary:hover,
		.primary .suppa_menu_mega_posts .suppa_mega_posts_categories a.suppa_mega_posts_cat_selected,
		.primary .suppa_menu_mega_posts .suppa_mega_posts_categories a.current-menu-item,
		.primary .suppa_menu_linksTwo .suppa_linksTwo_categoriesContainer a.suppa_linksTwo_categoriesContainer_current,
		.primary .suppa_post div.suppa_post_link_container,.sub-title-inner h2 span,.widget .tagcloud a:hover,.flexslider .slides.gallery-thumb-image li:hover,
		.post-meta-info-list i,.bottom-wrap,.modal-body.text-center input[type=submit].btn-block,
		.themeum-person .social-icon ul>li>a:hover,.social-common-bar .social-icon i:hover,
		.social-common-bar .social-icon i:hover:after,span.page-numbers.current,.themeum-pagination > ul >li>a:hover,
		.woocommerce nav.woocommerce-pagination ul li a:focus, 
		.woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,
		.woocommerce button.button.alt,
		.woocommerce-tabs .nav-tabs>li.active>a, .woocommerce-tabs .nav-tabs>li.active>a:focus, 
		.woocommerce-tabs .nav-tabs>li.active>a:hover,.woocommerce-tabs .nav>li>a:focus, 
		.woocommerce-tabs .nav>li>a:hover,.woocommerce-tabs .nav-tabs>li>a:hover,
		.woocommerce.widget_product_search .woocommerce-product-search input[type=submit],
		.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
		.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
		.cart-has-products,#navigation #mobile-menu .navbar-nav,.navbar-toggle:hover .icon-bar, #wp-megamenu-primary > .wpmm-nav-wrap ul.wp-megamenu > li ul.wp-megamenu-sub-menu li.current-menu-item a{ background-color: '. esc_attr($link_color) .'; }';

		$output .= 'a,a:focus,.primary .suppa_menu .suppa_top_level_link.current-menu-item .suppa_item_title,
		.primary .suppa_menu:hover .suppa_top_level_link.current-menu-item .era_suppa_arrow_box span,
		.primary .suppa_menu:hover .suppa_top_level_link .ctf_suppa_fa_box_top_arrow,.primary .suppa_menu_dropdown > .suppa_submenu a.current-menu-item .suppa_item_title,
		.primary .suppa_menu_dropdown > .suppa_submenu a.current-menu-item .era_suppa_arrow_box span,.primary .suppa_menu .suppa_top_level_link.current-menu-ancestor .suppa_item_title,
		.primary .suppa_menu .suppa_top_level_link.current-menu-ancestor .era_suppa_arrow_box span,
		.primary .suppa_menu .suppa_top_level_link.current-menu-item,.primary .suppa_menu .suppa_top_level_link.current-menu-item .era_suppa_arrow_box span,
		.suppa_menu_dropdown > .suppa_submenu a:hover .suppa_item_title,.primary .suppa_menu:hover .suppa_top_level_link .suppa_item_title,
		.primary .suppa_menu_dropdown > .suppa_submenu a:hover .suppa_item_title,.primary .suppa_menu_mega_posts .suppa_mega_posts_categories a .suppa_mega_posts_arrow span,
		.primary .suppa_menu_dropdown .suppa_submenu a .era_suppa_arrow_box span,.primary .suppa_menu_dropdown div:hover > a .era_suppa_arrow_box span,
		.primary .suppa_column_title,.primary .suppa_column_link,.primary .suppa_menu_linksTwo .suppa_submenu .suppa_linksTwo_cat a:hover,.top-align >a:hover,
		.bookmark-pagewrap:hover:before,.bookmark-page h3 a:hover,.video-post-icon-large a i:hover,.video-post-icon-small a i:hover,.video-post-small .entry-title  a:hover,
		.newedge-post-share-social a.prettySocial:hover,.share-count span.number,.post-meta-info-list-in a:hover,
		.common-post-item-intro-text h3.entry-title a:hover,.lates-editor-picks .category-color-wrap a:hover,.error-page-inner .error-code,
		.woocommerce div.product p.price, .woocommerce div.product span.price,.author-user-heading h3 span,
		.product-thumbnail-outer-inner .addtocart-btn i,.author-social-profile li a:hover,
		.product-thumbnail-outer-inner .addtocart-btn a:hover,.woocommerce .star-rating span:before,.widget ul li a:hover,
		.latest-post-intro .entry-title a:hover,.category-post-list-view ul li i,.category-post-list-view ul li a:hover,
		.themeum-popular-item .popular-intro .entry-title a:hover, #wp-megamenu-primary > .wpmm-nav-wrap ul.wp-megamenu > li ul.wp-megamenu-sub-menu ul.wpmm-tab-btns li a:hover { color: '. esc_attr($link_color) .'; }';

		$output .= '.primary .suppa_column_title,#main-menu .primary .suppa_menu_linksTwo .suppa_submenu .suppa_linksTwo_categoriesContainer a{ border-bottom-color: '. esc_attr($link_color) .'; }';


	}
}

if(isset($themesmoon_options['custom-preset-en']) && $themesmoon_options['custom-preset-en']) {
	
	if(isset($themesmoon_options['hover-color'])){
		$output .= 'a:hover, .widget.widget_rss ul li a,.primary .suppa_column_title:hover,.primary .suppa_column_link:hover { color: '.esc_attr($themesmoon_options['hover-color']) .'; }';
		$output .= '.woocommerce button.button.alt:hover:hover,
		.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,
		.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{ background-color: '.esc_attr($themesmoon_options['hover-color']) .'; }';
	}
}


echo $output;