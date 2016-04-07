<?php
/**
 * content-link.php
 *
 * Default template for displaying posts with the quote post format
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
	</footer> <!-- /article footer -->
</article>
