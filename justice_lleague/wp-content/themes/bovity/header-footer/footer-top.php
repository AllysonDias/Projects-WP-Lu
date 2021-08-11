
 <footer class="footer-area">
 	<?php
 	 $bovity_top_footer_enable = get_theme_mod('bovity_top_footer_enable',0); 	
if($bovity_top_footer_enable==0)
		{ ?>
            <div class="footer-middle pt-100 pb-70">
                <div class="container">
                    <div class="row">
                        <?php
                       $bovity_footer_widgets_column = get_theme_mod( 'bovity_footer_widgets_column', 'mt-column-3' );
                        if( is_active_sidebar( 'bovity-footer-area' ) )
                      {
                       
                        echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-b-30 '.esc_attr( $bovity_footer_widgets_column ).'">';
                        dynamic_sidebar( 'bovity-footer-area' );
                        echo '</div>';
                        }
                    ?>

                    <?php

                        if( is_active_sidebar( 'bovity-footer-area-2' ) || $bovity_footer_widgets_column == 'mt-column-1'){
                       
                      
                        echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-b-30 '.esc_attr( $bovity_footer_widgets_column ).'">';
                        dynamic_sidebar( 'bovity-footer-area-2' );
                        echo '</div>';
                         }
                    ?>
             
                    <?php
                    if( is_active_sidebar( 'bovity-footer-area-3' ) || $bovity_footer_widgets_column == 'mt-column-1' || $bovity_footer_widgets_column == 'mt-column-2' ){
                      
                   
                        echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-b-30 '.esc_attr( $bovity_footer_widgets_column ).'">';
                        dynamic_sidebar( 'bovity-footer-area-3' );
                        echo '</div>';
                         }
                    ?>

                    <?php
                    if( is_active_sidebar( 'bovity-footer-area-4' ) || $bovity_footer_widgets_column != 'mt-column-4'){
                                                      
                        echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-b-30 '.esc_attr( $bovity_footer_widgets_column ).'">';
                        dynamic_sidebar( 'bovity-footer-area-4' );
                        echo '</div>';
                        }
                    ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php $bovity_copyright_enable = get_theme_mod( 'bovity_copyright_enable', 0 );
            if($bovity_copyright_enable==0) : ?>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-md-6 col-12">
                            <div class="bottom-text">
                            <?php if( get_theme_mod( 'bovity_copyright_text' ) ) : ?>
                            <p><?php echo wp_kses_post(  get_theme_mod('bovity_copyright_text') ); ?> </p>
                            <?php else : ?>
                            <p>
                            <?php
                            printf( __( 'Proudly powered by', 'bovity' ) );
                            ?>

                            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bovity' ) ); ?>" class="imprint">
                                
                            <?php
                            printf( __( 'WordPress', 'bovity' ) );
                            ?>
                            </a>
                            
                            </p>
                            <?php endif ; ?>
                            </div>
                            </div>
                            <div class="col-md-6 col-12">
                            <div class="footer-text">
                                <?php
                                if ( has_nav_menu( 'footer' ) ) {
                                wp_nav_menu( array(
                                    'theme_location' => 'footer',
                                    'menu_id'        => 'footer-menu',
                                ) );
                            }

                            else{

                                ?>
                                <ul class="add-foot-menus">
                                    <li class="Footer-menus">
                                        <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ));  ?>">    <?php echo esc_html__( 'Add Footer Menu', 'bovity' ); ?>
                                        </a>
                                    </li>
                                </ul>
                           <?php 
                            }

                             ?>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        </footer>