<?php
/**
 * Single post template
 *
 * @package ESUcodes
 */

get_header(); ?>

<!-- Progress Bar -->
<div class="progress-bar" id="progressBar"></div>

<!-- Blog Detail Container -->
<div class="blog-detail-container">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <!-- Blog Header -->
            <div class="blog-detail-header">
                <div class="blog-category-badge">
                    <?php the_category(', '); ?>
                </div>
                <h1 class="blog-detail-title"><?php the_title(); ?></h1>
                <div class="blog-detail-meta">
                    <div class="blog-author-info">
                        <div class="author-avatar">
                            <?php 
                            $author = get_the_author();
                            echo strtoupper(substr($author, 0, 1)); 
                            ?>
                        </div>
                        <div class="author-details">
                            <span class="author-name"><?php the_author(); ?></span>
                            <span class="publish-date"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' önce'; ?></span>
                        </div>
                    </div>
                    <div class="blog-stats">
                        <span class="read-time"><?php echo get_reading_time(); ?> dk okuma</span>
                    </div>
                </div>
            </div>

            <!-- Blog Content -->
            <div class="blog-detail-content">
                <div class="blog-content-wrapper">
                    <article class="blog-article">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="blog-hero-image">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="article-content">
                            <?php the_content(); ?>
                        </div>
                    </article>

                    <!-- Sidebar -->
                    <aside class="blog-sidebar">
                        <div class="sidebar-section">
                            <h3 class="sidebar-title">Yazar Hakkında</h3>
                            <div class="author-card">
                                <div class="author-avatar-large">
                                    <?php 
                                    $author = get_the_author();
                                    echo strtoupper(substr($author, 0, 1)); 
                                    ?>
                                </div>
                                <div class="author-info">
                                    <h4 class="author-name-large"><?php the_author(); ?></h4>
                                    <p class="author-bio"><?php echo get_the_author_meta('description'); ?></p>
                                    <div class="author-social">
                                        <?php if (get_the_author_meta('twitter')) : ?>
                                            <a href="<?php echo get_the_author_meta('twitter'); ?>" class="social-link">Twitter</a>
                                        <?php endif; ?>
                                        <?php if (get_the_author_meta('github')) : ?>
                                            <a href="<?php echo get_the_author_meta('github'); ?>" class="social-link">GitHub</a>
                                        <?php endif; ?>
                                        <?php if (get_the_author_meta('linkedin')) : ?>
                                            <a href="<?php echo get_the_author_meta('linkedin'); ?>" class="social-link">LinkedIn</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-section">
                            <h3 class="sidebar-title">İlgili Yazılar</h3>
                            <div class="related-posts">
                                <?php
                                $related_posts = new WP_Query(array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'post__not_in' => array(get_the_ID()),
                                    'category__in' => wp_get_post_categories(get_the_ID()),
                                    'orderby' => 'rand'
                                ));

                                if ($related_posts->have_posts()) :
                                    while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                        <div class="related-post">
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                            <a href="<?php the_permalink(); ?>" class="read-more">Devamını Oku →</a>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                else : ?>
                                    <p>İlgili yazı bulunamadı.</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="sidebar-section">
                            <h3 class="sidebar-title">Etiketler</h3>
                            <div class="tags">
                                <?php
                                $tags = get_the_tags();
                                if ($tags) :
                                    foreach ($tags as $tag) : ?>
                                        <span class="tag"><?php echo $tag->name; ?></span>
                                    <?php endforeach;
                                endif; ?>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php
// Helper functions
function get_reading_time() {
    $content = get_the_content();
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // 200 words per minute
    return $reading_time;
}

function get_post_views($post_id) {
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        return "0";
    }
    return $count;
}

function set_post_views($post_id) {
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}

// Track post views
set_post_views(get_the_ID());
?>

<?php get_footer(); ?> 