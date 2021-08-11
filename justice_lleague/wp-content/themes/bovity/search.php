<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bovity
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
get_header();
bovity_breadcrumbs();


?>
        <div class="blog-page-area pt-100 pb-70">
            <div class="container">
                <div class="row">
			<div class="col-md-12">
				 <div class="row">
					<?php
						if ( have_posts() ) :

							if ( ! is_home() && is_front_page() ) :
								?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'theme-parts/content-search'); 

								endwhile; 
								else :
								get_template_part( 'theme-parts/content', 'none' );
								endif; 

						?>
						
					<?php the_posts_pagination(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>