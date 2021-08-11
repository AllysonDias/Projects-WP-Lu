<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="blog-dtls-content">
    <div class="blog-dtls-date"> 
      <?php if(has_post_thumbnail()) : ?>
    <div class="image-part">
    <?php the_post_thumbnail(); ?>
    </div>
    <?php endif; ?>
    <div class="page-content">
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
                  'after'  => '</ div>',
                ) );
        ?>                        
    </div>
</div>
          </div>
        </div>
<?php 

  if ( comments_open() || get_comments_number() ) :
      comments_template();
  endif; 
?>