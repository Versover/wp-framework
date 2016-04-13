<?php
/**
 * header.php
 *
 * The header of the theme
 */
?>
<?php
	$favicon = IMAGES . '/icons/favicon.png';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="<?php echo $favicon; ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<!-- header -->
	<header class="side-header" role="banner">
		<div class="container header-contents">
			<div class="row">
				<div class="col-xs-3">
					<div class="site-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
					</div>
				</div>
				<div class="col-xs-9">
					<nav class="site-navigation" role="navigation">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'main-menu',
								'menu_class'     => 'site-menu',
							) );
						?>
					</nav>
				</div>
			</div>
		</div>
	</header> <!-- /header -->

	<!-- main content area -->
	<div class="container">
		<div class="row">
