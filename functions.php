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

/**
 * 7. Register widget area
 */
if ( ! function_exists( 'versover_widget_init' ) ) {
    function versover_widget_init() {
        if ( function_exists( 'register_sidebar' ) ) {
            register_sidebar( array(
                'name'          => __( 'Main Widget Area', 'versover' ),
                'id'            => 'sidebar-1',
                'description'   => __( 'Appears on post and pages', 'versover' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div> <!-- end widget -->',
                'before_title'  => '<h5 class="widget-title">',
                'after_title'   => '</h5>',
            ) );

            register_sidebar( array(
                'name'          => __( 'Footer Widget Area', 'versover' ),
                'id'            => 'sidebar-2',
                'description'   => __( 'Appears on the footer', 'versover' ),
                'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
                'after_widget'  => '</div> <!-- end widget -->',
                'before_title'  => '<h5 class="widget-title">',
                'after_title'   => '</h5>',
            ) );
        }
    }

    add_action( 'widgets_init', 'versover_widget_init' );
}

/**
 * 8. Function that validates a field's length
 */
if ( ! function_exists( 'versover_validate_length' ) ) {
	function versover_validate_length( $fieldValue, $minLength ) {
		// First, remove trailing and leading whitespace
		return ( strlen( trim( $fieldValue ) ) > $minLength );
	}
}

/**
 * 9. Include the generated css in the page header
 */
if ( ! function_exists( 'versover_load_wp_head' ) ) {
	function versover_load_wp_head() {
		// get the logo
		$logo        = IMAGES . '/logo.png';
		$logo_retina = IMAGES . '/logo@2x.png';

		$logo_size = getimagesize( $logo );
		?>
		<!-- logo css -->
		<style>
			.site-logo a {
				background: transparent url( <?php echo $logo; ?> ) 0 0 no-repeat;
				width: <?php echo $logo_size[0] ?>px;
				height: <?php echo $logo_size[1] ?>px;
				display: inline-block;
			}

			@media only screen and (-webkit-min-device-pixel-ratio: 1.5),
			only screen and (-moz-min-device-pixel-ratio: 1.5),
			only screen and (-o-min-device-pixel-ratio: 3/2),
			only screen and (min-device-pixel-ratio: 1.5) {
				.site-logo a {
					background: transparent url( <?php echo $logo_retina; ?> ) 0 0 no-repeat;
					background-size: <?php echo $logo_size[0]; ?>px <?php echo $logo_size[1]; ?>px;
				}
			}
		</style>
		<?php
	}

	add_action( 'wp_head', 'versover_load_wp_head' );
}

/**
 * 10. Load the custom scripts for the theme
 */
if ( ! function_exists( 'versover_scripts' ) ) {
	function versover_scripts() {
		// adds support for pages with threaded comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// register scripts
		wp_register_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'alpha-custom', SCRIPTS . '/scripts.js', array( 'jquery' ), false, true );

		// load the custom scripts
		wp_enqueue_script( 'bootstrap-js' );
		wp_enqueue_script( 'versover-custom' );

		// load the stylesheets
		wp_enqueue_style( 'font-awesome', THEMEROOT . '/css/font-awesome.min.css' );
		wp_enqueue_style( 'versover-master', THEMEROOT . '/css/master.css' );
	}

	add_action( 'wp_enqueue_scripts', 'versover_scripts' );
}
