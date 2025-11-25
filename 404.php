<?php 
// 404 sayfası debug
if (current_user_can('administrator')) {
    echo '<!-- 404 SAYFASI YUKLENDI - ' . date('Y-m-d H:i:s') . ' -->';
}

get_header(); 
?>

<!-- 404 Error Section -->
<section class="error-404">
    <div class="container">
        <div class="error-content">
            <!-- 404 Animation -->
            <div class="error-animation">
                <div class="error-number">404</div>
                <div class="error-icon">
                    <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="60" cy="60" r="50" stroke="url(#gradient)" stroke-width="3" fill="none" opacity="0.3"/>
                        <circle cx="60" cy="60" r="35" stroke="url(#gradient)" stroke-width="2" fill="none" opacity="0.5"/>
                        <circle cx="60" cy="60" r="20" stroke="url(#gradient)" stroke-width="1" fill="none" opacity="0.7"/>
                        <path d="M45 45L75 75M75 45L45 75" stroke="url(#gradient)" stroke-width="3" stroke-linecap="round"/>
                        <defs>
                            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:var(--galactic-purple);stop-opacity:1" />
                                <stop offset="50%" style="stop-color:var(--galactic-blue);stop-opacity:1" />
                                <stop offset="100%" style="stop-color:var(--galactic-cyan);stop-opacity:1" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>

            <!-- Error Message -->
            <div class="error-message">
                <h1 class="error-title">Sayfa Bulunamadı</h1>
                <p class="error-description">
                    Aradığınız sayfa mevcut değil veya taşınmış olabilir. 
                    Galaksimizde kaybolmuş gibi görünüyorsunuz!
                </p>
            </div>

            <!-- Search Box -->
            <div class="error-search">
                <h3>Aradığınızı bulun</h3>
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="search-input-group">
                        <input type="search" class="search-field" placeholder="Arama yapın..." value="<?php echo get_search_query(); ?>" name="s" />
                        <button type="submit" class="search-submit">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L16.514 16.506L21 21ZM19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Quick Links -->
            <div class="error-links">
                <h3>Popüler Sayfalar</h3>
                <div class="quick-links-grid">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="quick-link">
                        <div class="quick-link-icon">🏠</div>
                        <div class="quick-link-content">
                            <h4>Ana Sayfa</h4>
                            <p>Başlangıca dön</p>
                        </div>
                    </a>
                    
                    <?php 
                    $blog_page = get_option('page_for_posts');
                    if ($blog_page) {
                        $blog_url = get_permalink($blog_page);
                    } else {
                        $blog_url = home_url('/blog');
                    }
                    ?>
                    <a href="<?php echo esc_url($blog_url); ?>" class="quick-link">
                        <div class="quick-link-icon">📝</div>
                        <div class="quick-link-content">
                            <h4>Blog</h4>
                            <p>Son yazıları keşfedin</p>
                        </div>
                    </a>
                    
                    <a href="<?php echo esc_url(home_url('/hakkimizda')); ?>" class="quick-link">
                        <div class="quick-link-icon">👥</div>
                        <div class="quick-link-content">
                            <h4>Hakkımızda</h4>
                            <p>Bizi tanıyın</p>
                        </div>
                    </a>
                    
                    <a href="<?php echo esc_url(home_url('/iletisim')); ?>" class="quick-link">
                        <div class="quick-link-icon">📧</div>
                        <div class="quick-link-content">
                            <h4>İletişim</h4>
                            <p>Bizimle iletişime geçin</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Recent Posts -->
            <?php
            $recent_posts = wp_get_recent_posts(array(
                'numberposts' => 3,
                'post_status' => 'publish'
            ));
            
            if ($recent_posts) : ?>
            <div class="error-recent-posts">
                <h3>Son Yazılar</h3>
                <div class="recent-posts-grid">
                    <?php foreach ($recent_posts as $post) : ?>
                    <article class="recent-post-card">
                        <div class="recent-post-image">
                            <?php if (has_post_thumbnail($post['ID'])) : ?>
                                <?php echo get_the_post_thumbnail($post['ID'], 'medium'); ?>
                            <?php else : ?>
                                <div class="recent-post-placeholder">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 16L8.586 11.414C9.367 10.633 10.633 10.633 11.414 11.414L16 16M14 14L15.586 12.414C16.367 11.633 17.633 11.633 18.414 12.414L20 14M14 8H14.01M6 20H18C19.105 20 20 19.105 20 18V6C20 4.895 19.105 4 18 4H6C4.895 4 4 4.895 4 6V18C4 19.105 4.895 20 6 20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="recent-post-content">
                            <h4><a href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a></h4>
                            <p><?php echo wp_trim_words($post['post_content'], 15); ?></p>
                            <span class="recent-post-date"><?php echo get_the_date('', $post['ID']); ?></span>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Back to Home Button -->
            <div class="error-actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-large">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 12L5 10M5 10L12 3L19 10M5 10V20C5 20.5523 5.44772 21 6 21H9M19 10L21 12M19 10V20C19 20.5523 18.5523 21 18 21H15M9 21C9.55228 21 10 20.5523 10 20V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V20C14 20.5523 14.4477 21 15 21M9 21H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Ana Sayfaya Dön
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
