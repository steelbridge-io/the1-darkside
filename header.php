<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_1_Darkside
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'the1-darkside' ); ?></a>
	<header id="masthead" class="site-header">
        <?php
        $default = '';
        if(get_theme_mod('title_one') !== $default) : ?>
        <div class="container-fluid no-padding no-margin mh-cta-slider">
            <div id="masthead-cta-slider" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div id="cta-slider1-refresh" class="carousel-item active">
                        <a class="header-cta-slider-link" href="<?php echo get_theme_mod('title_one_link'); ?>" title="<?php echo get_theme_mod('title_one') ?>">
                        <h3><?php echo get_theme_mod('title_one') ?><i class="lni lni-chevron-right-circle"></i></i></h3>
                        </a>
                    </div>
                    <?php if(get_theme_mod('title_two') !== $default) : ?>
                    <div id="cta-slider2-refresh" class="carousel-item">
                        <a class="header-cta-slider-link" href="<?php echo get_theme_mod('title_two_link'); ?>" title="<?php echo get_theme_mod('title_two') ?>">
                        <h3><?php echo get_theme_mod('title_two') ?><i class="lni lni-chevron-right-circle"></i></i></h3>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if(get_theme_mod('title_three') !== $default) : ?>
                    <div id="cta-slider3-refresh" class="carousel-item">
                       <a class="header-cta-slider-link" href="<?php echo get_theme_mod('title_three_link'); ?>" title="<?php echo get_theme_mod('title_three', $default) ?>">
                        <h3><?php echo get_theme_mod('title_three') ?><i class="lni lni-chevron-right-circle"></i></h3>
                       </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="container">
            <div class="site-branding">
             <div class="row">
              <?php if ( is_front_page() && is_home() ) : ?>
              <div class="col-lg-3">
                <?php
                the_custom_logo();
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              </div>
              <div class="col-3">
	                <?php get_search_form(); ?>
              </div>
                 <div class="col-lg-3">
                    <!--Custom cart start-->
	                <?php global $woocommerce; ?>
                    <a class="header-cart-url" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"
                       title="<?php _e('Cart View', 'woothemes'); ?>"><i class="lni lni-cart"></i>
                        <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'),
                            $woocommerce->cart->cart_contents_count);?>  -
                        <?php echo $woocommerce->cart->get_cart_total(); ?>
                    </a>
                    <!--Custom cart end-->
                 </div>
                    <?php
                else :
                    ?>

                <div class="col-xl-3">
                    <?php the_custom_logo(); ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                </div>
                <div class="col-md-6 col-xl-3">
                 <?php get_search_form(); ?>
                </div>
                <div class="col-md-6 col-xl-3">
                    <!--Custom cart start-->
                    <?php global $woocommerce; ?>
                    <a class="header-cart-url" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"
                       title="<?php _e('Cart View', 'woothemes'); ?>"><i class="lni lni-cart"></i>
                        <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'),
                            $woocommerce->cart->cart_contents_count);?>  -
                        <?php echo $woocommerce->cart->get_cart_total(); ?>
                    </a>
                    <!--Custom cart end-->
                </div>
                <?php
                endif;
                $the1_darkside_description = get_bloginfo( 'description', 'display' );
                if ( $the1_darkside_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $the1_darkside_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif; ?>
             </div>
            </div><!-- .site-branding -->
        </div>

        <nav class="navbar navbar-expand-md navbar bg-dark">
            <div class="container-fluid">
                <div class="container">
                <!--<a class="navbar-brand" href="#">Navbar</a>-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="main-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                        'depth' => 2,
                        'walker' => new bootstrap_5_wp_nav_menu_walker()
                    ));
                    ?>

                </div>
                </div>
            </div>
        </nav>
	</header><!-- #masthead -->
