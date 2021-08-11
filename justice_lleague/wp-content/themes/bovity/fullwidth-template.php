<?php
/**
 *Template Name: Full Width Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bovity
 */
get_header();

$bovity_header_show_single_page =  get_theme_mod( 'bovity_header_show_single_page', 0 );
if($bovity_header_show_single_page==0)
{
bovity_breadcrumbs();
}
?>
        <div class="blog-dtls-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                	<div class="col-lg-12">
					<?php if ( have_posts() ) :

						 while ( have_posts() ) : the_post(); 

						   get_template_part( 'theme-parts/content-page'); 

							endwhile; 

							else :

						   get_template_part( 'theme-parts/content', 'none' ); 

					     endif; ?>

			</div>
        </div>
	</div>
</div>
<?php get_footer();?>