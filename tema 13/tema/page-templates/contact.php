<?php
/**
 * Template Name: İletişim Sayfası
 *
 * @package ESUcodes
 */

get_header(); ?>

<!-- Progress Bar -->
<div class="progress-bar" id="progressBar"></div>

<!-- Contact Hero Section -->
<section class="contact-hero">
    <div class="container">
        <div class="contact-hero-content">
            <h1 class="contact-hero-title"><?php echo get_theme_mod('contact_hero_title', 'İletişim'); ?></h1>
            <p class="contact-hero-subtitle"><?php echo get_theme_mod('contact_hero_subtitle', 'Bizimle iletişime geçin, projelerinizi hayata geçirelim.'); ?></p>
        </div>
    </div>
</section>

<!-- Contact Content -->
<section class="contact-content">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Form -->
            <div class="contact-form-section">
                <h2><?php echo get_theme_mod('contact_form_title', 'Mesaj Gönderin'); ?></h2>
                <form class="contact-form" id="contactForm">
                    <div class="form-group">
                        <label for="name">Ad Soyad *</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">E-posta *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Konu *</label>
                        <select id="subject" name="subject" required>
                            <option value="">Seçiniz</option>
                            <option value="web-development">Web Geliştirme</option>
                            <option value="mobile-app">Mobil Uygulama</option>
                            <option value="consulting">Danışmanlık</option>
                            <option value="other">Diğer</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Mesaj *</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Mesaj Gönder</button>
                </form>
            </div>
            
            <!-- Contact Info -->
            <div class="contact-info-section">
                <h2><?php echo get_theme_mod('contact_info_title', 'İletişim Bilgileri'); ?></h2>
                
                <div class="contact-info-grid">
                    <div class="contact-info-item">
                        <div class="contact-icon">📍</div>
                        <div class="contact-details">
                            <h4>Adres</h4>
                            <p><?php echo get_theme_mod('contact_address', 'İstanbul, Türkiye'); ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">📧</div>
                        <div class="contact-details">
                            <h4>E-posta</h4>
                            <p><a href="mailto:<?php echo get_theme_mod('contact_email', 'info@esucodes.com'); ?>"><?php echo get_theme_mod('contact_email', 'info@esucodes.com'); ?></a></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">📞</div>
                        <div class="contact-details">
                            <h4>Telefon</h4>
                            <p><a href="tel:<?php echo get_theme_mod('contact_phone', '+90 212 123 45 67'); ?>"><?php echo get_theme_mod('contact_phone', '+90 212 123 45 67'); ?></a></p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">🕒</div>
                        <div class="contact-details">
                            <h4>Çalışma Saatleri</h4>
                            <p><?php echo get_theme_mod('contact_hours', 'Pazartesi - Cuma: 09:00 - 18:00'); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="social-links">
                    <h4><?php echo get_theme_mod('social_title', 'Sosyal Medya'); ?></h4>
                    <div class="social-icons">
                        <a href="<?php echo get_theme_mod('social_github', 'https://github.com/esucodes'); ?>" class="social-icon" target="_blank">
                            <span>🐙</span>
                        </a>
                        <a href="<?php echo get_theme_mod('social_twitter', 'https://twitter.com/esucodes'); ?>" class="social-icon" target="_blank">
                            <span>🐦</span>
                        </a>
                        <a href="<?php echo get_theme_mod('social_linkedin', 'https://linkedin.com/company/esucodes'); ?>" class="social-icon" target="_blank">
                            <span>💼</span>
                        </a>
                        <a href="<?php echo get_theme_mod('social_instagram', 'https://instagram.com/esucodes'); ?>" class="social-icon" target="_blank">
                            <span>📷</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container">
        <h2 class="section-title"><?php echo get_theme_mod('map_title', 'Konum'); ?></h2>
        <div class="map-container">
            <div class="map-placeholder">
                <span class="map-icon">🗺️</span>
                <p><?php echo get_theme_mod('map_text', 'Google Maps entegrasyonu buraya eklenebilir.'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <h2 class="section-title"><?php echo get_theme_mod('faq_title', 'Sık Sorulan Sorular'); ?></h2>
        <div class="faq-grid">
            <div class="faq-item">
                <h4 class="faq-question"><?php echo get_theme_mod('faq_1_question', 'Proje süreleri ne kadar?'); ?></h4>
                <p class="faq-answer"><?php echo get_theme_mod('faq_1_answer', 'Proje büyüklüğüne göre 2-8 hafta arasında değişmektedir.'); ?></p>
            </div>
            
            <div class="faq-item">
                <h4 class="faq-question"><?php echo get_theme_mod('faq_2_question', 'Fiyatlandırma nasıl yapılıyor?'); ?></h4>
                <p class="faq-answer"><?php echo get_theme_mod('faq_2_answer', 'Proje gereksinimlerine göre özel fiyatlandırma yapıyoruz.'); ?></p>
            </div>
            
            <div class="faq-item">
                <h4 class="faq-question"><?php echo get_theme_mod('faq_3_question', 'Destek hizmeti veriyor musunuz?'); ?></h4>
                <p class="faq-answer"><?php echo get_theme_mod('faq_3_answer', 'Evet, proje sonrası 1 yıl ücretsiz destek sağlıyoruz.'); ?></p>
            </div>
            
            <div class="faq-item">
                <h4 class="faq-question"><?php echo get_theme_mod('faq_4_question', 'Uzaktan çalışma yapıyor musunuz?'); ?></h4>
                <p class="faq-answer"><?php echo get_theme_mod('faq_4_answer', 'Evet, tüm projelerimizi uzaktan çalışma ile gerçekleştiriyoruz.'); ?></p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?> 