<?php
if( !function_exists('bovity_breadcrumbs') ): function bovity_breadcrumbs() {
$image = get_header_image();
  ?>
            <div class="tec-breadcrumbs inner-banner inner-bg3">
                <div class="container">
                    <div class="inner-title text-center">
                  <?php if(is_home()): ?>
                            <h2 class="banner-heading" ><?php bloginfo('name'); ?></h2>
                            <?php else: ?>
                              <h2 class="banner-heading">
                                <?php if ( is_archive() ) {
                                  the_archive_title( '<h2 class="banner-heading">', '</h2>' );
                                }
                                 elseif(is_search()){

                                  echo  esc_html__('Search Results For ', 'bovity') . ' " ' . get_search_query() . ' "';

                                 }elseif ( is_404() ) {
                                  echo  esc_html__('Nothing Found ', 'bovity');
                                 }
                                 else{
                                  
                                    echo esc_html( get_the_title() );
                                    
                                  } 
                                 ?>
                              </h2>
                            <?php endif; 
                            ?>
                            <?php $bovity_header_show_breadcrumb = get_theme_mod( 'bovity_header_show_breadcrumb', 0 ); 
                            if($bovity_header_show_breadcrumb==0) { ?>
                           <?php bovity_breadcrumb_trail(); ?>
                           <?php } ?>

                </div>
              </div>
               
            </div>
         
      <div id="content"></div>
<?php } endif;