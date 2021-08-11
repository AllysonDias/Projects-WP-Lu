<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bovity
 */
get_header();

$bovity_header_show_single_blog =  get_theme_mod( 'bovity_header_show_single_blog', 0 );
if($bovity_header_show_single_blog==0){
bovity_breadcrumbs();
}
?>

        <div class="blog-dtls-area pt-100 pb-70">
            <div class="container">
                <div class="row">
			<?php $bovity_single_blog_layout = sanitize_text_field( get_theme_mod( 'bovity_single_blog_temp_layout', 'rightsidebar' ) );
			if ( $bovity_single_blog_layout == "leftsidebar" ) {
				get_sidebar();
				$bovity_single_float = 8;
			} elseif ( $bovity_single_blog_layout == "fullwidth" ) {
				$bovity_single_float = 12;
			} elseif ( $bovity_single_blog_layout == "rightsidebar" ) {
				$bovity_single_float = 8;
			} else {
				$bovity_single_blog_layout = "rightsidebar";
				$bovity_single_float = 8;
			} ?>
			<div class="col-lg-<?php echo intval( $bovity_single_float ); ?>">
					<?php if ( have_posts() ) :

						 while ( have_posts() ) : the_post(); 

						   get_template_part( 'theme-parts/content-single'); 

							endwhile; 

							else :

						   get_template_part( 'theme-parts/content', 'none' ); 

					     endif; ?>

			</div>
           <?php if ( $bovity_single_blog_layout == "rightsidebar" ) {
			get_sidebar(); } ?>
        </div>
	</div>
</div>
<?php get_footer();?>