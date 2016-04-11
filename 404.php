<?php
/**
 * 404.php
 *
 * The template for 404 page (Not found)
 */
?>

<?php get_header(); ?>

	<div class="container-404">
		<?php _e( 'Error 404. Nothing found', 'versover' ); ?>

		<?php _e( 'It looks like nothing was found here. Maybe try a search?', 'versover' ); ?>

		<?php get_search_form(); ?>
	</div>	<!-- /.container-404 -->

<?php get_footer(); ?>
