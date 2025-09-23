<?php
/**
 * Archive template
 *
 * @package ESUcodes
 */

get_header(); ?>

<!-- Progress Bar -->
<div class="progress-bar" id="progressBar"></div>

<!-- Blog Header -->
<section class="blog-header">
    <div class="container">
        <h1 class="blog-title">
            <?php
            if (is_category()) {
                single_cat_title();
            } elseif (is_tag()) {
                single_tag_title();
            } elseif (is_author()) {
                the_author();
            } elseif (is_date()) {
                if (is_year()) {
                    echo get_the_date('Y');
                } elseif (is_month()) {
                    echo get_the_date('F Y');
                } else {
                    echo get_the_date();
                }
            } else {
                _e('Blog', 'esucodes');
            }
            ?>
        </h1>
        <p class="blog-subtitle">
            <?php
            if (is_category()) {
                echo category_description();
            } elseif (is_tag()) {
                echo tag_description();
            } elseif (is_author()) {
                echo get_the_author_meta('description');
            } else {
                _e('Yazılım dünyasından en güncel bilgiler ve rehberler', 'esucodes');
            }
            ?>
        </p>
    </div>
</section>

<!-- Blog Content -->
<section class="blog-content">
    <div class="container">
        <!-- Filters -->
        <div class="blog-filters">
            <div class="filter-group">
                <label for="categoryFilter">Kategori:</label>
                <?php
                $current_object = get_queried_object();
                $selected_slug = (is_category() && isset($current_object->slug)) ? $current_object->slug : '';
                echo wp_dropdown_categories(array(
                    'show_option_all' => __('Tümü', 'esucodes'),
                    'orderby'        => 'name',
                    'hide_empty'     => 0,
                    'echo'           => 0,
                    'id'             => 'categoryFilter',
                    'class'          => 'filter-select',
                    'value_field'    => 'slug',
                    'selected'       => $selected_slug,
                ));
                ?>
            </div>
            <div class="filter-group">
                <label for="sortFilter">Sıralama:</label>
                <select id="sortFilter" class="filter-select">
                    <option value="newest">En Yeni</option>
                    <option value="oldest">En Eski</option>
                    <option value="popular">En Popüler</option>
                </select>
            </div>
        </div>

        <!-- Blog Posts Grid -->
        <div class="blog-grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
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
                <?php endwhile; ?>
            <?php else : ?>
                <div class="no-posts">
                    <h3><?php _e('Yazı bulunamadı', 'esucodes'); ?></h3>
                    <p><?php _e('Aradığınız kriterlere uygun yazı bulunamadı.', 'esucodes'); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if (get_next_posts_link() || get_previous_posts_link()) : ?>
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'prev_text' => __('← Önceki', 'esucodes'),
                    'next_text' => __('Sonraki →', 'esucodes'),
                    'type' => 'list',
                    'class' => 'pagination-list'
                ));
                ?>
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