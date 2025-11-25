<?php
/**
 * Template Name: Hizmetler Sayfası
 *
 * @package ESUcodes
 */

get_header(); ?>

<!-- Progress Bar -->
<div class="progress-bar" id="progressBar"></div>

<!-- Services Hero Section -->
<section class="services-hero">
    <div class="container">
        <div class="services-hero-content">
            <h1 class="services-hero-title"><?php echo get_theme_mod('services_hero_title', 'Hizmetlerimiz'); ?></h1>
            <p class="services-hero-subtitle"><?php echo get_theme_mod('services_hero_subtitle', 'Modern teknolojilerle işinizi büyütün.'); ?></p>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="services-grid-section">
    <div class="container">
        <div class="services-grid">
            <!-- Web Development -->
            <div class="service-card">
                <div class="service-icon">🌐</div>
                <h3><?php echo get_theme_mod('service_1_title', 'Web Geliştirme'); ?></h3>
                <p><?php echo get_theme_mod('service_1_description', 'Modern ve responsive web siteleri, e-ticaret platformları ve web uygulamaları geliştiriyoruz.'); ?></p>
                <ul class="service-features">
                    <li><?php echo get_theme_mod('service_1_feature_1', 'Responsive Tasarım'); ?></li>
                    <li><?php echo get_theme_mod('service_1_feature_2', 'SEO Optimizasyonu'); ?></li>
                    <li><?php echo get_theme_mod('service_1_feature_3', 'Hızlı Yükleme'); ?></li>
                    <li><?php echo get_theme_mod('service_1_feature_4', 'Güvenlik'); ?></li>
                </ul>
                <a href="<?php echo get_theme_mod('service_1_link', '#contact'); ?>" class="btn btn-primary">Detaylar</a>
            </div>
            
            <!-- Mobile Development -->
            <div class="service-card">
                <div class="service-icon">📱</div>
                <h3><?php echo get_theme_mod('service_2_title', 'Mobil Uygulama'); ?></h3>
                <p><?php echo get_theme_mod('service_2_description', 'iOS ve Android için native ve cross-platform mobil uygulamalar geliştiriyoruz.'); ?></p>
                <ul class="service-features">
                    <li><?php echo get_theme_mod('service_2_feature_1', 'Native Geliştirme'); ?></li>
                    <li><?php echo get_theme_mod('service_2_feature_2', 'Cross-Platform'); ?></li>
                    <li><?php echo get_theme_mod('service_2_feature_3', 'App Store Optimizasyonu'); ?></li>
                    <li><?php echo get_theme_mod('service_2_feature_4', 'Push Bildirimler'); ?></li>
                </ul>
                <a href="<?php echo get_theme_mod('service_2_link', '#contact'); ?>" class="btn btn-primary">Detaylar</a>
            </div>
            
            <!-- UI/UX Design -->
            <div class="service-card">
                <div class="service-icon">🎨</div>
                <h3><?php echo get_theme_mod('service_3_title', 'UI/UX Tasarım'); ?></h3>
                <p><?php echo get_theme_mod('service_3_description', 'Kullanıcı deneyimi odaklı, modern ve estetik arayüz tasarımları yapıyoruz.'); ?></p>
                <ul class="service-features">
                    <li><?php echo get_theme_mod('service_3_feature_1', 'Wireframe Tasarım'); ?></li>
                    <li><?php echo get_theme_mod('service_3_feature_2', 'Prototip'); ?></li>
                    <li><?php echo get_theme_mod('service_3_feature_3', 'Kullanıcı Testi'); ?></li>
                    <li><?php echo get_theme_mod('service_3_feature_4', 'Design System'); ?></li>
                </ul>
                <a href="<?php echo get_theme_mod('service_3_link', '#contact'); ?>" class="btn btn-primary">Detaylar</a>
            </div>
            
            <!-- Consulting -->
            <div class="service-card">
                <div class="service-icon">💼</div>
                <h3><?php echo get_theme_mod('service_4_title', 'Danışmanlık'); ?></h3>
                <p><?php echo get_theme_mod('service_4_description', 'Teknoloji stratejisi ve dijital dönüşüm konularında danışmanlık hizmeti veriyoruz.'); ?></p>
                <ul class="service-features">
                    <li><?php echo get_theme_mod('service_4_feature_1', 'Teknoloji Stratejisi'); ?></li>
                    <li><?php echo get_theme_mod('service_4_feature_2', 'Dijital Dönüşüm'); ?></li>
                    <li><?php echo get_theme_mod('service_4_feature_3', 'Proje Yönetimi'); ?></li>
                    <li><?php echo get_theme_mod('service_4_feature_4', 'Eğitim'); ?></li>
                </ul>
                <a href="<?php echo get_theme_mod('service_4_link', '#contact'); ?>" class="btn btn-primary">Detaylar</a>
            </div>
            
            <!-- Maintenance -->
            <div class="service-card">
                <div class="service-icon">🔧</div>
                <h3><?php echo get_theme_mod('service_5_title', 'Bakım & Destek'); ?></h3>
                <p><?php echo get_theme_mod('service_5_description', 'Mevcut sistemlerinizin bakımı ve teknik destek hizmeti sağlıyoruz.'); ?></p>
                <ul class="service-features">
                    <li><?php echo get_theme_mod('service_5_feature_1', '7/24 Destek'); ?></li>
                    <li><?php echo get_theme_mod('service_5_feature_2', 'Güvenlik Güncellemeleri'); ?></li>
                    <li><?php echo get_theme_mod('service_5_feature_3', 'Performans Optimizasyonu'); ?></li>
                    <li><?php echo get_theme_mod('service_5_feature_4', 'Yedekleme'); ?></li>
                </ul>
                <a href="<?php echo get_theme_mod('service_5_link', '#contact'); ?>" class="btn btn-primary">Detaylar</a>
            </div>
            
            <!-- Hosting -->
            <div class="service-card">
                <div class="service-icon">☁️</div>
                <h3><?php echo get_theme_mod('service_6_title', 'Hosting & Domain'); ?></h3>
                <p><?php echo get_theme_mod('service_6_description', 'Güvenilir hosting ve domain hizmetleri ile projelerinizi yayına alıyoruz.'); ?></p>
                <ul class="service-features">
                    <li><?php echo get_theme_mod('service_6_feature_1', 'SSL Sertifikası'); ?></li>
                    <li><?php echo get_theme_mod('service_6_feature_2', 'CDN Desteği'); ?></li>
                    <li><?php echo get_theme_mod('service_6_feature_3', 'Yüksek Uptime'); ?></li>
                    <li><?php echo get_theme_mod('service_6_feature_4', 'Teknik Destek'); ?></li>
                </ul>
                <a href="<?php echo get_theme_mod('service_6_link', '#contact'); ?>" class="btn btn-primary">Detaylar</a>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="process-section">
    <div class="container">
        <h2 class="section-title"><?php echo get_theme_mod('process_title', 'Çalışma Sürecimiz'); ?></h2>
        <div class="process-grid">
            <div class="process-step">
                <div class="step-number">1</div>
                <h4><?php echo get_theme_mod('process_1_title', 'Analiz'); ?></h4>
                <p><?php echo get_theme_mod('process_1_description', 'İhtiyaçlarınızı analiz ediyor ve en uygun çözümü belirliyoruz.'); ?></p>
            </div>
            
            <div class="process-step">
                <div class="step-number">2</div>
                <h4><?php echo get_theme_mod('process_2_title', 'Tasarım'); ?></h4>
                <p><?php echo get_theme_mod('process_2_description', 'Kullanıcı deneyimi odaklı tasarım ve prototip hazırlıyoruz.'); ?></p>
            </div>
            
            <div class="process-step">
                <div class="step-number">3</div>
                <h4><?php echo get_theme_mod('process_3_title', 'Geliştirme'); ?></h4>
                <p><?php echo get_theme_mod('process_3_description', 'Modern teknolojilerle projenizi geliştiriyoruz.'); ?></p>
            </div>
            
            <div class="process-step">
                <div class="step-number">4</div>
                <h4><?php echo get_theme_mod('process_4_title', 'Test & Yayın'); ?></h4>
                <p><?php echo get_theme_mod('process_4_description', 'Kapsamlı testler sonrası projenizi yayına alıyoruz.'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2><?php echo get_theme_mod('cta_title', 'Projenizi Hayata Geçirelim'); ?></h2>
            <p><?php echo get_theme_mod('cta_description', 'Hemen iletişime geçin, projelerinizi birlikte gerçekleştirelim.'); ?></p>
            <a href="<?php echo get_theme_mod('cta_button_link', '#contact'); ?>" class="btn btn-primary btn-large">
                <?php echo get_theme_mod('cta_button_text', 'İletişime Geçin'); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?> 