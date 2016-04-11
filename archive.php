<?php
/**
 * archive.php
 *
 * The template for displaying archive page
 */
?>

<?php get_header(); ?>

<div class="main-content col-md-8" role="main">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1>
				<?php
					if ( is_day() ) {
						printf( __( 'Daily Archives for %s', 'versover' ), get_the_date() );
					} elseif ( is_month() ) {
						printf( __( 'Monthly Archives for %s', 'versover' ), get_the_date( _x( 'F Y', 'Monthly archives date format', 'versover' ) ) );
					} elseif ( is_year() ) {
						printf( __( 'Yearly Archives for %s', 'versover' ), get_the_date( _x( 'Y', 'Yearly archives date format', 'versover' ) ) );
					} else {
						_e( 'Archives', 'versover' );
					}
				?>
			</h1>
		</header>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php versover_paging_nav(); ?>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
</div> <!-- /main content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
