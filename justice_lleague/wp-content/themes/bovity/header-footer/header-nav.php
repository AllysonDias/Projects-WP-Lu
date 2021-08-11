<?php $bovity_preloader_option = get_theme_mod('bovity_preloader_option',0); 
if($bovity_preloader_option==0){
?>
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<?php } ?>
<div class="full-width-header">
            <!-- Toolbar Start -->
            <?php $bovity_top_header_enable =  get_theme_mod('bovity_top_header_enable',1);
            if($bovity_top_header_enable=='1'){
            ?>   

   <header class="top-header">
            <div class="container-fluid">
                <div class="container-max">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="header-right">
                                 <?php 
                                $bovity_header_mail = get_theme_mod('bovity_header_mail','');
                                $bovity_header_phone = get_theme_mod('bovity_header_phone','');
                                $bovity_header_address = get_theme_mod('bovity_header_address','');
                                 ?>
                                <div class="header-right-card">
                                    <ul>
                                    <?php if(!empty($bovity_header_mail)) {  ?>        
                                        <li>
                                            <div class="head-icon">
                                                <i class='fa fa-envelope'></i>
                                            </div>
                                            <a href="mailto::<?php echo esc_url($bovity_header_mail); ?>"><?php echo esc_html($bovity_header_mail); ?></a>
                                        </li>
                                    <?php } if(!empty($bovity_header_phone)) {?>
                                        <li>
                                            <div class="head-icon">
                                                <i class='fa fa-phone'></i>
                                            </div>
                                            <a><?php echo esc_html($bovity_header_phone); ?></a>
                                        </li>
                                        <?php } if(!empty($bovity_header_address)) {?>
                                        <li>
                                            <div class="head-icon">
                                                <i class='fa fa-map-marker'></i>
                                            </div>
                                            <a href="#" class="address"><?php echo esc_html($bovity_header_address); ?> </a>
                                        </li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php 
                                $bovity_home_facebook_url = get_theme_mod('bovity_home_facebook_url','');
                                $bovity_home_twitter_url = get_theme_mod('bovity_home_twitter_url','');
                                $bovity_home_instagram_url = get_theme_mod('bovity_home_instagram_url','');
                                $bovity_home_youtube_url = get_theme_mod('bovity_home_youtube_url','');
                                 ?>
                        <div class="col-lg-3">
                            <div class="top-social-link">
                                <ul>
                                    <?php if(!empty($bovity_home_facebook_url)) {  ?>
                                    <li>
                                        <a class="color-blue" href="<?php echo esc_url($bovity_home_facebook_url); ?>" target="_blank">
                                            <i class='fa fa-facebook'></i>
                                        </a>
                                    </li>
                                    <?php } if(!empty($bovity_home_twitter_url)) {?>
                                    <li>
                                        <a class="active" href="<?php echo esc_url($bovity_home_twitter_url); ?>" target="_blank">
                                            <i class='fa fa-twitter'></i>
                                        </a>
                                    </li>
                                    <?php } if(!empty($bovity_home_instagram_url)) {?>
                                    <li>
                                        <a class="color-pink" href="<?php echo esc_url($bovity_home_instagram_url); ?>" target="_blank">
                                            <i class='fa fa-instagram'></i>
                                        </a>
                                    </li>
                                    <?php } if(!empty($bovity_home_youtube_url)) {?>
                                    <li>
                                        <a class="color-red" href="<?php echo esc_url($bovity_home_youtube_url); ?>" target="_blank">
                                            <i class='fa fa-youtube'></i>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php } ?>
            <!-- Toolbar End -->
<?php 
$bovity_header_show_blog = get_theme_mod("bovity_header_show_blog", 0); 
$bovity_header_show_single_blog =  get_theme_mod( 'bovity_header_show_single_blog', 0 );
$bovity_header_show_single_page =  get_theme_mod( 'bovity_header_show_single_page', 0 );
 ?>
   <div class="navbar-area" id="tec-header">
            <!-- Menu For Mobile Device -->
            <!-- Menu For Desktop Device -->
            <?php if($bovity_header_show_blog==1 || $bovity_header_show_single_blog==1 || $bovity_header_show_single_page==1) {
?>
            <div class="main-nav header-showhide">
            <?php } else { ?>
                <div class="main-nav <?php if(is_user_logged_in()) { ?> sticky-loggin <?php } ?>">
                <?php } ?>
                <div class="container-fluid">
                    <nav class="container-max navbar navbar-expand-md navbar-light ">
                        <?php
                        $bovity_middle_header_enable = get_theme_mod('bovity_middle_header_enable',1); 
                        $bovity_middle_header_bar_enable = get_theme_mod('bovity_middle_header_bar_enable',1);
                            if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                            the_custom_logo();
                            } 
                            if (display_header_text()==true){ 
                            ?>
                            <div class="bovity-logo-sec">
                             <h1 class="avadanta-title">
                                 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                 <?php esc_html(bloginfo( 'title' )); ?>
                                 </a>
                             </h1>
                            <p class="avadanta-desc">
                            <?php esc_html(bloginfo( 'description')); ?>
                            </p>
                        </div>
                            <?php } ?>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                           <nav id="site-navigation" class="main-navigation <?php if($bovity_middle_header_bar_enable == 0 || $bovity_middle_header_enable == 0) { ?> navigate-bovity <?php } ?>" role="navigation" aria-label="Top Menu">
                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
                         <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                                'menu_class'=> 'menu navbar-nav m-auto', 
                            ) );
                         ?>
                            </nav>

                        <?php 
                            if($bovity_middle_header_enable==1){
                        ?> 
                            <div class="other-side">
                                <div class="search-area">
                                    <div class="other-option">
                                        <div class="search-item">
                                            <span class="search-box"><a href="#"><i class="fa fa-search"></i></a></span>
                                            <div class="serach_outer">
                                                <div class="serach_inner">
                                                    <?php get_search_form(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }  
                            if($bovity_middle_header_bar_enable==1){ ?>

                            <div class="modal-menu">
                                <a href="#" class="modal-icon-btn" data-toggle="modal" data-target="#myModal2">
                                    <i class='fa fa-bars'></i>
                                </a>
                            </div>
                        <?php } ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="sidebar-modal">  
            <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="fa fa-times"></i>
                                </span>
                            </button>
                            <h2 class="modal-title" id="myModalLabel2">
                            <?php
                            if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                            the_custom_logo();
                            } 
                            if (display_header_text()==true){ 
                            ?>
                            <div class="bovity-logo-sec">
                             <h1 class="avadanta-title">
                                 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                 <?php esc_html(bloginfo( 'title' )); ?>
                                 </a>
                             </h1>
                        </div>
                            <?php } ?>
                            </h2>
                        </div>
                        
                        <div class="modal-body">
                            <?php dynamic_sidebar( 'modal-sidebar' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>