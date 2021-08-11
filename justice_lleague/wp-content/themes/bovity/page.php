<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bovity
 */
get_header();

$bovity_header_show_single_page =  get_theme_mod( 'bovity_header_show_single_page', 0 );
if($bovity_header_show_single_page==0){
bovity_breadcrumbs();
}
?>
        <div class="blog-dtls-area pt-100 pb-70">
            <div class="container">
                <div class="row">			
                <?php 
				$bovity_page_temp_layout =  get_theme_mod( 'bovity_page_temp_layout', 'rightsidebar' ) ;
				
				if ( $bovity_page_temp_layout == "leftsidebar" ) {
					get_sidebar();
					$bovity_page_float = 8;
				} elseif ( $bovity_page_temp_layout == "fullwidth" ) {
					$bovity_page_float = 12;
				} elseif ( $bovity_page_temp_layout == "rightsidebar" ) {
					$bovity_page_float = 8;
				} else {
					$bovity_page_temp_layout = "rightsidebar";
					$bovity_page_float = 8;
				} 
			?>
			<div class="col-lg-<?php echo $bovity_page_float ; ?>">
					<?php if ( have_posts() ) :

						 while ( have_posts() ) : the_post(); 

						   get_template_part( 'theme-parts/content-page'); 

							endwhile; 

							else :

						   get_template_part( 'theme-parts/content', 'none' ); 

					     endif; ?>

			</div>
			<?php 
			if ( class_exists( 'WooCommerce' ) ) {			
			if ( is_shop() || is_product_taxonomy() || is_checkout() || is_cart() || is_account_page() ) { ?>
				<div class="col-lg-4">
					<div class="blog-dtls-side">
						<?php dynamic_sidebar( 'Woocomerce-sidebar' ); ?>
					</div>
				</div>
				<?php } 
				elseif ( $bovity_page_temp_layout == "rightsidebar" ) { 
				get_sidebar();
				} } elseif ( $bovity_page_temp_layout == "rightsidebar" ) {
			get_sidebar(); }  ?>
        </div>
	</div>
</div>
<?php get_footer();?>