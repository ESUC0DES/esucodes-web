/**
 * ESUcodes Theme JavaScript
 */

(function($) {
    'use strict';

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

    // Smooth scrolling for anchor links
    function initSmoothScrolling() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            const target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800);
            }
        });
    }

    // Mobile menu toggle
    function initMobileMenu() {
        const mobileMenuToggle = $('.mobile-menu-toggle');
        const navMenu = $('.nav-menu');
        
        if (mobileMenuToggle.length && navMenu.length) {
            mobileMenuToggle.on('click', function() {
                navMenu.toggleClass('active');
                $(this).toggleClass('active');
            });
        }
    }

    // Lazy loading for images
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }

    // Initialize all functionality when DOM is loaded
    $(document).ready(function() {
        // Initialize typing animation
        initTypingAnimation();
        
        // Initialize progress bar
        updateProgressBar();
        $(window).on('scroll', updateProgressBar);
        
        // Initialize header scroll effect
        updateHeaderBackground();
        $(window).on('scroll', updateHeaderBackground);
        
        // Initialize smooth scrolling
        initSmoothScrolling();
        
        // Initialize mobile menu
        initMobileMenu();
        
        // Initialize lazy loading
        initLazyLoading();
        
        // Initialize blog filters
        initBlogFilters();
        
        // Initialize blog accordion
        initBlogAccordion();
        
        // Add loading animations
        addLoadingAnimations();
    });

    // Add loading animations
    function addLoadingAnimations() {
        const cards = document.querySelectorAll('.project-card, .feature-card, .post-card, .blog-card');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });
        
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });
    }

    // Blog filtering functionality
    function initBlogFilters() {
        const categoryFilter = document.getElementById('categoryFilter');
        const sortFilter = document.getElementById('sortFilter');
        const searchInput = document.getElementById('searchInput');

        if (categoryFilter) {
            categoryFilter.addEventListener('change', function() {
                filterBlogPosts();
            });
        }

        if (sortFilter) {
            sortFilter.addEventListener('change', function() {
                filterBlogPosts();
            });
        }

        if (searchInput) {
            searchInput.addEventListener('input', function() {
                filterBlogPosts();
            });
        }
    }

    function filterBlogPosts() {
        const category = document.getElementById('categoryFilter')?.value || '';
        const sort = document.getElementById('sortFilter')?.value || 'newest';
        const search = document.getElementById('searchInput')?.value || '';

        // Build URL with filters
        let url = window.location.pathname;
        const params = new URLSearchParams();

        if (category) params.append('category', category);
        if (sort !== 'newest') params.append('orderby', sort);
        if (search) params.append('s', search);

        if (params.toString()) {
            url += '?' + params.toString();
        }

        // Navigate to filtered URL
        window.location.href = url;
    }

    // Load more posts function
    window.loadMorePosts = function(page) {
        $.ajax({
            url: esucodes_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_posts',
                nonce: esucodes_ajax.nonce,
                page: page
            },
            success: function(response) {
                if (response.success) {
                    $('.blog-grid').append(response.data.html);
                    if (response.data.has_more) {
                        $('.load-more-btn').show();
                    } else {
                        $('.load-more-btn').hide();
                    }
                }
            }
        });
    };

    // AJAX functions
    window.esucodesAjax = {
        // Load more posts
        loadMorePosts: function(page) {
            $.ajax({
                url: esucodes_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'load_more_posts',
                    nonce: esucodes_ajax.nonce,
                    page: page
                },
                success: function(response) {
                    if (response.success) {
                        $('.posts-grid').append(response.data.html);
                        if (response.data.has_more) {
                            $('.load-more-btn').show();
                        } else {
                            $('.load-more-btn').hide();
                        }
                    }
                }
            });
        },

        // Search posts
        searchPosts: function(query) {
            $.ajax({
                url: esucodes_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'search_posts',
                    nonce: esucodes_ajax.nonce,
                    query: query
                },
                success: function(response) {
                    if (response.success) {
                        $('.posts-grid').html(response.data.html);
                    }
                }
            });
        }
    };

})(jQuery); 