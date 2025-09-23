<?php
/**
 * Page template
 *
 * @package ESUcodes
 */

get_header(); ?>

<!-- Progress Bar -->
<div class="progress-bar" id="progressBar"></div>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php if (get_the_excerpt()) : ?>
            <p class="page-subtitle"><?php echo get_the_excerpt(); ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- Page Content -->
<section class="page-content">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="page-article">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="page-hero-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="page-content-inner">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?> 