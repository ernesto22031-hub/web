<?php
/**
 * The header for the UrbanFit theme
 *
 * @package UrbanFit
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- ========== HEADER ========== -->
    <header class="header" id="header">
        <div class="header-inner">
            <!-- Logo -->
            <div class="logo">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    ?>
                    <div class="logo-icon">
                        <i class="fas fa-dumbbell"></i>
                    </div>
                    <div>
                        <span><?php echo bloginfo( 'name' ); ?></span>
                        <div class="logo-tagline"><?php echo bloginfo( 'description' ); ?></div>
                    </div>
                    <?php
                }
                ?>
            </div>

            <!-- Navigation -->
            <nav class="nav-links">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => '',
                    'container'      => false,
                    'fallback_cb'    => 'urbanfit_default_menu',
                ) );
                ?>
            </nav>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <!-- Default menu fallback -->
    <?php
    function urbanfit_default_menu() {
        ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <a href="#services">Services</a>
        <a href="#about">About</a>
        <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a>
        <a href="#contact" class="nav-cta">Contact</a>
        <?php
    }
    ?>
