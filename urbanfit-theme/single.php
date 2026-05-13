<?php
/**
 * The template for displaying single posts
 *
 * @package UrbanFit
 */

get_header();
?>

<main id="main" class="site-main">
    <?php
    while ( have_posts() ) {
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="section">
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <div style="color: var(--text-muted); margin-top: 10px;">
                        <i class="far fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?>
                        | <i class="far fa-user"></i> <?php the_author(); ?>
                    </div>
                </header>

                <?php
                if ( has_post_thumbnail() ) {
                    ?>
                    <div style="margin: 30px 0;">
                        <?php the_post_thumbnail( 'urbanfit-hero', array( 'style' => 'width: 100%; height: auto; border-radius: 8px;' ) ); ?>
                    </div>
                    <?php
                }
                ?>

                <div class="entry-content">
                    <?php
                    the_content();
                    wp_link_pages( array(
                        'before' => '<div class="page-links">',
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
            </div>
        </article>

        <!-- Comments -->
        <?php
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
        ?>
        <?php
    }
    ?>
</main>

<?php
get_footer();
