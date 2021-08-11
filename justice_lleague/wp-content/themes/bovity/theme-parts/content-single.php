<?php
$bovity_single_post_thumb =  get_theme_mod( 'bovity_single_post_thumb', 1 );
$bovity_single_post_meta =  get_theme_mod( 'bovity_single_post_meta', 1 );
$bovity_single_post_title = get_theme_mod( 'bovity_single_post_title', 1 ); 
?>
  <div class="blog-dtls-content">
    <div class="blog-dtls-date">
    <?php if( $bovity_single_post_thumb == 1 ) { ?>
	  <?php if(has_post_thumbnail()) : ?>
    <div class="image-part">
		<?php the_post_thumbnail(); ?>
    </div>
    <?php  endif; } ?>
        <?php if( $bovity_single_post_title == 1 ) {?>
        <h2><?php the_title(); ?></h2>
    <?php } if( $bovity_single_post_meta == 1 ) { ?>
      <div class="blog-content">
        <ul>
            <?php bovity_posted_on(); ?>
            <li>/</li>
               <?php bovity_posted_by(); ?>
        </ul>
      </div>
        <?php } ?> 
			<?php 
        the_content( sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bovity' ),
            array(
                  'span' => array(
                    'class' => array(),
                  ),
                )
              ),
                  get_the_title()
                ) );

                wp_link_pages( array(
                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bovity' ),
                  'after'  => '</div>',
                ) );
            ?> 
            </div> 
        </div>
<?php 

	if ( comments_open() || get_comments_number() ) :
	    comments_template();
	endif; 
?> 