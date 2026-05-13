<?php
/**
 * The footer for the UrbanFit theme
 *
 * @package UrbanFit
 */
?>

    <!-- ========== FOOTER ========== -->
    <footer>
        <div class="footer-content">
            <!-- Footer Column 1 -->
            <div class="footer-section">
                <h3><?php bloginfo( 'name' ); ?></h3>
                <p><?php bloginfo( 'description' ); ?></p>
                <div class="footer-social">
                    <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Footer Column 2 -->
            <div class="footer-section">
                <h3><?php esc_html_e( 'Quick Links', 'urbanfit' ); ?></h3>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'echo'           => true,
                ) );
                ?>
            </div>

            <!-- Sidebar Widgets -->
            <?php
            if ( is_active_sidebar( 'footer-3' ) ) {
                echo '<div class="footer-section">';
                dynamic_sidebar( 'footer-3' );
                echo '</div>';
            }

            if ( is_active_sidebar( 'footer-4' ) ) {
                echo '<div class="footer-section">';
                dynamic_sidebar( 'footer-4' );
                echo '</div>';
            }
            ?>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'urbanfit' ); ?></p>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
