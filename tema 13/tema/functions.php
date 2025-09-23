<?php
/**
 * ESUcodes Theme Functions
 *
 * @package ESUcodes
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function esucodes_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'esucodes'),
        'footer' => __('Footer Menu', 'esucodes'),
    ));

    // Add image sizes
    add_image_size('esucodes-hero', 1200, 600, true);
    add_image_size('esucodes-card', 400, 250, true);
    add_image_size('esucodes-thumbnail', 300, 200, true);
}
add_action('after_setup_theme', 'esucodes_theme_setup');

/**
 * Enqueue scripts and styles
 */
function esucodes_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('esucodes-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue Google Fonts
    wp_enqueue_style('esucodes-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Enqueue main script
    wp_enqueue_script('esucodes-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('esucodes-script', 'esucodes_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('esucodes_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'esucodes_scripts');

/**
 * Customizer additions
 */
function esucodes_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('esucodes_hero', array(
        'title' => __('Hero Section', 'esucodes'),
        'priority' => 30,
    ));

    // Hero Description
    $wp_customize->add_setting('hero_description', array(
        'default' => 'Yazılım dünyasında birlikte öğreniyor, birlikte büyüyoruz. Modern teknolojiler ve yenilikçi çözümler için doğru adrestesiniz.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_description', array(
        'label' => __('Hero Description', 'esucodes'),
        'section' => 'esucodes_hero',
        'type' => 'textarea',
    ));

    // Hero Primary Button
   // $wp_customize->add_setting('hero_primary_button_text', array(
   //     'default' => 'Giriş Yap',
    //    'sanitize_callback' => 'sanitize_text_field',
  //  ));
   // $wp_customize->add_control('hero_primary_button_text', array(
   //     'label' => __('Primary Button Text', 'esucodes'),
    //    'section' => 'esucodes_hero',
    //    'type' => 'text',
  //  ));

  //  $wp_customize->add_setting('hero_primary_button_url', array(
 //       'default' => '#',
 //       'sanitize_callback' => 'esc_url_raw',
  //  ));
  //  $wp_customize->add_control('hero_primary_button_url', array(
   //     'label' => __('Primary Button URL', 'esucodes'),
   //     'section' => 'esucodes_hero',
   //     'type' => 'url',
 //   ));

    // Hero Secondary Button
 //   $wp_customize->add_setting('hero_secondary_button_text', array(
  //      'default' => 'Projeleri Gör',
  //      'sanitize_callback' => 'sanitize_text_field',
   // ));
   // $wp_customize->add_control('hero_secondary_button_text', array(
   //     'label' => __('Secondary Button Text', 'esucodes'),
   //     'section' => 'esucodes_hero',
  //      'type' => 'text',
 //  ));

  //  $wp_customize->add_setting('hero_secondary_button_url', array(
  //      'default' => '#',
  //      'sanitize_callback' => 'esc_url_raw',
 //   ));
 //   $wp_customize->add_control('hero_secondary_button_url', array(
 //       'label' => __('Secondary Button URL', 'esucodes'),
 //       'section' => 'esucodes_hero',
 //       'type' => 'url',
  //  ));

    // About Section
    $wp_customize->add_section('esucodes_about', array(
        'title' => __('About Section', 'esucodes'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('about_title', array(
        'default' => 'Neden ESUcodes?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_title', array(
        'label' => __('About Section Title', 'esucodes'),
        'section' => 'esucodes_about',
        'type' => 'text',
    ));

    // Features
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("feature_{$i}_icon", array(
            'default' => '🚀',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("feature_{$i}_icon", array(
            'label' => __("Feature {$i} Icon", 'esucodes'),
            'section' => 'esucodes_about',
            'type' => 'text',
        ));

        $wp_customize->add_setting("feature_{$i}_title", array(
            'default' => "Feature {$i}",
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("feature_{$i}_title", array(
            'label' => __("Feature {$i} Title", 'esucodes'),
            'section' => 'esucodes_about',
            'type' => 'text',
        ));

        $wp_customize->add_setting("feature_{$i}_description", array(
            'default' => "Feature {$i} description",
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("feature_{$i}_description", array(
            'label' => __("Feature {$i} Description", 'esucodes'),
            'section' => 'esucodes_about',
            'type' => 'textarea',
        ));
    }

    // Footer Section
    $wp_customize->add_section('esucodes_footer', array(
        'title' => __('Footer', 'esucodes'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('footer_logo_text', array(
        'default' => 'ESUcodes',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_logo_text', array(
        'label' => __('Footer Logo Text', 'esucodes'),
        'section' => 'esucodes_footer',
        'type' => 'text',
    ));

    $wp_customize->add_setting('footer_description', array(
        'default' => 'Geleceğin yazılım topluluğu',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_description', array(
        'label' => __('Footer Description', 'esucodes'),
        'section' => 'esucodes_footer',
        'type' => 'text',
    ));

    $wp_customize->add_setting('footer_email', array(
        'default' => 'info@esucodes.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('footer_email', array(
        'label' => __('Footer Email', 'esucodes'),
        'section' => 'esucodes_footer',
        'type' => 'email',
    ));

    $wp_customize->add_setting('footer_github', array(
        'default' => 'https://github.com/esucodes',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('footer_github', array(
        'label' => __('GitHub URL', 'esucodes'),
        'section' => 'esucodes_footer',
        'type' => 'url',
    ));

    $wp_customize->add_setting('footer_twitter', array(
        'default' => 'https://twitter.com/esucodes',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('footer_twitter', array(
        'label' => __('Twitter URL', 'esucodes'),
        'section' => 'esucodes_footer',
        'type' => 'url',
    ));

    $wp_customize->add_setting('footer_copyright', array(
        'default' => 'ESUcodes. Tüm hakları saklıdır.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_copyright', array(
        'label' => __('Copyright Text', 'esucodes'),
        'section' => 'esucodes_footer',
        'type' => 'text',
    ));

    // Blog Section
    $wp_customize->add_section('esucodes_blog', array(
        'title' => __('Blog Settings', 'esucodes'),
        'priority' => 45,
    ));

    $wp_customize->add_setting('blog_title', array(
        'default' => 'Blog',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('blog_title', array(
        'label' => __('Blog Title', 'esucodes'),
        'section' => 'esucodes_blog',
        'type' => 'text',
    ));

    $wp_customize->add_setting('blog_subtitle', array(
        'default' => 'Yazılım dünyasından en güncel bilgiler ve rehberler',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('blog_subtitle', array(
        'label' => __('Blog Subtitle', 'esucodes'),
        'section' => 'esucodes_blog',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'esucodes_customize_register');

/**
 * Register widget areas
 */
function esucodes_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'esucodes'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here.', 'esucodes'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer Widget Area', 'esucodes'),
        'id' => 'footer-1',
        'description' => __('Add widgets here.', 'esucodes'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'esucodes_widgets_init');

/**
 * Custom excerpt length
 */
function esucodes_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'esucodes_excerpt_length');

/**
 * Custom excerpt more
 */
function esucodes_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'esucodes_excerpt_more');

/**
 * Add custom classes to body
 */
function esucodes_body_classes($classes) {
    // Add class for dark theme
    $classes[] = 'dark-theme';
    
    return $classes;
}
add_filter('body_class', 'esucodes_body_classes');

/**
 * Custom post type for Projects
 */
function esucodes_create_project_post_type() {
    register_post_type('project',
        array(
            'labels' => array(
                'name' => __('Projects', 'esucodes'),
                'singular_name' => __('Project', 'esucodes'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'menu_icon' => 'dashicons-portfolio',
            'rewrite' => array('slug' => 'projects'),
        )
    );
}
add_action('init', 'esucodes_create_project_post_type');

/**
 * Add theme support for custom logo
 */
function esucodes_custom_logo_setup() {
    $defaults = array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'esucodes_custom_logo_setup');

/**
 * Security enhancements
 */
function esucodes_security_enhancements() {
    // Remove WordPress version from head
    remove_action('wp_head', 'wp_generator');
    
    // Disable XML-RPC
    add_filter('xmlrpc_enabled', '__return_false');
    
    // Remove unnecessary meta tags
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
}
add_action('init', 'esucodes_security_enhancements');

/**
 * Load text domain for translations
 */
function esucodes_load_textdomain() {
    load_theme_textdomain('esucodes', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'esucodes_load_textdomain');

/**
 * Add custom rewrite rules for blog
 */
function esucodes_add_rewrite_rules() {
    add_rewrite_rule(
        '^blog/?$',
        'index.php?pagename=blog',
        'top'
    );
    
    // Blog sayfası için ek rewrite kuralları
    add_rewrite_rule(
        '^blog/page/([0-9]+)/?$',
        'index.php?pagename=blog&paged=$matches[1]',
        'top'
    );
}
add_action('init', 'esucodes_add_rewrite_rules');

/**
 * Flush rewrite rules on theme activation
 */
function esucodes_flush_rewrite_rules() {
    esucodes_add_rewrite_rules();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'esucodes_flush_rewrite_rules');

/**
 * Register custom page templates
 */
function esucodes_add_page_templates($templates) {
    $templates['page-templates/about.php'] = __('Hakkımızda Sayfası', 'esucodes');
    $templates['page-templates/services.php'] = __('Hizmetler Sayfası', 'esucodes');
    $templates['page-templates/contact.php'] = __('İletişim Sayfası', 'esucodes');
    $templates['page-templates/blog.php'] = __('Blog Sayfası', 'esucodes');
    $templates['page-templates/team.php'] = __('Ekibimiz Sayfası', 'esucodes');
    $templates['page-templates/portfolio.php'] = __('Portfolyo Sayfası', 'esucodes');
    $templates['page-templates/pricing.php'] = __('Fiyatlandırma Sayfası', 'esucodes');
    $templates['page-templates/faq.php'] = __('SSS Sayfası', 'esucodes');
    $templates['page-templates/testimonials.php'] = __('Müşteri Yorumları', 'esucodes');
    return $templates;
}
add_filter('theme_page_templates', 'esucodes_add_page_templates');

/**
 * Blog sayfası için özel query vars
 */
function esucodes_add_query_vars($vars) {
    $vars[] = 'blog_page';
    return $vars;
}
add_filter('query_vars', 'esucodes_add_query_vars');

/**
 * Blog sayfası için template redirect
 */
function esucodes_template_redirect() {
    if (is_page('blog')) {
        $template = get_template_directory() . '/page-templates/blog.php';
        if (file_exists($template)) {
            include($template);
            exit;
        }
    }
}
add_action('template_redirect', 'esucodes_template_redirect');

/**
 * Blog sayfası için özel template yükleme
 */
function esucodes_load_blog_template($template) {
    if (is_page('blog')) {
        $new_template = get_template_directory() . '/page-templates/blog.php';
        if (file_exists($new_template)) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('page_template', 'esucodes_load_blog_template');

/**
 * Blog sayfası için özel query
 */
function esucodes_blog_page_query($query) {
    if (!is_admin() && $query->is_main_query()) {
        if (is_page('blog')) {
            $query->set('post_type', 'post');
            $query->set('posts_per_page', 6);
            $query->set('orderby', 'date');
            $query->set('order', 'DESC');
        }
    }
}
add_action('pre_get_posts', 'esucodes_blog_page_query');

/**
 * Blog linklerini düzelt - tüm yazılar sayfasına yönlendir
 */
function esucodes_fix_blog_links() {
    // Blog sayfası için özel URL oluştur
    if (is_home() && !is_front_page()) {
        // Ana sayfa blog ise, archive.php kullan
        return;
    }
    
    // Blog sayfası varsa, o sayfaya yönlendir
    $blog_page = get_page_by_path('blog');
    if ($blog_page) {
        // Blog sayfası mevcut, doğru şablonu kullan
        return;
    }
}
add_action('wp', 'esucodes_fix_blog_links');

/**
 * Blog sayfası için özel query
 */
function esucodes_blog_query($query) {
    // Sadece ana sorgu için çalış
    if (!is_admin() && $query->is_main_query()) {
        // Blog sayfası kontrolü
        if (is_page('blog')) {
            $query->set('post_type', 'post');
            $query->set('posts_per_page', 6);
            $query->set('orderby', 'date');
            $query->set('order', 'DESC');
        }
    }
}
add_action('pre_get_posts', 'esucodes_blog_query');

/**
 * Blog sayfası için özel ayarlar
 */
function esucodes_blog_setup() {
    // Blog sayfası için özel ayarlar
    if (is_home() || is_archive()) {
        // Blog sayfası başlığını ayarla
        add_filter('wp_title', function($title) {
            if (is_home()) {
                return 'Blog - ' . get_bloginfo('name');
            }
            return $title;
        });
    }
}
add_action('wp', 'esucodes_blog_setup');

/**
 * Blog sayfası için meta bilgileri
 */
function esucodes_blog_meta() {
    if (is_home() || is_archive()) {
        echo '<meta name="description" content="Yazılım dünyasından en güncel bilgiler ve rehberler" />';
    }
}
add_action('wp_head', 'esucodes_blog_meta');

/**
 * Tech news - API key provider
 * Priority: constant ESUCODES_NEWSAPI_KEY > filter > theme_mod('newsapi_key')
 */
function esucodes_get_newsapi_key() {
    if (defined('ESUCODES_NEWSAPI_KEY') && ESUCODES_NEWSAPI_KEY) {
        return ESUCODES_NEWSAPI_KEY;
    }
    $key = apply_filters('esucodes_news_api_key', '');
    if (!empty($key)) {
        return $key;
    }
    $customizer_key = get_theme_mod('newsapi_key', '');
    return $customizer_key ? $customizer_key : '';
}

/**
 * Fetch technology news using NewsAPI and cache for 6 hours
 * Returns array of 4 items: [title, description, url, image]
 */
function esucodes_get_tech_news() {
    $cache_key = 'esucodes_tech_news_v1';
    $cached = get_transient($cache_key);
    if ($cached !== false) {
        return $cached;
    }

    $api_key = esucodes_get_newsapi_key();
    if (empty($api_key)) {
        return new WP_Error('missing_api_key', 'NewsAPI anahtarı eksik');
    }

    // Primary: top-headlines supports country+category (language param yok)
    $endpoint = add_query_arg(array(
        'country'   => 'tr',
        'category'  => 'technology',
        'pageSize'  => 4,
        'apiKey'    => $api_key,
    ), 'https://newsapi.org/v2/top-headlines');

    $response = wp_remote_get($endpoint, array('timeout' => 12));
    $code = is_wp_error($response) ? 0 : wp_remote_retrieve_response_code($response);
    $body = is_wp_error($response) ? '' : wp_remote_retrieve_body($response);

    // Fallback: everything endpoint with language=tr if primary fails
    if ($code !== 200 || empty($body)) {
        $endpoint = add_query_arg(array(
            'q'         => 'teknoloji OR yapay zeka OR yazılım',
            'language'  => 'tr',
            'sortBy'    => 'publishedAt',
            'pageSize'  => 4,
            'apiKey'    => $api_key,
        ), 'https://newsapi.org/v2/everything');
        $response = wp_remote_get($endpoint, array('timeout' => 12));
        $code = is_wp_error($response) ? 0 : wp_remote_retrieve_response_code($response);
        $body = is_wp_error($response) ? '' : wp_remote_retrieve_body($response);
    }

    if ($code !== 200 || empty($body)) {
        return new WP_Error('bad_response', 'Haber servisi yanıt vermedi');
    }

    $data = json_decode($body, true);
    if (json_last_error() !== JSON_ERROR_NONE || empty($data['articles'])) {
        return new WP_Error('invalid_json', 'Geçersiz haber verisi');
    }

    $articles = array();
    foreach ($data['articles'] as $article) {
        $articles[] = array(
            'title'       => isset($article['title']) ? sanitize_text_field($article['title']) : '',
            'description' => isset($article['description']) ? wp_strip_all_tags($article['description']) : '',
            'url'         => isset($article['url']) ? esc_url_raw($article['url']) : '#',
            'image'       => isset($article['urlToImage']) ? esc_url_raw($article['urlToImage']) : '',
            'source'      => isset($article['source']['name']) ? sanitize_text_field($article['source']['name']) : '',
        );
        if (count($articles) >= 4) break;
    }

    set_transient($cache_key, $articles, 6 * HOUR_IN_SECONDS);
    return $articles;
}

/**
 * Admin-only: allow clearing tech news cache via ?refresh_news=1
 */
function esucodes_refresh_news_cache_param() {
    if (!is_admin() && isset($_GET['refresh_news']) && $_GET['refresh_news'] == '1' && current_user_can('manage_options')) {
        delete_transient('esucodes_tech_news_v1');
    }
}
add_action('init', 'esucodes_refresh_news_cache_param');

/**
 * TEMP: Provide NewsAPI key via filter when wp-config access is not available
 */
add_filter('esucodes_news_api_key', function ($key) {
    if (!empty($key)) {
        return $key;
    }
    return '4ad32ac24c63417996d7ff9e4825ad99';
});

/**
 * Hakkımızda sayfası URL'ini güvenli şekilde döndür
 */
function esucodes_safe_about_url() {
    // Önce yayında olan sabit sayfa slug'larını dene
    $about_page = get_page_by_path('hakkimizda');
    if (!$about_page) {
        $about_page = get_page_by_path('about');
    }
    if ($about_page && $about_page->post_status === 'publish') {
        return get_permalink($about_page->ID);
    }

    // Şablona göre eşleşen sayfayı bul
    $pages = get_pages(array(
        'meta_key'    => '_wp_page_template',
        'meta_value'  => 'page-templates/about.php',
        'post_status' => 'publish',
        'number'      => 1,
    ));
    if (!empty($pages)) {
        return get_permalink($pages[0]->ID);
    }

    // Son çare: tahmini bir slug'a dön
    return home_url('/hakkimizda');
}

/**
 * Menülerde "Hakkımızda" öğesinin URL'ini düzelt (primary menü için)
 */
function esucodes_fix_about_menu_item($items, $args) {
    if (!isset($args->theme_location) || $args->theme_location !== 'primary') {
        return $items;
    }

    foreach ($items as $item) {
        $title = trim(wp_strip_all_tags($item->title));
        $slug  = sanitize_title($title); // hakkimizda, about vb.
        $url   = isset($item->url) ? $item->url : '';

        $points_to_about_anchor = (strpos($url, '#about') !== false);
        $is_about_title         = ($slug === 'hakkimizda' || $slug === 'about');

        if ($points_to_about_anchor || $is_about_title) {
            $item->url = esucodes_safe_about_url();
        }
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'esucodes_fix_about_menu_item', 10, 2);

/**
 * Blog sayfası debug fonksiyonu (geliştirme aşamasında)
 */
function esucodes_debug_blog_page() {
    if (current_user_can('administrator')) {
        echo '<!-- Debug: ';
        echo 'is_page: ' . (is_page() ? 'true' : 'false') . ', ';
        echo 'is_page("blog"): ' . (is_page('blog') ? 'true' : 'false') . ', ';
        echo 'is_home: ' . (is_home() ? 'true' : 'false') . ', ';
        echo 'is_front_page: ' . (is_front_page() ? 'true' : 'false') . ', ';
        echo 'page_for_posts: ' . get_option('page_for_posts') . ', ';
        echo 'show_on_front: ' . get_option('show_on_front');
        echo ' -->';
    }
}
add_action('wp_head', 'esucodes_debug_blog_page');

/**
 * Blog sayfası için güçlü yönlendirme
 */
function esucodes_force_blog_page() {
    // Blog sayfası var mı kontrol et
    $blog_page = get_page_by_path('blog');
    
    if ($blog_page && $blog_page->post_status === 'publish') {
        // Blog sayfası mevcut ve yayınlanmış
        return;
    }
    
    // Blog sayfası yoksa otomatik oluştur
    if (!$blog_page) {
        $blog_page_id = wp_insert_post(array(
            'post_title' => 'Blog',
            'post_content' => '',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_name' => 'blog',
            'page_template' => 'page-templates/blog.php'
        ));
        
        if ($blog_page_id && !is_wp_error($blog_page_id)) {
            // Blog sayfasını yazı sayfası olarak ayarla
            update_option('page_for_posts', $blog_page_id);
            
            // Rewrite kurallarını yenile
            flush_rewrite_rules();
        }
    }
}
add_action('init', 'esucodes_force_blog_page');

/**
 * Blog linklerini güvenli hale getir
 */
function esucodes_safe_blog_url() {
    $blog_page = get_page_by_path('blog');
    if ($blog_page && $blog_page->post_status === 'publish') {
        return get_permalink($blog_page->ID);
    }
    
    $posts_page = get_option('page_for_posts');
    if ($posts_page) {
        return get_permalink($posts_page);
    }
    
    return home_url('/');
}

/**
 * AJAX blog arama fonksiyonu
 */
function esucodes_search_blog_posts() {
    // Nonce kontrolü
    if (!wp_verify_nonce($_POST['nonce'], 'search_blog_nonce')) {
        wp_die('Güvenlik hatası');
    }
    
    $search_term = sanitize_text_field($_POST['search']);
    
    if (empty($search_term)) {
        wp_send_json_error('Arama terimi boş olamaz');
    }
    
    // Blog yazılarını ara (sadece başlığa göre)
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1, // Tüm yazıları al
        's' => $search_term, // Arama terimi
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    $query = new WP_Query($args);
    $posts = array();
    
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            
            // Kategori bilgisi
            $categories = get_the_category();
            $category_name = !empty($categories) ? $categories[0]->name : 'Genel';
            $category_slug = !empty($categories) ? $categories[0]->slug : 'genel';
            
            // Okuma süresi
            $content = get_the_content();
            $word_count = str_word_count(strip_tags($content));
            $reading_time = ceil($word_count / 200);
            $reading_time = $reading_time > 0 ? $reading_time : 1;
            
            // Öne çıkan görsel
            $thumbnail = '';
            if (has_post_thumbnail()) {
                $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            }
            
            $posts[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'excerpt' => wp_trim_words(get_the_excerpt(), 25),
                'url' => get_permalink(),
                'author' => get_the_author(),
                'date' => human_time_diff(get_the_time('U'), current_time('timestamp')) . ' önce',
                'reading_time' => $reading_time,
                'category_name' => $category_name,
                'category_slug' => $category_slug,
                'thumbnail' => $thumbnail
            );
        }
        wp_reset_postdata();
    }
    
    wp_send_json_success($posts);
}
add_action('wp_ajax_search_blog_posts', 'esucodes_search_blog_posts');
add_action('wp_ajax_nopriv_search_blog_posts', 'esucodes_search_blog_posts');

 