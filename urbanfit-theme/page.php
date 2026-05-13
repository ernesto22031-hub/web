<?php
/**
 * The template for displaying pages
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
                </header>

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
        <?php
    }
    ?>
</main>

<?php
get_footer();
