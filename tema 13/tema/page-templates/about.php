<?php
/**
 * Template Name: Hakkımızda Sayfası (Kurumsal)
 *
 * @package ESUcodes
 * Description: ESUCODES Ar-Ge ve Teknoloji Stüdyosu için özel şablon.
 */

get_header(); ?>

<div class="progress-bar" id="progressBar"></div>

<section class="about-hero">
    <div class="container">
        <div class="about-hero-content">
            <h1 class="about-hero-title"><?php echo get_theme_mod('about_hero_title', 'Sınırları Olmayan Bir Teknoloji Evreni'); ?></h1>
            <p class="about-hero-subtitle"><?php echo get_theme_mod('about_hero_subtitle', 'Teknolojiyi kategorilere ayırmadan, bir bütün olarak keşfediyor ve geleceği kodluyoruz.'); ?></p>
        </div>
    </div>
</section>

<section class="about-content">
    <div class="container">
        <div class="about-grid">
            <div class="about-text">
                <h2><?php echo get_theme_mod('about_section_title', 'Biz Kimiz?'); ?></h2>
                <div class="corporate-text">
                    <p><?php echo get_theme_mod('about_text_p1', 'ESUCODES (Explore Software Universe), teknolojik sınırların ötesine geçmeyi hedefleyen, yazılım dünyasını kategorilere ayırmak yerine onu bir bütün olarak ele alan yeni nesil bir teknoloji girişimidir.'); ?></p>
                    
                    <p><?php echo get_theme_mod('about_text_p2', 'Klasik uzmanlık tanımlarının ve kalıpların aksine, biz teknolojiyi sürekli genişleyen bir evren olarak görüyoruz. Faaliyet alanımız, ekibimizin merakı ve teknolojinin getirdiği yeniliklerle sınırlıdır. Burası, unvanların değil, problem çözme yeteneğinin ve üretme tutkusunun konuştuğu dinamik bir inovasyon merkezidir.'); ?></p>
                </div>
                
                <div class="about-stats">
                    <div class="stat-item">
                        <span class="stat-number"><?php echo get_theme_mod('about_stat_1_number', '∞'); ?></span>
                        <span class="stat-label"><?php echo get_theme_mod('about_stat_1_label', 'Teknoloji'); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo get_theme_mod('about_stat_2_number', '100%'); ?></span>
                        <span class="stat-label"><?php echo get_theme_mod('about_stat_2_label', 'Ar-Ge Odaklı'); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo get_theme_mod('about_stat_3_number', 'Global'); ?></span>
                        <span class="stat-label"><?php echo get_theme_mod('about_stat_3_label', 'Hedef'); ?></span>
                    </div>
                </div>
            </div>
            
            <div class="about-image">
                <div class="about-image-placeholder" style="background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);">
                    <span class="image-icon">🌐</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-editor-content">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="about-editor-inner">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<section class="mission-vision" style="background-color: #f9fbfd; padding: 70px 0; position: relative; z-index: 1;">
    <div class="container">
        
        <div class="mission-vision-grid">
            <div class="mission-card" style="width: 100%; background: #ffffff; padding: 45px; border-radius: 16px; box-shadow: 0 15px 35px rgba(0,0,0,0.05); border: 1px solid #edf2f7;"> 
                <div class="mission-icon" style="font-size: 2.5rem; margin-bottom: 20px; color: #3498db;">🧬</div>
                <h3 style="color: #2c3e50; font-weight: 700; margin-bottom: 15px;"><?php echo get_theme_mod('approach_title', 'Adaptasyon ve Özgür Üretim'); ?></h3>
                <p style="font-size: 1.05rem; line-height: 1.8; color: #555;">
                    <?php echo get_theme_mod('approach_text', 'Dijital dünya her saniye değişirken, sabit bir tanıma bağlı kalmak gelişimi durdurmaktır. ESUCODES olarak, kategorize edilmiş dikey uzmanlıklar yerine, her türlü teknolojik yapıya hızla adapte olabilen esnek bir mühendislik kültürünü benimsiyoruz. Hedefimiz; teknolojinin hangi alt dalı olursa olsun, o alanda derinleşebilmek ve "yapılamaz" denileni kod satırlarıyla gerçeğe dönüştürmektir.'); ?>
                </p>
            </div>
        </div>
        
        <div class="vision-box" style="margin-top: 30px; text-align: center; padding: 40px; background: #ffffff; border-radius: 16px; box-shadow: 0 10px 25px rgba(0,0,0,0.03); border: 1px solid #edf2f7;">
            <h3 style="color: #333; margin-bottom: 15px; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 2px; color: #888;">Vizyonumuz</h3>
            <p style="font-size: 1.25em; font-weight: 500; color: #2c3e50; max-width: 850px; margin: 0 auto; font-family: 'Georgia', serif; font-style: italic;">
                "<?php echo get_theme_mod('vision_text', 'Merak eden, sorgulayan ve üreten zihinler için global standartlarda bir çekim merkezi olmak; yerel potansiyeli evrensel projelere dönüştüren bir teknoloji üssü haline gelmek.'); ?>"
            </p>
        </div>

    </div>
</section>

<section class="team-section">
    <div class="container">
        <h2 class="section-title"><?php echo get_theme_mod('team_title', 'Yönetim ve Geliştirme Ekibi'); ?></h2>
        <div class="team-grid">
            
            <div class="team-member">
                <div class="member-avatar"><span class="avatar-letter">ES</span></div>
                <h4 class="member-name"><?php echo get_theme_mod('team_member_1_name', 'Kurucu Ortak'); ?></h4>
                <p class="member-role"><?php echo get_theme_mod('team_member_1_role', 'Teknoloji Mimarı'); ?></p>
            </div>
            
            <div class="team-member">
                <div class="member-avatar"><span class="avatar-letter">DEV</span></div>
                <h4 class="member-name"><?php echo get_theme_mod('team_member_2_name', 'Lead Developer'); ?></h4>
                <p class="member-role"><?php echo get_theme_mod('team_member_2_role', 'Ar-Ge Mühendisi'); ?></p>
            </div>
            
             <div class="team-member">
                <div class="member-avatar"><span class="avatar-letter">ENG</span></div>
                <h4 class="member-name"><?php echo get_theme_mod('team_member_3_name', 'Sistem Mühendisi'); ?></h4>
                <p class="member-role"><?php echo get_theme_mod('team_member_3_role', 'Altyapı & Çözüm'); ?></p>
            </div>

            <div class="team-member">
                <div class="member-avatar"><span class="avatar-letter">+</span></div>
                <h4 class="member-name"><?php echo get_theme_mod('team_member_4_name', 'Aramıza Katıl'); ?></h4>
                <p class="member-role"><?php echo get_theme_mod('team_member_4_role', 'Kariyer Fırsatları'); ?></p>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>