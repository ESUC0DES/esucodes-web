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
        
        // Initialize 404 page animations
        init404Animations();
        
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

    // 404 Page Animations
    function init404Animations() {
        // Only run on 404 page
        if (!document.body.classList.contains('error404')) return;
        
        // Animate error number on load
        const errorNumber = document.querySelector('.error-number');
        if (errorNumber) {
            errorNumber.style.opacity = '0';
            errorNumber.style.transform = 'scale(0.5)';
            
            setTimeout(() => {
                errorNumber.style.transition = 'all 1s ease-out';
                errorNumber.style.opacity = '1';
                errorNumber.style.transform = 'scale(1)';
            }, 300);
        }
        
        // Animate error icon
        const errorIcon = document.querySelector('.error-icon');
        if (errorIcon) {
            errorIcon.style.opacity = '0';
            errorIcon.style.transform = 'rotate(-180deg)';
            
            setTimeout(() => {
                errorIcon.style.transition = 'all 1.5s ease-out';
                errorIcon.style.opacity = '1';
                errorIcon.style.transform = 'rotate(0deg)';
            }, 800);
        }
        
        // Stagger animation for quick links
        const quickLinks = document.querySelectorAll('.quick-link');
        quickLinks.forEach((link, index) => {
            link.style.opacity = '0';
            link.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                link.style.transition = 'all 0.6s ease-out';
                link.style.opacity = '1';
                link.style.transform = 'translateY(0)';
            }, 1200 + (index * 150));
        });
        
        // Animate recent posts
        const recentPosts = document.querySelectorAll('.recent-post-card');
        recentPosts.forEach((post, index) => {
            post.style.opacity = '0';
            post.style.transform = 'translateX(-30px)';
            
            setTimeout(() => {
                post.style.transition = 'all 0.6s ease-out';
                post.style.opacity = '1';
                post.style.transform = 'translateX(0)';
            }, 1800 + (index * 200));
        });
        
        // Add hover effects for interactive elements
        add404HoverEffects();
        
        // Add search functionality
        init404Search();
    }
    
    // 404 Hover Effects
    function add404HoverEffects() {
        const quickLinks = document.querySelectorAll('.quick-link');
        const recentPosts = document.querySelectorAll('.recent-post-card');
        
        quickLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });
            
            link.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
        
        recentPosts.forEach(post => {
            post.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.02)';
            });
            
            post.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    }
    
    // 404 Search Functionality
    function init404Search() {
        const searchForm = document.querySelector('.error-search .search-form');
        const searchField = document.querySelector('.search-field');
        const searchSubmit = document.querySelector('.search-submit');
        
        if (searchForm && searchField && searchSubmit) {
            // Add focus effects
            searchField.addEventListener('focus', function() {
                this.parentElement.style.borderColor = 'var(--accent-primary)';
                this.parentElement.style.boxShadow = '0 0 0 3px rgba(99, 102, 241, 0.1)';
            });
            
            searchField.addEventListener('blur', function() {
                this.parentElement.style.borderColor = 'var(--border-color)';
                this.parentElement.style.boxShadow = 'none';
            });
            
            // Add loading state to search button
            searchForm.addEventListener('submit', function(e) {
                searchSubmit.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
                searchSubmit.style.pointerEvents = 'none';
                
                // Reset after 2 seconds if no redirect happens
                setTimeout(() => {
                    searchSubmit.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 21L16.514 16.506L21 21ZM19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
                    searchSubmit.style.pointerEvents = 'auto';
                }, 2000);
            });
        }
    }
    
    // 404 Page Parallax Effect
    function init404Parallax() {
        if (!document.body.classList.contains('error404')) return;
        
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const errorAnimation = document.querySelector('.error-animation');
            
            if (errorAnimation) {
                const rate = scrolled * -0.5;
                errorAnimation.style.transform = `translateY(${rate}px)`;
            }
        });
    }
    
    // Initialize 404 parallax
    init404Parallax();

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