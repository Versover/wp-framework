<?php
/**
 * content-audio.php
 *
 * Default template for displaying posts with the audio post format
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Article header -->
	<header class="entry-header"> <?php
		// if single page display the title
		// else display the title in a link
		if ( is_single() ) : ?>
			<h1><?php the_title(); ?></h1>
		<?php else : ?>
			<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>

		<p class="entry-meta">
			<?php
			// display the meta information
			versover_post_meta();
			?>
		</p>
	</header> <!-- end entry header -->

	<!-- article content -->
	<div class="entry-content">
		<?php
		the_content( __( 'Continue reading &rarr;', 'versover' ) );

		wp_link_pages();
		?>
	</div> <!-- /article content -->

	<!-- article footer -->
	<footer class="entry-footer">
		<?php
		// if we have a single page and the author bio exists, display it
		if ( is_single() && get_the_author_meta( 'description' ) ) {
			echo '<h2>' . __( 'Written by ', 'versover' ) . get_the_author() . '</h2>';
			echo '<p>' . the_author_meta( 'description' ) . '</p>';
		}
		?>
	</footer> <!-- /article footer -->
</article>
