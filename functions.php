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

	add_action( 'after_setup_theme', 'versover_setup' );
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

            // the tags
            $tag_list = get_the_tag_list( '', ', ' );
            if ( $tag_list ) {
                echo '<li class="meta-tags">' . $tag_list . '</li>';
            }

            // comments link
            if ( comments_open() ) {
                echo '<li>';
                echo '<span class="meta-reply">';
                comments_popup_link( __( 'Leave a comment', 'versover' ), __( 'One comment so far', 'versover' ), __( 'View all % comments', 'versover' ) );
                echo '</span>';
                echo '</li>';
            }

            // edit link
            if ( is_user_logged_in() ) {
                echo '<li>';
                edit_post_link( __( 'Edit', 'versover' ), '<span class="meta-edit">', '</span>' );
                echo '</li>';
            }
        }
    }
}

/**
 * 6. Display pagination
 */
if ( ! function_exists( 'versover_paging_nav' ) ) {
	function versover_paging_nav() { ?>
		<ul>
			<?php if ( get_preview_post_link() ) : ?>
				<li class="next">
					<?php previous_post_link( __( 'Newer Posts &rarr;', 'versover' ) ); ?>
				</li>
			<?php endif; ?>

			<?php if ( get_next_post_link() ) : ?>
				<li class="previous">
					<?php next_post_link( __( '&larr; Newer Older', 'versover' ) ); ?>
				</li>
			<?php endif; ?>
		</ul> <?php
	}
}
