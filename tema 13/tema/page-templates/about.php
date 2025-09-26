<?php
/**
 * Template Name: Hakkımızda Sayfası
 *
 * @package ESUcodes
 */

get_header(); ?>

<!-- Progress Bar -->
<div class="progress-bar" id="progressBar"></div>

<!-- About Hero Section -->
<section class="about-hero">
    <div class="container">
        <div class="about-hero-content">
            <h1 class="about-hero-title"><?php echo get_theme_mod('about_hero_title', 'Hakkımızda'); ?></h1>
            <p class="about-hero-subtitle"><?php echo get_theme_mod('about_hero_subtitle', 'ESUcodes (Explore Software Universe), öğrencilerin birlikte öğrenip üretebileceği galaktik temalı yazılım topluluğu.'); ?></p>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="about-content">
    <div class="container">
        <div class="about-grid">
            <div class="about-text">
                <h2><?php echo get_theme_mod('about_section_title', 'Biz Kimiz?'); ?></h2>
                <p><?php echo get_theme_mod('about_section_text', 'ESUcodes (Explore Software Universe), yazılım dünyasında öğrencilerin birlikte öğrenip üretebileceği bir oluşumdur. Amacımız; yazılım öğrenmek isteyen gençlere keşif, üretim ve paylaşım alanı sunmak, projeler geliştirmelerine destek olmak ve ekip ruhunu güçlendirmektir.'); ?></p>
                
                <div class="about-stats">
                    <div class="stat-item">
                        <span class="stat-number"><?php echo get_theme_mod('about_stat_1_number', '50+'); ?></span>
                        <span class="stat-label"><?php echo get_theme_mod('about_stat_1_label', 'Tamamlanan Proje'); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo get_theme_mod('about_stat_2_number', '100+'); ?></span>
                        <span class="stat-label"><?php echo get_theme_mod('about_stat_2_label', 'Mutlu Müşteri'); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo get_theme_mod('about_stat_3_number', '5+'); ?></span>
                        <span class="stat-label"><?php echo get_theme_mod('about_stat_3_label', 'Yıllık Deneyim'); ?></span>
                    </div>
                </div>
            </div>
            
            <div class="about-image">
                <div class="about-image-placeholder">
                    <span class="image-icon">🏢</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Page Editor Content (Gutenberg) -->
<section class="about-editor-content">
	<div class="container">
		<?php while (have_posts()) : the_post(); ?>
			<div class="about-editor-inner">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
	</div>
</section>

<!-- Mission & Vision -->
<section class="mission-vision">
    <div class="container">
        <div class="mission-vision-grid">
            <div class="mission-card">
                <div class="mission-icon">🎯</div>
                <h3><?php echo get_theme_mod('mission_title', 'Misyonumuz'); ?></h3>
                <p><?php echo get_theme_mod('mission_text', 'Yazılım öğrenmek isteyen gençlere keşif, üretim ve paylaşım alanı sunmak; gerçek projeler geliştirmelerini desteklemek ve ekip ruhunu güçlendirmek.'); ?></p>
            </div>
            
            <div class="vision-card">
                <div class="vision-icon">👁️</div>
                <h3><?php echo get_theme_mod('vision_title', 'Vizyonumuz'); ?></h3>
                <p><?php echo get_theme_mod('vision_text', 'Galaktik temalı vizyonumuzla üyelerimizin teknik ve sosyal gelişimini destekliyor; Türkiye’den başlayan bu yolculuğu uluslararası bir yazılım evrenine taşımayı hedefliyoruz.'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section">
    <div class="container">
        <h2 class="section-title"><?php echo get_theme_mod('values_title', 'Değerlerimiz'); ?></h2>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">💡</div>
                <h4><?php echo get_theme_mod('value_1_title', 'Yenilikçilik'); ?></h4>
                <p><?php echo get_theme_mod('value_1_text', 'Sürekli öğrenme ve gelişim ile yenilikçi çözümler üretiyoruz.'); ?></p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">🤝</div>
                <h4><?php echo get_theme_mod('value_2_title', 'Güvenilirlik'); ?></h4>
                <p><?php echo get_theme_mod('value_2_text', 'Müşterilerimizle güvene dayalı, uzun vadeli ilişkiler kuruyoruz.'); ?></p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">⚡</div>
                <h4><?php echo get_theme_mod('value_3_title', 'Hız'); ?></h4>
                <p><?php echo get_theme_mod('value_3_text', 'Hızlı ve etkili çözümlerle müşteri ihtiyaçlarını karşılıyoruz.'); ?></p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">🌟</div>
                <h4><?php echo get_theme_mod('value_4_title', 'Kalite'); ?></h4>
                <p><?php echo get_theme_mod('value_4_text', 'En yüksek kalite standartlarında çalışarak mükemmel sonuçlar elde ediyoruz.'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <h2 class="section-title"><?php echo get_theme_mod('team_title', 'Ekibimiz'); ?></h2>
        <div class="team-grid">
            <div class="team-member">
                <div class="member-avatar">
                    <span class="avatar-letter">A</span>
                </div>
                <h4 class="member-name"><?php echo get_theme_mod('team_member_1_name', 'Ahmet Yılmaz'); ?></h4>
                <p class="member-role"><?php echo get_theme_mod('team_member_1_role', 'Baş Geliştirici'); ?></p>
                <p class="member-bio"><?php echo get_theme_mod('team_member_1_bio', '5+ yıl deneyimli full-stack geliştirici.'); ?></p>
            </div>
            
            <div class="team-member">
                <div class="member-avatar">
                    <span class="avatar-letter">S</span>
                </div>
                <h4 class="member-name"><?php echo get_theme_mod('team_member_2_name', 'Selin Demir'); ?></h4>
                <p class="member-role"><?php echo get_theme_mod('team_member_2_role', 'UI/UX Tasarımcı'); ?></p>
                <p class="member-bio"><?php echo get_theme_mod('team_member_2_bio', 'Kullanıcı deneyimi odaklı tasarım uzmanı.'); ?></p>
            </div>
            
            <div class="team-member">
                <div class="member-avatar">
                    <span class="avatar-letter">M</span>
                </div>
                <h4 class="member-name"><?php echo get_theme_mod('team_member_3_name', 'Mehmet Kaya'); ?></h4>
                <p class="member-role"><?php echo get_theme_mod('team_member_3_role', 'Proje Yöneticisi'); ?></p>
                <p class="member-bio"><?php echo get_theme_mod('team_member_3_bio', 'Agile metodolojiler konusunda uzman.'); ?></p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?> 