<?php
/**
 * tag.php
 *
 * The template for displaying tag page
 */
?>

<?php get_header(); ?>

<div class="main-content col-md-8" role="main">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1>
				<?php
				printf( __( 'Tag archives %s', 'versover' ), single_tag_title( '', false ) );
				?>
			</h1>

			<?php
			// show an optional tag description
			if ( tag_description() ) {
				echo '<p>' . tag_description() . '</p>';
			}
			?>
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
