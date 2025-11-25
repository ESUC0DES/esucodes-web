<?php
/**
 * Ana tema dosyası
 *
 * @package ESUcodes
 */

// Ana sayfa template'i - blog için ayrı sayfa kullanılacak

get_header(); ?>

<!-- Progress Bar -->
<div class="progress-bar" id="progressBar"></div>

<!-- Hero Section -->
<section class="hero">
    <div class="stars-container">
        <div class="stars"></div>
        <div class="twinkling"></div>
    </div>
    <div class="hero-content">
        <div class="hero-text">
            <h1 class="hero-title">ESUcodes</h1>
            <p class="hero-subtitle">Geleceğin Yazılım Topluluğu</p>
            <p class="hero-description">
                <?php echo get_theme_mod('hero_description', 'Yazılım dünyasında birlikte öğreniyor, birlikte büyüyoruz. Modern teknolojiler ve yenilikçi çözümler için doğru adrestesiniz.'); ?>
            </p>
            <?php
                if (function_exists('esucodes_safe_blog_url')) {
                    $blog_url = esucodes_safe_blog_url();
                } else {
                    $blog_url = home_url('/blog');
                }
            ?>
            <div class="hero-mobile-blog">
                <a href="<?php echo esc_url($blog_url); ?>" class="btn btn-primary btn-hero-mobile">Bloglar</a>
            </div>
        </div>
    </div>
</section>

<!-- Tech News Section -->
<section id="tech-news" class="tech-news">
    <div class="container">
        <h2 class="section-title">Teknolojide neler oluyor?</h2>
        <div class="news-grid">
            <?php
            $news = esucodes_get_tech_news();
            if (!is_wp_error($news) && !empty($news)) :
                foreach ($news as $item) :
                    $title = esc_html($item['title']);
                    $desc  = esc_html(wp_trim_words($item['description'], 24));
                    $url   = esc_url($item['url']);
                    $img   = esc_url($item['image']);
            ?>
            <article class="news-card" onclick="window.open('<?php echo $url; ?>','_blank')">
                <div class="news-image">
                    <?php if (!empty($img)) : ?>
                        <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
                    <?php else : ?>
                        <div class="post-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 19V5C21 3.9 20.1 3 19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19ZM8.5 13.5L11 16.51L14.5 12L19 18H5L8.5 13.5Z" fill="currentColor"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="news-content">
                    <h3 class="news-title"><a href="<?php echo $url; ?>" target="_blank" rel="noopener"><?php echo $title; ?></a></h3>
                    <p class="news-excerpt"><?php echo $desc; ?></p>
                    <?php if (!empty($item['source'])): ?>
                        <p class="news-meta" style="margin-top:0.5rem;color:var(--text-muted);font-size:0.9rem;">Kaynak: <?php echo esc_html($item['source']); ?></p>
                    <?php endif; ?>
                </div>
            </article>
            <?php endforeach; else : ?>
                <p class="no-posts">Şu anda haberler yüklenemedi. Lütfen daha sonra tekrar deneyin.</p>
            <?php endif; ?>
        </div>
    </div>
    </section>

<!-- Latest Blog Posts -->
<section class="latest-posts">
    <div class="container">
        <h2 class="section-title"><?php echo get_theme_mod('latest_posts_title', 'Son Blog Yazıları'); ?></h2>
        <div class="posts-grid">
            <?php
            $latest_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ));

            if ($latest_posts->have_posts()) :
                while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                    <article class="post-card" onclick="window.location.href='<?php the_permalink(); ?>'">
                        <div class="post-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php else : ?>
                                <div class="post-placeholder">
                                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 19V5C21 3.9 20.1 3 19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19ZM8.5 13.5L11 16.51L14.5 12L19 18H5L8.5 13.5Z" fill="currentColor"/>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><?php the_title(); ?></h3>
                            <p class="post-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                            <div class="post-meta">
                                <span class="post-author"><?php the_author(); ?></span>
                                <span class="post-date"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' önce'; ?></span>
                            </div>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>Henüz blog yazısı bulunmuyor.</p>
            <?php endif; ?>
        </div>
        <div class="posts-cta">
                <?php
                // Blog linki için güvenli kontrol
                $blog_url = esucodes_safe_blog_url();
                ?>
                <a href="<?php echo $blog_url; ?>" class="btn btn-primary">
                <?php echo get_theme_mod('view_all_posts_text', 'Tüm Yazıları Gör'); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?> 