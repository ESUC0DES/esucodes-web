<!-- Footer -->
<footer class="footer">
    <div class="container">
        <?php if (!is_page_template('page-templates/login.php')): ?>
            <div class="footer-content">
                <div class="footer-brand">
                    <h3 class="footer-logo"><?php echo get_theme_mod('footer_logo_text', 'ESUcodes'); ?></h3>
                    <p><?php echo get_theme_mod('footer_description', 'Geleceğin yazılım topluluğu'); ?></p>
                </div>
                <div class="footer-links">
                    <div class="footer-section">
                        <h4><?php echo get_theme_mod('footer_pages_title', 'Sayfalar'); ?></h4>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class' => 'footer-menu',
                            'container' => false,
                            'fallback_cb' => 'esucodes_footer_fallback_menu'
                        ));
                        ?>
                    </div>
                    <div class="footer-section">
                        <h4><?php echo get_theme_mod('footer_contact_title', 'İletişim'); ?></h4>
                        <a href="mailto:<?php echo get_theme_mod('footer_email', 'info@esucodes.com'); ?>">
                            <?php echo get_theme_mod('footer_email', 'info@esucodes.com'); ?>
                        </a>
                        <a href="<?php echo get_theme_mod('footer_github', 'https://github.com/esucodes'); ?>">GitHub</a>
                        <a href="<?php echo get_theme_mod('footer_twitter', 'https://twitter.com/esucodes'); ?>">Twitter</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php echo get_theme_mod('footer_copyright', 'ESUcodes. Tüm hakları saklıdır.'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<script>
// Progress Bar functionality
function updateProgressBar() {
    const progressBar = document.getElementById('progressBar');
    if (!progressBar) return;
    
    const scrollTop = window.pageYOffset;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const scrollPercent = (scrollTop / docHeight) * 100;
    
    progressBar.style.width = scrollPercent + '%';
}

// Typing animation for hero title
function initTypingAnimation() {
    const heroTitle = document.querySelector('.hero-title');
    if (!heroTitle) return;
    
    const text = 'ESUcodes';
    heroTitle.innerHTML = '<span class="typing-text"></span><span class="typing-cursor">|</span>';
    const typingText = heroTitle.querySelector('.typing-text');
    const typingCursor = heroTitle.querySelector('.typing-cursor');
    
    let i = 0;
    const typeWriter = () => {
        if (i < text.length) {
            typingText.textContent += text.charAt(i);
            i++;
            setTimeout(typeWriter, 170);
        } else {
            setTimeout(() => {
                heroTitle.classList.add('typing');
            }, 500);
        }
    };
    
    setTimeout(typeWriter, 500);
}

// Header scroll effect
function updateHeaderBackground() {
    const header = document.querySelector('.header');
    if (header) {
        if (window.pageYOffset > 50) {
            header.style.background = 'rgba(15, 23, 42, 0.98)';
            if (document.documentElement.getAttribute('data-theme') === 'light') {
                header.style.background = 'rgba(255, 255, 255, 0.98)';
            }
        } else {
            header.style.background = 'rgba(15, 23, 42, 0.95)';
            if (document.documentElement.getAttribute('data-theme') === 'light') {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
            }
        }
    }
}

// Initialize all functionality when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize typing animation
    initTypingAnimation();
    
    // Initialize progress bar
    updateProgressBar();
    window.addEventListener('scroll', updateProgressBar);
    
    // Initialize header scroll effect
    updateHeaderBackground();
    window.addEventListener('scroll', updateHeaderBackground);
});

<?php
// Footer fallback menu function
function esucodes_footer_fallback_menu() {
    echo '<a href="' . home_url('/') . '">Ana Sayfa</a>';
    echo '<a href="' . get_permalink(get_option('page_for_posts')) . '">Blog</a>';
    echo '<a href="#about">Hakkımızda</a>';
}
?>
</script>

</body>
</html> 

