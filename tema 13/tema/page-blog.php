<?php
/**
 * Blog page template
 *
 * @package ESUcodes
 */

get_header(); ?>

<!-- Progress Bar -->
<div class="progress-bar" id="progressBar"></div>

<!-- Blog Header -->
<section class="blog-header">
    <div class="container">
        <h1 class="blog-title"><?php echo get_theme_mod('blog_title', 'Blog'); ?></h1>
        <p class="blog-subtitle"><?php echo get_theme_mod('blog_subtitle', 'Yazılım dünyasından en güncel bilgiler ve rehberler'); ?></p>
    </div>
</section>

<!-- Blog Content -->
<section class="blog-content">
    <div class="container">
        <!-- Filters -->
        <div class="blog-filters">
            <div class="filter-group">
                <label for="categoryFilter">Kategori:</label>
                <select id="categoryFilter" class="filter-select">
                    <option value="">Tümü</option>
                    <?php
                    $categories = get_categories();
                    foreach ($categories as $category) {
                        echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="filter-group">
                <label for="searchInput">Arama:</label>
                <input type="text" id="searchInput" class="filter-input" placeholder="Yazı ara...">
            </div>
        </div>

        <!-- Blog Posts Grid -->
        <div class="blog-grid">
            <?php
            $blog_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 9,
                'post_status' => 'publish'
            ));

            if ($blog_posts->have_posts()) :
                while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                    <article class="blog-card" onclick="window.location.href='<?php the_permalink(); ?>'">
                        <div class="blog-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <div class="blog-category"><?php the_category(', '); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="blog-content-inner">
                            <h2 class="blog-card-title"><?php the_title(); ?></h2>
                            <p class="blog-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                            </p>
                            <div class="blog-meta">
                                <span class="blog-author"><?php the_author(); ?></span>
                                <span class="blog-date"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' önce'; ?></span>
                                <span class="blog-read-time"><?php echo get_reading_time(); ?> dk okuma</span>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="blog-read-more">Devamını Oku →</a>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <div class="no-posts">
                    <h3><?php _e('Yazı bulunamadı', 'esucodes'); ?></h3>
                    <p><?php _e('Henüz blog yazısı bulunmuyor.', 'esucodes'); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Load More Button -->
        <?php if ($blog_posts->max_num_pages > 1) : ?>
            <div class="load-more-container">
                <button class="btn btn-primary load-more-btn" onclick="loadMorePosts(2)">
                    Daha Fazla Yazı Yükle
                </button>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
// Helper function for reading time
function get_reading_time() {
    $content = get_the_content();
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // 200 words per minute
    return $reading_time;
}
?>

<?php get_footer(); ?> 