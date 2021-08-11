<?php
$repeater_path =
    trailingslashit(BOVITY_THEME_DIR) .
    "/lib/customizer-repeater/functions.php";
if (file_exists($repeater_path)) {
    require_once $repeater_path;
}
/**
 * Customize for taxonomy with dropdown, extend the WP customizer
 */

if (!class_exists("WP_Customize_Control")) {
    return null;
}

function bovity_sections_settings($wp_customize)
{
    $selective_refresh = isset($wp_customize->selective_refresh)
        ? "postMessage"
        : "refresh";

    $wp_customize->get_setting("header_textcolor");

    // Remove the core header textcolor control, as it shares the main text color.
    $wp_customize->remove_control("header_textcolor");

    $wp_customize->add_setting("header_title_color", array(
        "default" => "#fff",
        "sanitize_callback" => "sanitize_hex_color",
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, "header_title_color", array(
            "label" => esc_html__("Header Text Color", "bovity"),
            "description" => esc_html__("Header Text Title Color", "bovity"),
            "section" => "colors",
        ))
    );

    $wp_customize->add_setting("header_tagline_color", array(
        "default" => "#fff",
        "sanitize_callback" => "sanitize_hex_color",
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, "header_tagline_color", array(
            "label" => esc_html__("Header Tagline Color", "bovity"),
            "description" => esc_html__("Header Tagline  Color", "bovity"),
            "section" => "colors",
        ))
    );

    /* Sections Settings */
    $wp_customize->add_panel("section_settings", array(
        "priority" => 100,
        "capability" => "edit_theme_options",
        "title" => esc_html__("Bovity Theme settings", "bovity"),
        "description" =>
            __("Drag and Drop to Reorder", "bovity") .
            '<img class="avadanta-drag-spinner" src="' .
            admin_url("/images/spinner.gif") .
            '">',
    ));

    $wp_customize->add_panel("home_section_settings", array(
        "priority" => 100,
        "capability" => "edit_theme_options",
        "title" => esc_html__("Bovity Front Page Sections", "bovity"),
    ));

    //Latest News Section
    $wp_customize->add_section("bovity_layout_sidebars", array(
        "title" => esc_html__("Sidebar Layout", "bovity"),
        "panel" => "section_settings",
        "priority" => 9,
    ));

    $wp_customize->add_setting("bovity_blog_temp_layout", array(
        "sanitize_callback" => "bovity_sanitize_select",
        "default" => "rightsidebar",
    ));
    $wp_customize->add_control("bovity_blog_temp_layout", array(
        "type" => "select",
        "label" => esc_html__("Blog Template Layout", "bovity"),
        "description" => esc_html__(
            "This will be apply for blog template layout",
            "bovity"
        ),
        "section" => "bovity_layout_sidebars",
        "choices" => array(
            "rightsidebar" => esc_html__("Right sidebar", "bovity"),
            "leftsidebar" => esc_html__("Left sidebar", "bovity"),
            "fullwidth" => esc_html__("No sidebar", "bovity"),
        ),
    ));

    $wp_customize->add_setting("bovity_single_blog_temp_layout", array(
        "sanitize_callback" => "bovity_sanitize_select",
        "default" => "rightsidebar",
    ));
    $wp_customize->add_control("bovity_single_blog_temp_layout", array(
        "type" => "select",
        "label" => esc_html__("Single Post Template Layout", "bovity"),
        "description" => esc_html__(
            "This will be apply for single Post template layout",
            "bovity"
        ),
        "section" => "bovity_layout_sidebars",
        "choices" => array(
            "rightsidebar" => esc_html__("Right sidebar", "bovity"),
            "leftsidebar" => esc_html__("Left sidebar", "bovity"),
            "fullwidth" => esc_html__("No sidebar", "bovity"),
        ),
    ));

    $wp_customize->add_setting("bovity_page_temp_layout", array(
        "sanitize_callback" => "bovity_sanitize_select",
        "default" => "rightsidebar",
    ));
    $wp_customize->add_control("bovity_page_temp_layout", array(
        "type" => "select",
        "label" => esc_html__("Page Template Layout", "bovity"),
        "description" => esc_html__(
            "This will be apply for Page template layout",
            "bovity"
        ),
        "section" => "bovity_layout_sidebars",
        "choices" => array(
            "rightsidebar" => esc_html__("Right sidebar", "bovity"),
            "leftsidebar" => esc_html__("Left sidebar", "bovity"),
            "fullwidth" => esc_html__("No sidebar", "bovity"),
        ),
    ));

    $wp_customize->add_section("bovity_post_settings", array(
        "priority" => null,
        "title" => esc_html__("Post Options", "bovity"),
        "description" => "",
        "panel" => "section_settings",
    ));

    $wp_customize->add_setting("bovity_single_post_thumb", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 1,
    ));
    $wp_customize->add_control("bovity_single_post_thumb", array(
        "type" => "checkbox",
        "label" => esc_html__("Enable Single Post Thumbnail", "bovity"),
        "section" => "bovity_post_settings",
        "description" => esc_html__(
            "Check this box to enable post thumbnail on single post.",
            "bovity"
        ),
    ));
    $wp_customize->add_setting("bovity_single_post_meta", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 1,
    ));
    $wp_customize->add_control("bovity_single_post_meta", array(
        "type" => "checkbox",
        "label" => esc_html__("Enable Single Post Meta", "bovity"),
        "section" => "bovity_post_settings",
        "description" => esc_html__(
            "Check this box to enable single post meta such as post date, author, category, comment etc.",
            "bovity"
        ),
    ));
    $wp_customize->add_setting("bovity_single_post_title", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 1,
    ));
    $wp_customize->add_control("bovity_single_post_title", array(
        "type" => "checkbox",
        "label" => esc_html__("Enable Single Post Title", "bovity"),
        "section" => "bovity_post_settings",
        "description" => esc_html__(
            "Check this box to enable title on single post.",
            "bovity"
        ),
    ));

    $wp_customize->add_section("bovity_footer_settings", array(
        "priority" => null,
        "title" => esc_html__("Footer Options", "bovity"),
        "description" => "",
        "panel" => "section_settings",
    ));

    $wp_customize->add_setting("bovity_top_footer_enable", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 0,
    ));
    $wp_customize->add_control("bovity_top_footer_enable", array(
        "type" => "checkbox",
        "label" => esc_html__("Disable Footer Top Section?", "bovity"),
        "section" => "bovity_footer_settings",
        "description" => esc_html__(
            "Check this box to Disable Top Footer section.",
            "bovity"
        ),
    ));

    $wp_customize->add_setting("bovity_footer_widgets_column", array(
        "capability" => "edit_theme_options",
        "default" => "mt-column-3",
        "sanitize_callback" => "sanitize_text_field",
    ));

    $wp_customize->add_control("bovity_footer_widgets_column", array(
        "label" => esc_html__("Footer Widget Column", "bovity"),
        "section" => "bovity_footer_settings",
        "type" => "select",
        "settings" => "bovity_footer_widgets_column",
        "priority" => 10,
        "choices" => array(
            "mt-column-1" => esc_html__("Col 1", "bovity"),
            "mt-column-2" => esc_html__("Col 2", "bovity"),
            "mt-column-3" => esc_html__("Col 3", "bovity"),
            "mt-column-4" => esc_html__("Col 4", "bovity"),
        ),
    ));

    $wp_customize->add_setting("bovity_color_scheme", array(
        "default" => esc_html__("#1b1b1b", "bovity"),
        "sanitize_callback" => "sanitize_hex_color",
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, "bovity_color_scheme", array(
            "label" => esc_html__("Background Color", "bovity"),
            "description" => esc_html__(
                "Change Footer Background Color",
                "bovity"
            ),
            "section" => "bovity_footer_settings",
            "settings" => "bovity_color_scheme",
        ))
    );

    $wp_customize->add_setting("bovty_footer_widgets_title_color", array(
        "default" => esc_html__("#fff", "bovity"),
        "sanitize_callback" => "sanitize_hex_color",
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            "bovty_footer_widgets_title_color",
            array(
                "label" => esc_html__("Widget Title Color", "bovity"),
                "section" => "bovity_footer_settings",
            )
        )
    );

    $wp_customize->add_setting("bovity_footer_widgets_text_color", array(
        "default" => esc_html__("#fff", "bovity"),
        "sanitize_callback" => "sanitize_hex_color",
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            "bovity_footer_widgets_text_color",
            array(
                "label" => esc_html__("Widget Text Color", "bovity"),
                "section" => "bovity_footer_settings",
            )
        )
    );

    $wp_customize->add_section("bovity_404_section", array(
        "priority" => null,
        "title" => esc_html__("404 Page Setting", "bovity"),
        "description" => "",
        "panel" => "section_settings",
    ));

    $wp_customize->add_setting("404_background_image", array(
        "default" => BOVITY_THEME_URI . "/resources/images/404.jpg",

        "sanitize_callback" => "esc_url_raw",
    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, "404_background_image", array(
            "label" => __("404 Background Image", "bovity"),
            "section" => "bovity_404_section",
            "settings" => "404_background_image",
        ))
    );

    $wp_customize->add_setting("bovity_404_opacity_section", array(
        "default" => ".75",
        "sanitize_callback" => "bovity_sanitize_float_theme",
    ));
    $wp_customize->add_control("bovity_404_opacity_section", array(
        "label" => __("404 Overlay Opacity", "bovity"),
        "section" => "bovity_404_section",
        "type" => "number",
        "input_attrs" => array(
            "min" => "0.01",
            "step" => "0.01",
            "max" => "1",
        ),
    ));

    $wp_customize->add_setting("bovity_404_bg_color", array(
        "sanitize_callback" => "sanitize_hex_color",
        "default" => "#000",
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            "bovity_404_bg_color",
            array(
                "label" => esc_html__("404 Background Color", "bovity"),
                "section" => "bovity_404_section",
                "description" => esc_html__(
                    "Select To Change 404 Background Color",
                    "bovity"
                ),
            )
        )
    );

    $wp_customize->add_setting("bovity_404_title_settings", array(
        "sanitize_callback" => "sanitize_text_field",
        "default" => "404",
    ));
    $wp_customize->add_control("bovity_404_title_settings", array(
        "type" => "text",
        "label" => esc_html__("404 Title", "bovity"),
        "section" => "bovity_404_section",
    ));

    $wp_customize->add_setting("bovity_404_subtitle", array(
        "sanitize_callback" => "sanitize_text_field",
        "default" => "Oops! Page Not Found",
    ));
    $wp_customize->add_control("bovity_404_subtitle", array(
        "type" => "text",
        "label" => esc_html__("404 Sub Title", "bovity"),
        "section" => "bovity_404_section",
    ));

    $wp_customize->add_setting("bovity_404_textarea", array(
        "sanitize_callback" => "sanitize_text_field",
        "default" =>
            "The page you are looking for might have been removed had its name changed or is temporarily unavailable.",
    ));
    $wp_customize->add_control("bovity_404_textarea", array(
        "type" => "textarea",
        "label" => esc_html__("404 Description", "bovity"),
        "section" => "bovity_404_section",
    ));

    $wp_customize->add_setting("bovity_404_button", array(
        "sanitize_callback" => "sanitize_text_field",
        "default" => "Return To Home",
    ));
    $wp_customize->add_control("bovity_404_button", array(
        "type" => "text",
        "label" => esc_html__("404 Button Text", "bovity"),
        "section" => "bovity_404_section",
    ));

    $wp_customize->add_setting("bovity_404_button_url", array(
        "sanitize_callback" => "esc_ur_raw",
        "default" => "#",
    ));
    $wp_customize->add_control("bovity_404_button_url", array(
        "type" => "url",
        "label" => esc_html__("404 Button Url ", "bovity"),
        "section" => "bovity_404_section",
    ));

    $wp_customize->add_setting("bovity_theme_color_scheme", array(
        "default" => esc_html__("#3f51b5", "bovity"),
        "sanitize_callback" => "sanitize_hex_color",
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            "bovity_theme_color_scheme",
            array(
                "label" => esc_html__("Theme Color", "bovity"),
                "description" => esc_html__("Change Theme Color", "bovity"),
                "section" => "colors",
                "settings" => "bovity_theme_color_scheme",
            )
        )
    );

    //Latest News Section
    $wp_customize->add_section("bovity_top_header", array(
        "title" => esc_html__("Top Header", "bovity"),
        "panel" => "section_settings",
        "priority" => 7,
    ));

    $wp_customize->add_setting("bovity_top_header_enable", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 1,
    ));
    $wp_customize->add_control("bovity_top_header_enable", array(
        "type" => "checkbox",
        "label" => esc_html__("Enable Top Header Section?", "bovity"),
        "section" => "bovity_top_header",
        "description" => esc_html__(
            "Check this box to Enable Top Header section.",
            "bovity"
        ),
    ));

    // Navigation Button
    $wp_customize->add_setting("bovity_header_mail", array(
        "sanitize_callback" => "bovity_sanitize_text",
        "default" => "",
    ));

    $wp_customize->add_control("bovity_header_mail", array(
        "label" => esc_html__("Header Email", "bovity"),
        "section" => "bovity_top_header",
        "type" => "text",
    ));

    $wp_customize->add_setting("bovity_header_phone", array(
        "sanitize_callback" => "bovity_sanitize_text",
        "default" => "",
    ));

    $wp_customize->add_control("bovity_header_phone", array(
        "label" => esc_html__("Header Contact", "bovity"),
        "section" => "bovity_top_header",
        "type" => "text",
    ));
    $wp_customize->add_setting("bovity_header_address", array(
        "sanitize_callback" => "bovity_sanitize_text",
        "default" => "",
    ));

    $wp_customize->add_control("bovity_header_address", array(
        "label" => esc_html__("Header Address", "bovity"),
        "section" => "bovity_top_header",
        "type" => "text",
    ));

    $wp_customize->add_setting("bovity_home_facebook_url", array(
        "default" => "",
        "sanitize_callback" => "esc_url_raw",
    ));

    $wp_customize->add_control("bovity_home_facebook_url", array(
        "settings" => "bovity_home_facebook_url",
        "section" => "bovity_top_header",
        "type" => "url",
        "label" => esc_html__("Facebook Url", "bovity"),
    ));

    $wp_customize->add_setting("bovity_home_twitter_url", array(
        "default" => "",
        "sanitize_callback" => "esc_url_raw",
    ));

    $wp_customize->add_control("bovity_home_twitter_url", array(
        "settings" => "bovity_home_twitter_url",
        "section" => "bovity_top_header",
        "type" => "url",
        "label" => esc_html__("Twitter Url", "bovity"),
    ));

    $wp_customize->add_setting("bovity_home_instagram_url", array(
        "default" => "",
        "sanitize_callback" => "esc_url_raw",
    ));

    $wp_customize->add_control("bovity_home_instagram_url", array(
        "settings" => "bovity_home_instagram_url",
        "section" => "bovity_top_header",
        "type" => "url",
        "label" => esc_html__("Instagram Url", "bovity"),
    ));

    $wp_customize->add_setting("bovity_home_youtube_url", array(
        "default" => "",
        "sanitize_callback" => "esc_url_raw",
    ));

    $wp_customize->add_control("bovity_home_youtube_url", array(
        "settings" => "bovity_home_youtube_url",
        "section" => "bovity_top_header",
        "type" => "url",
        "label" => esc_html__("Youtube Url", "bovity"),
    ));

    $wp_customize->add_section("bovity_middle_header", array(
        "title" => esc_html__("Navigation Setting", "bovity"),
        "panel" => "section_settings",
        "priority" => 8,
    ));

    $wp_customize->add_setting("bovity_middle_header_enable", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 1,
    ));
    $wp_customize->add_control("bovity_middle_header_enable", array(
        "type" => "checkbox",
        "label" => esc_html__("Enable Search Icon", "bovity"),
        "section" => "bovity_middle_header",
        "description" => esc_html__(
            "Check this box to Enable Search Icon",
            "bovity"
        ),
    ));

    $wp_customize->add_setting("bovity_middle_header_bar_enable", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 1,
    ));
    $wp_customize->add_control("bovity_middle_header_bar_enable", array(
        "type" => "checkbox",
        "label" => esc_html__("Enable Top Modal", "bovity"),
        "section" => "bovity_middle_header",
        "description" => esc_html__(
            "Check this box to Enable Top Modal",
            "bovity"
        ),
    ));

    $wp_customize->add_section("bovity_breadcrumb_settings", array(
        "priority" => null,
        "title" => esc_html__("Header/Breadcrumb Options", "bovity"),
        "description" => "",
        "panel" => "section_settings",
    ));

    $wp_customize->add_setting("bovity_header_bg_color", array(
        "sanitize_callback" => "sanitize_hex_color",
        "default" => "#000",
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            "bovity_header_bg_color",
            array(
                "label" => esc_html__("Header Background Color", "bovity"),
                "section" => "bovity_breadcrumb_settings",
                "description" => esc_html__(
                    "Select To Change Header Background Color",
                    "bovity"
                ),
            )
        )
    );

    $wp_customize->add_setting("bovity_breadcrum_opacity_section", array(
        "default" => ".75",
        "sanitize_callback" => "bovity_sanitize_float_theme",
    ));
    $wp_customize->add_control("bovity_breadcrum_opacity_section", array(
        "label" => __("Breadcrumbs Overlay Opacity", "bovity"),
        "section" => "bovity_breadcrumb_settings",
        "type" => "number",
        "input_attrs" => array(
            "min" => "0.01",
            "step" => "0.01",
            "max" => "1",
        ),
    ));
    $wp_customize->add_setting("braedcrumb_height", array(
        "default" => "390",
        "sanitize_callback" => "bovity_sanitize_float_theme",
    ));
    $wp_customize->add_control("braedcrumb_height", array(
        "label" => __("Breadcrumb Header Height", "bovity"),
        "section" => "bovity_breadcrumb_settings",
        "type" => "number",
        "input_attrs" => array(
            "min" => "20",
            "step" => "",
            "max" => "100",
        ),
        "priority" => 10,
    ));

    $wp_customize->add_setting("bovity_breadcrumb_title_color", array(
        "sanitize_callback" => "sanitize_hex_color",
        "default" => "#fff",
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            "bovity_breadcrumb_title_color",
            array(
                "label" => esc_html__("Breadcrumb Title Color", "bovity"),
                "section" => "bovity_breadcrumb_settings",
                "description" => esc_html__(
                    "Select To Change Breadcrumb Title Color",
                    "bovity"
                ),
            )
        )
    );

    $wp_customize->add_setting("bovity_header_show_blog", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 0,
    ));
    $wp_customize->add_control("bovity_header_show_blog", array(
        "type" => "checkbox",
        "label" => esc_html__("Disable Blog Page Header", "bovity"),
        "section" => "bovity_breadcrumb_settings",
        "description" => esc_html__(
            "Check this box to Disable Page Header on Blog Page",
            "bovity"
        ),
    ));

    $wp_customize->add_setting("bovity_header_show_single_blog", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 0,
    ));
    $wp_customize->add_control("bovity_header_show_single_blog", array(
        "type" => "checkbox",
        "label" => esc_html__("Disable Single Post Header", "bovity"),
        "section" => "bovity_breadcrumb_settings",
        "description" => esc_html__(
            "Check this box to Disable Page Header on Single Post",
            "bovity"
        ),
    ));

    $wp_customize->add_setting("bovity_header_show_single_page", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 0,
    ));
    $wp_customize->add_control("bovity_header_show_single_page", array(
        "type" => "checkbox",
        "label" => esc_html__("Disable Single Page Header", "bovity"),
        "section" => "bovity_breadcrumb_settings",
        "description" => esc_html__(
            "Check this box to Disable Page Header on Single Page",
            "bovity"
        ),
    ));

    $wp_customize->add_setting("bovity_header_show_breadcrumb", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 0,
    ));
    $wp_customize->add_control("bovity_header_show_breadcrumb", array(
        "type" => "checkbox",
        "label" => esc_html__("Disable Breadcrumbs", "bovity"),
        "section" => "bovity_breadcrumb_settings",
        "description" => esc_html__(
            "Check this box to Disable Breadcrumbs on all pages and posts",
            "bovity"
        ),
    ));

    $wp_customize->add_section("bovity_fonts_style", array(
        "title" => esc_html__("Theme Typography", "bovity"),
        "panel" => "section_settings",
    ));

    $wp_customize->add_setting("bovity_show_typography", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 0,
    ));
    $wp_customize->add_control("bovity_show_typography", array(
        "type" => "checkbox",
        "label" => esc_html__("Enable Typography", "bovity"),
        "section" => "bovity_fonts_style",
        "description" => esc_html__(
            "Check this box to Enable Custom Typography",
            "bovity"
        ),
    ));

    $wp_customize->add_setting("bovity_typography_base_font_family", array(
        "sanitize_callback" => "sanitize_text_field",
        "default" => "",
    ));
    $wp_customize->add_control(
        new AvadantaWP_Customizer_Typography_Control(
            $wp_customize,
            "bovity_typography_base_font_family",
            array(
                "label" => esc_html__("Font Family", "bovity"),
                "section" => "bovity_fonts_style",
                "settings" => "bovity_typography_base_font_family",
                "type" => "select",
            )
        )
    );

    $wp_customize->add_setting("bovity_typography_h1_font_family", array(
        "sanitize_callback" => "sanitize_text_field",
        "default" => "",
    ));
    $wp_customize->add_control(
        new AvadantaWP_Customizer_Typography_Control(
            $wp_customize,
            "bovity_typography_h1_font_family",
            array(
                "label" => esc_html__("H1 to H6 Font Family", "bovity"),
                "section" => "bovity_fonts_style",
                "settings" => "bovity_typography_h1_font_family",
                "type" => "select",
            )
        )
    );

    $wp_customize->add_section("bovity_sticky_settings", array(
        "priority" => null,
        "title" => esc_html__("Sticky Menu/Scroll Up Option", "bovity"),
        "description" => "",
        "panel" => "section_settings",
    ));

    $wp_customize->add_setting("bovity_sticky_thumb", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 0,
    ));
    $wp_customize->add_control("bovity_sticky_thumb", array(
        "type" => "checkbox",
        "label" => esc_html__("Disable Sticky Menu", "bovity"),
        "section" => "bovity_sticky_settings",
        "description" => esc_html__(
            "Check this box to Disable Sticky Menu.",
            "bovity"
        ),
    ));

    $wp_customize->add_setting("bovity_scroll_thumb", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 0,
    ));
    $wp_customize->add_control("bovity_scroll_thumb", array(
        "type" => "checkbox",
        "label" => esc_html__("Disable Scroll To Top", "bovity"),
        "section" => "bovity_sticky_settings",
        "description" => esc_html__(
            "Check this box to Disable Scroll To Top.",
            "bovity"
        ),
    ));

    $wp_customize->add_setting("bovity_preloader_option", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 0,
    ));
    $wp_customize->add_control("bovity_preloader_option", array(
        "type" => "checkbox",
        "label" => esc_html__("Disable Preloader Option", "bovity"),
        "section" => "bovity_sticky_settings",
        "description" => esc_html__(
            "Check this box to Disable Preloader",
            "bovity"
        ),
    ));

    $wp_customize->add_section("bovity_bottom_footer_settings", array(
        "priority" => null,
        "title" => esc_html__("Bottom Footer Options", "bovity"),
        "description" => "",
        "panel" => "section_settings",
    ));

    $wp_customize->add_setting("bovity_copyright_enable", array(
        "sanitize_callback" => "bovity_sanitize_checkbox",
        "default" => 0,
    ));
    $wp_customize->add_control("bovity_copyright_enable", array(
        "type" => "checkbox",
        "label" => esc_html__("Disable Copyright Section?", "bovity"),
        "section" => "bovity_bottom_footer_settings",
        "description" => esc_html__(
            "Check this box to Disable copyright section.",
            "bovity"
        ),
    ));
    $wp_customize->add_setting("bovity_copyright_text", array(
        "sanitize_callback" => "bovity_sanitize_text",
        /* translators: %s: Copyright Text */
        "default" => sprintf(
            __('Proudly powered by %1$s WordPress %3$s', "bovity"),
            '<a href="https://wordpress.org/" target="_blank">',
            '<a href="" target="_blank">',
            "</a>"
        ),
    ));
    $wp_customize->add_control("bovity_copyright_text", array(
        "label" => esc_html__("Copyright Content Here", "bovity"),
        "section" => "bovity_bottom_footer_settings",
        "type" => "textarea",
    ));

}
add_action("customize_register", "bovity_sections_settings");

/**
 * Add selective refresh for Front page section section controls.
 */
function avadanta_register_home_section_partials($wp_customize)
{
    //News
    $wp_customize->selective_refresh->add_partial("home_news_section_title", array(
        "selector" => ".section-module.blog .section-subtitle",
        "settings" => "home_news_section_title",
        "render_callback" => "avadanta_home_news_section_title_render_callback",
    ));

    $wp_customize->selective_refresh->add_partial(
        "home_news_section_discription",
        array(
            "selector" => ".section-module.blog .section-title",
            "settings" => "home_news_section_discription",
            "render_callback" =>
                "avadanta_home_news_section_discription_render_callback",
        )
    );
}
add_action("customize_register", "avadanta_register_home_section_partials");

function avadanta_home_news_section_title_render_callback()
{
    return get_theme_mod("home_news_section_title");
}

function avadanta_home_news_section_discription_render_callback()
{
    return get_theme_mod("home_news_section_discription");
}

function avadanta_sanitize_radio($input, $setting)
{
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible radio box options
    $choices = $setting->manager->get_control($setting->id)->choices;

    //return input if valid or return default option
    return array_key_exists($input, $choices) ? $input : $setting->default;
}

function bovity_sanitize_float_theme($input)
{
    return filter_var(
        $input,
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION
    );
}

require BOVITY_THEME_DIR .
    "/lib/customizer/bovity-customize-typography-control.php";

require get_template_directory() .
    "/lib/customizer-plugin-notice/bovity-customizer-notify.php";
$bovity_config_customizer = array(
    "recommended_plugins" => array(
        "avadanta-companion" => array(
            "recommended" => true,
            "description" => sprintf(
                __(
                    "Install and activate Avadanta Companion For HomePage",
                    "bovity"
                )
            ),
        ),
    ),
    "recommended_actions" => [],
    "recommended_actions_title" => esc_html__("Recommended Actions", "bovity"),
    "recommended_plugins_title" => esc_html__("Recommended Plugin", "bovity"),
    "install_button_label" => esc_html__("Install and Activate", "bovity"),
    "activate_button_label" => esc_html__("Activate", "bovity"),
    "avadanta_deactivate_button_label" => esc_html__("Deactivate", "bovity"),
);
Avadanta_Customizer_Notify::init(
    apply_filters(
        "avadanta_customizer_notify_array",
        $bovity_config_customizer
    )
);
