<?php
/**
 * content-link.php
 *
 * Default template for displaying posts with the link post format
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- article content -->
	<div class="entry-content">
		<?php
			the_content( __( 'Continue reading &rarr;', 'versover' ) );

			wp_link_pages();
		?>
	</div> <!-- /article content -->

	<!-- article footer -->
	<footer class="entry-footer">
		<p class="entry-meta">
			<?php
			// display the meta information
			versover_post_meta();
			?>
		</p>

		<?php
		// if we have a single page and the author bio exists, display it
		if ( is_single() && get_the_author_meta( 'description' ) ) {
			echo '<h2>' . __( 'Written by ', 'versover' ) . get_the_author() . '</h2>';
			echo '<p>' . the_author_meta( 'description' ) . '</p>';
		}
		?>
	</footer> <!-- /article footer -->
</article>
