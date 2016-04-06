<?php
/**
 * functions.php
 *
 * The theme's functions
 */

/**
 * 1. Constants
 */
define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/images' );
define( 'SCRIPTS', THEMEROOT . '/js' );
define( 'FRAMEWORK', get_template_directory() . '/framework' );

/**
 * 2. Load the framework
 */
require_once FRAMEWORK . '/init.php';

/**
 * 3. Set up the content width value based on theme's design
 */
if ( ! isset($content_width) ) {
	$content_width = 800;
}

/**
 * 4. Set up theme default and register various supported features
 */
if ( !function_exists( 'versover_setup' ) ) {
	function versover_setup() {
		// make the theme available for translation
		$lang_dir = THEMEROOT . '/languages';
		load_theme_textdomain( 'versover', $lang_dir );

		// add support for post formats
		add_theme_support( 'post-formats', array(
			'gallery',
			'link',
			'image',
			'quote',
			'video',
			'audio',
		) );

		// add support for automatic feed links
		add_theme_support( 'automatic-feed-links' );

		// add support for post thumbnails
		add_theme_support( 'post-thumbnails' );

		// register nav menus
		register_nav_menus( array(
			'main-menu' => __( 'Main Menu', 'versover' ),

		) );
	}

	add_action( 'after_theme_setup', 'versover_setup' );
}

/**
 * 5. Display a meta information for a specific post
 */
if ( ! function_exists( 'versover_post_meta' ) ) {
    function versover_post_meta() {
        echo '<ul class="list-inline entry-meta">';

        if ( get_post_type() === 'post' ) {
            // if the post is sticky, mark it.
            if ( is_sticky() ) {
                echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i>' . __( 'Sticky', 'versover' ) . '</li>';
            }

            // get the post author
            printf(
                '<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                get_the_author()
            );

            // get the date
            echo '<li class="meta-date">' . get_the_date() . '</li>';

            // the categories
            $category_list = get_the_category_list( ', ' );
            if ( $category_list ) {
                echo '<li class="meta-categories">' . $category_list . '</li>';
            }
        }
    }
}
