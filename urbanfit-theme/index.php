<?php
/**
 * The main template file
 *
 * @package UrbanFit
 */

get_header();
?>

<!-- ========== HERO SECTION ========== -->
<section class="hero" id="home" style="background-image: url('<?php echo esc_url( urbanfit_get_hero_image() ); ?>')">
    <div class="hero-parallax-bg" style="background-image: url('<?php echo esc_url( urbanfit_get_hero_image() ); ?>'); background-attachment: fixed;"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="hero-badge"><?php esc_html_e( 'Welcome to', 'urbanfit' ); ?> <?php bloginfo( 'name' ); ?></div>
        <h1><?php echo wp_kses_post( urbanfit_get_hero_title() ); ?></h1>
        <p><?php echo wp_kses_post( urbanfit_get_hero_subtitle() ); ?></p>
        <div class="hero-buttons">
            <a href="<?php echo esc_url( urbanfit_get_btn_primary_url() ); ?>" class="btn btn-primary"><?php echo esc_html( urbanfit_get_btn_primary_text() ); ?></a>
            <a href="#services" class="btn btn-outline"><?php esc_html_e( 'Learn More', 'urbanfit' ); ?></a>
        </div>
    </div>
</section>

<!-- ========== BLOG POSTS ========== -->
<section class="section" id="blog">
    <div class="section-header">
        <span class="badge"><?php esc_html_e( 'Latest News', 'urbanfit' ); ?></span>
        <h2><?php esc_html_e( 'From Our', 'urbanfit' ); ?> <span><?php esc_html_e( 'Blog', 'urbanfit' ); ?></span></h2>
        <div class="section-divider"></div>
    </div>

    <div class="grid-3">
        <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>
                <article class="card">
                    <?php
                    if ( has_post_thumbnail() ) {
                        ?>
                        <div style="height: 200px; overflow: hidden; border-radius: 8px; margin-bottom: 20px;">
                            <?php the_post_thumbnail( 'urbanfit-card', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
                        </div>
                        <?php
                    }
                    ?>
                    <h3><?php the_title(); ?></h3>
                    <div style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 10px;">
                        <i class="far fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?>
                    </div>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="display: block; margin-top: 20px; text-align: center;"><?php esc_html_e( 'Read More', 'urbanfit' ); ?></a>
                </article>
                <?php
            }
        } else {
            ?>
            <p><?php esc_html_e( 'No posts found.', 'urbanfit' ); ?></p>
            <?php
        }
        ?>
    </div>
</section>

<?php
get_footer();
