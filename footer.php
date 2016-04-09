<?php
/**
 * footer.php
 *
 * The template for displaying the footer.
 */
?>
        </div> <!-- end row -->
    </div> <!-- end conteiner -->

<!-- site footer -->
<footer class="site-footer">
    <div class="container">
        <?php get_sidebar( 'footer' ); ?>
    </div>

    <div class="copyright">
        <p>
            &copy; <?php echo date( 'Y' ); ?>
            <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
            <?php _e( 'All rights reserved.', 'versover' ); ?>
        </p>
    </div>
</footer> <!-- end site footer -->

<?php wp_footer(); ?>
</body>
</html>
