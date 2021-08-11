<?php
if( !function_exists('bovity_theme_setup')):

	function bovity_theme_setup()
	{
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on bovity, use a find and replace
		* to change 'bovity' to the name of your theme in all the template files.
		*/
		load_theme_textdomain('bovity', BOVITY_THEME_DIR .'/lang');

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support('title-tag');
		
		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__('Primary' , 'bovity'),
			'footer' => esc_html__('footer' , 'bovity')
		));

	
		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
		add_theme_support( 'custom-logo', array(
		   	'height'      => 45,
		   	'width'       => 235,
		   	'flex-width' => true,
			)
		);

		add_editor_style();
		add_theme_support( 'align-wide' );
	}
	endif;	

	add_action(	'after_setup_theme', 'bovity_theme_setup' );