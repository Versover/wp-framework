<?php
/**
 * comments.php
 *
 * The template for displaying the comments
 */
?>

<?php
    // Prevent of direct loading of comments.php
    if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( $_SERVER['SCRIPT_FILENAME'] ) == 'comments.php' ) {
        exit( __( 'You cannot access to this page directly.', 'versover' ) );
    }
?>

<?php
    // If the post is password protected, display info text and return.
    if ( post_password_required() ) : ?>
        <p>
            <?php
                _e( 'This post is password protected. Enter the password to view the comments.', 'versover' );

                return;
            ?>
        </p>
    <?php endif; ?>

    <!-- comments area -->
    <div class="comments-area" id="comments">
        <?php if ( have_comments() ) : ?>
            <h2 class="comments-title">
                <?php
                    printf( _nx( 'One comment', '%1$s comments', get_comments_number(), 'Comment title', 'versover' ), number_format_i18n( get_comments_number() ) );
                ?>
            </h2>

            <ol class="comments">
                <?php wp_list_comments(); ?>
            </ol>

            <?php
                // if the comments are paginated, display the control
                if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                    <nav class="comment-nav" role="navigation">
                        <p class="comment-nav-prev">
                            <?php previous_comments_link( __( '&larr; Older comments', 'versover' ) ); ?>
                        </p>

                        <p class="comment-nav-next">
                            <?php next_comments_link( __( 'Newer comments &rarr;', 'versover' ) ); ?>
                        </p>
                    </nav> <!-- /comment nav -->
            <?php endif; ?>

            <?php
                // if the comments are closed display the info tag
                if ( ! comments_open() && get_comments_number() ) : ?>
                    <p class="no-comments">
                        <?php _e( 'Comments are closed.', 'versover' ); ?>
                    </p>
            <?php endif; ?>
        <?php endif; ?>

        <?php comment_form(); ?>
    </div> <!-- /comments area -->
