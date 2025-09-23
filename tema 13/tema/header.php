<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
    <?php wp_head(); ?>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Progress Bar -->
<div class="progress-bar" id="progressBar"></div>

<!-- Header -->
<header class="header">
    <nav class="nav">
        <div class="nav-brand">
            <h1 class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php echo get_theme_mod('site_logo_text', 'ESUcodes'); ?>
                </a>
            </h1>
        </div>
        <div class="nav-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'nav-menu',
                'container' => false,
                'fallback_cb' => 'esucodes_fallback_menu'
            ));
            ?>
        </div>
        <div class="nav-actions">
            <?php if (is_user_logged_in()) : ?>
                <a href="<?php echo get_edit_profile_url(); ?>" class="profile-link" id="profileLink">
                    <div class="profile-avatar">
                        <?php 
                        $current_user = wp_get_current_user();
                        echo strtoupper(substr($current_user->display_name, 0, 1)); 
                        ?>
                    </div>
                </a>
            <?php else : ?>
                <?php
                $login_page = get_page_by_path('giris');
                if ($login_page) {
                    $login_url = get_permalink($login_page->ID);
                } else {
                    $login_url = home_url('/giris');
                }
                ?>
                <a href="<?php echo esc_url($login_url); ?>" class="btn btn-primary">Giriş Yap</a>
            <?php endif; ?>
        </div>
    </nav>
</header>

<?php
// Fallback menu function
function esucodes_fallback_menu() {
    echo '<a href="' . home_url('/') . '" class="nav-link">Ana Sayfa</a>';
    
    // Blog linki için güvenli kontrol
    $blog_url = esucodes_safe_blog_url();
    echo '<a href="' . $blog_url . '" class="nav-link">Blog</a>';
    
    // Hakkımızda sayfasına güvenli yönlendirme
    if (function_exists('esucodes_safe_about_url')) {
        $about_url = esucodes_safe_about_url();
    } else {
        $about_url = home_url('/hakkimizda');
    }
    echo '<a href="' . $about_url . '" class="nav-link">Hakkımızda</a>';
   // echo '<a href="' . home_url('/#contact') . '" class="nav-link">İletişim</a>';
}
?> 