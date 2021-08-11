<?php
if( ! function_exists( 'avadanta_custom_typography_css' ) ):
    function avadanta_custom_typography_css() {
    
	$bovity_typography_show = get_theme_mod('bovity_show_typography', 0);
    If($bovity_typography_show == 1):
        
        $bovity_custom_css1 = '';
		if(get_theme_mod('bovity_typography_base_font_family') != null):
			$bovity_custom_css1 .="body { font-family: " .esc_attr( get_theme_mod('bovity_typography_base_font_family') )." !important; }\n";
        endif;

        if(get_theme_mod('bovity_typography_h1_font_family') != null):
            $bovity_custom_css1 .="h1,h2,h3,h4,h5,h6 { font-family: " .esc_attr( get_theme_mod('bovity_typography_h1_font_family') )." !important; }\n";
        endif;
    
        wp_add_inline_style( 'bovity-style', $bovity_custom_css1 );
		
		endif;
    }
endif;
add_action( 'wp_enqueue_scripts', 'avadanta_custom_typography_css' );