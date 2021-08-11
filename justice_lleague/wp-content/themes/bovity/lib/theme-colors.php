<?php
function bovity_inline_css(){

$bovity_custom_css      = '';

$bovity_color_scheme = get_theme_mod( 'bovity_color_scheme', '#1b1b1b' );

$bovity_custom_css      .= '.footer-middle{background-color: ' . esc_attr( $bovity_color_scheme) . ';}';

$bovty_footer_widgets_title_color = get_theme_mod( 'bovty_footer_widgets_title_color','#fff' );

$bovity_custom_css      .= '.footer-middle .footer-widget .widget-title{color: ' . esc_attr( $bovty_footer_widgets_title_color) . ';}';

$bovity_footer_widgets_text_color = get_theme_mod( 'bovity_footer_widgets_text_color','#fff' );

$bovity_custom_css      .= '.footer-widget ul li a,.footer-widget .widget_calendar td{color: ' . esc_attr( $bovity_footer_widgets_text_color) . ';}';


$bovity_breadcrumb_title_color = get_theme_mod('bovity_breadcrumb_title_color','#fff');

$bovity_custom_css      .= '.tec-breadcrumbs .inner-title h2{color: ' . esc_attr( $bovity_breadcrumb_title_color) . ';}';

$bovity_header_bg_color = get_theme_mod('bovity_header_bg_color','#000');

$bovity_breadcrum_opacity_section= get_theme_mod('bovity_breadcrum_opacity_section',0.55);

$bovity_custom_css      .= '.tec-breadcrumbs:before{background: ' . esc_attr( $bovity_header_bg_color) . ';
opacity:' . esc_attr( $bovity_breadcrum_opacity_section) . ';
}';

$bovity_theme_color_scheme = get_theme_mod('bovity_theme_color_scheme','#3f51b5');               

$bovity_custom_css      .= '.top-header,.default-btn::before,.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span,.maintenance-area,.single-gallery .single-icon:hover,.team-card .team-social li a.color-dark-red,.service-paymen-bg,
    .widget_search .search-form .search-submit,.tagcloud a:hover,.search-no-results .search-form .search-submit,.sidebar-modal .modal-header .close i:hover,.error-content .default-btn.active,.service-slider .center .service-item,.top-btn,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt
       {background-color: ' . esc_attr( $bovity_theme_color_scheme) . ';}';

$bovity_custom_css      .= '.nav-links .page-numbers,.social li
       {
        background-color: ' . esc_attr( $bovity_theme_color_scheme) . ';}';

$bovity_custom_css      .= 'blockquote
       {
        border-left: 5px solid '. esc_attr( $bovity_theme_color_scheme) . '}';

$bovity_custom_css      .= '.widget_search .search-form .search-field,
                              .widget_search .search-form .search-submit,
                              .search-no-results .search-form .search-field
       {
        border: 1px solid '. esc_attr( $bovity_theme_color_scheme) . '}';

$bovity_custom_css      .= '
       .section-title span,.maintenance-item:hover .maintenance-content h3,
       .maintenance-item:hover i,.color-title-blue,.single-gallery .single-icon,.blog-card .blog-content ul li i,.bottom-text p a:hover,
       .inner-banner .inner-title ul li a:hover,.blog-dtls-content h2,.blog-dtls-content .blog-content ul li i,.logged-in-as a,.blog-card:hover .blog-content a h3,.blog-card .blog-content .more-blog:hover,.blog-dtls-content a,.comment-content a,.error-area .error-content h1,.nav-links .page-numbers.current,.next.page-numbers:after,.prev.page-numbers:after{
                     color: ' . esc_attr( $bovity_theme_color_scheme) . '!important; ;
                }';


$bovity_custom_css      .= '#loader,#loader:before,#loader:after
       {
        border-top-color: '. esc_attr( $bovity_theme_color_scheme) . '}';

$bovity_custom_css      .= '.avadanta-navigate ul ul
       {
        border-top: 4px solid '. esc_attr( $bovity_theme_color_scheme) . '}';


$bovity_custom_css      .= '.btn-read-more-fill{border-bottom: 1px solid ' . esc_attr( $bovity_theme_color_scheme) . ' !important;}';


$bovity_custom_css      .= ' .nav-links .page-numbers:hover{background-color:  #fff;
                      border-bottom: 1px solid ' . esc_attr( $bovity_theme_color_scheme) . ';
                     color:' . esc_attr( $bovity_theme_color_scheme) . ';}';


$bovity_custom_css      .= '.contact-banner-area .color-theme, .projects-2-featured-area .featuredContainer .featured-box:hover .overlay,.sidebar-title:before{background-color: ' . esc_attr( $bovity_theme_color_scheme) . ';opacity:0.8;}';

$bovity_custom_css      .= '.bg-primary,.slick-dots li.slick-active,.post-full .post-date,.preloader.preloader-dalas:before,
.preloader.preloader-dalas:after,.back-to-top{background-color: ' . esc_attr( $bovity_theme_color_scheme) . ' !important;}';



$bovity_404_opacity_section = get_theme_mod('bovity_404_opacity_section','0.55');
$bovity_custom_css      .= '.error-area::before{opacity: ' . esc_attr( $bovity_404_opacity_section) . ';}';


$bovity_404_bg_color = get_theme_mod('bovity_404_bg_color','#000');
$bovity_custom_css      .= '.error-area::before{background: ' . esc_attr( $bovity_404_bg_color) . ';}';


$bovity_footer_opacity = get_theme_mod('bovity_footer_opacity_section','0.0');

$bovity_custom_css      .= '.tc-light.footer-s1::after{opacity: ' . esc_attr( $bovity_footer_opacity) . ';}';


$braedcrumb_height = get_theme_mod('braedcrumb_height','380');

$bovity_custom_css      .= '.tec-breadcrumbs{height: ' . esc_attr( $braedcrumb_height) . 'px;}';

$bovity_sticky_thumb = get_theme_mod('bovity_sticky_thumb',0);
if($bovity_sticky_thumb==1){

  $bovity_custom_css      .= '.sticky-nav{display: none;}';

}

$bovity_scroll_thumb = get_theme_mod('bovity_scroll_thumb',0);

if($bovity_scroll_thumb==1){

  $bovity_custom_css .= '.top-btn{display: none !important;}';

}


    wp_add_inline_style( 'bovity-style', $bovity_custom_css );
}

add_action( 'wp_enqueue_scripts', 'bovity_inline_css' );