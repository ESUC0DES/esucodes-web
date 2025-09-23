<?php
/**
 * Template Name: Blog Sayfası
 *
 * @package ESUcodes
 */

get_header(); ?>

<!-- Progress Bar -->
<div class="progress-bar" id="progressBar"></div>

<!-- Blog Header -->
<section class="blog-header">
    <div class="container">
        <h1 class="blog-title">Blog</h1>
        <p class="blog-subtitle">Yazılım dünyasından en güncel bilgiler ve rehberler</p>
    </div>
</section>

<!-- Blog Content -->
<section class="blog-content">
    <div class="container">
        <!-- Filters -->
        <div class="blog-filters">
            <!-- Kategori Akordiyon -->
            <div class="category-accordion">
                <div class="accordion-header" tabindex="0">
                    <span>Kategoriler</span>
                    <span class="accordion-toggle">▼</span>
                </div>
                <div class="accordion-content">
                    <div class="category-list">
                        <div class="category-item" data-category="">
                            <span class="category-name">Tümü</span>
                            <span class="category-count"><?php echo wp_count_posts()->publish; ?></span>
                        </div>
                        <?php
                        $categories = get_categories(array(
                            'hide_empty' => true,
                            'orderby' => 'name',
                            'order' => 'ASC',
                        ));
                        foreach ($categories as $category) {
                            // Eğer admin tarafında "Tümü" isminde gerçek bir kategori varsa (slug: tumu),
                            // üstte manuel eklediğimiz sanal "Tümü" ile çakışmaması için onu listeleme.
                            if ($category->slug === 'tumu' || trim($category->name) === 'Tümü') {
                                continue;
                            }
                            $post_count = $category->count;
                            echo '<div class="category-item" data-category="' . esc_attr($category->slug) . '">';
                            echo '<span class="category-name">' . esc_html($category->name) . '</span>';
                            echo '<span class="category-count">' . $post_count . '</span>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Arama -->
            <div class="filter-group">
                <label for="searchInput">Arama:</label>
                <input type="text" id="searchInput" class="filter-input" placeholder="Yazı ara...">
            </div>
        </div>

        <!-- Sonuç Sayısı -->
        <!-- <div class="result-count">Toplam <?php echo wp_count_posts()->publish; ?> yazı</div> -->
        
        <!-- Blog Posts Grid -->
        <div class="blog-grid" id="blogGrid">
            <?php
            // Server-side kategori filtresi ve sayfalama
            $paged = (get_query_var('paged')) ? get_query_var('paged') : (isset($_GET['paged']) ? (int) $_GET['paged'] : 1);
            $selected_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

            $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'paged' => $paged,
                'orderby' => 'date',
                'order' => 'DESC'
            );

            if (!empty($selected_category)) {
                $query_args['tax_query'] = array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => $selected_category
                    )
                );
            }

            $blog_posts = new WP_Query($query_args);

            if ($blog_posts->have_posts()) :
                while ($blog_posts->have_posts()) : $blog_posts->the_post(); 
                    $categories = get_the_category();
                    $category_name = !empty($categories) ? $categories[0]->name : 'Genel';
                    $category_slug = !empty($categories) ? $categories[0]->slug : 'genel';
                    $reading_time = get_reading_time();
                ?>
                    <article class="blog-card" data-categories="<?php echo esc_attr($category_slug); ?>">
                        <div class="blog-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', array('class' => 'blog-thumbnail')); ?>
                            <?php else : ?>
                                <div class="blog-placeholder">
                                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 19V5C21 3.9 20.1 3 19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19ZM8.5 13.5L11 16.51L14.5 12L19 18H5L8.5 13.5Z" fill="currentColor"/>
                                    </svg>
                                </div>
                            <?php endif; ?>
                            <div class="blog-category" data-category="<?php echo esc_attr($category_slug); ?>"><?php echo esc_html($category_name); ?></div>
                        </div>
                        <div class="blog-content-inner">
                            <h2 class="blog-card-title"><?php the_title(); ?></h2>
                            <p class="blog-excerpt">
                                <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                            </p>
                            <div class="blog-meta">
                                <span class="blog-author"><?php the_author(); ?></span>
                                <span class="blog-date"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' önce'; ?></span>
                                <span class="blog-read-time"><?php echo $reading_time; ?> dk okuma</span>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="blog-read-more">Devamını Oku →</a>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <div class="no-posts">
                    <h3>Yazı bulunamadı</h3>
                    <p>Henüz blog yazısı bulunmuyor.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if ($blog_posts->max_num_pages > 1) : ?>
            <div class="pagination">
                <div class="pagination-buttons">
                    <?php
                    $current_page = max(1, get_query_var('paged'));
                    if ($current_page == 1 && isset($_GET['paged'])) {
                        $current_page = max(1, (int) $_GET['paged']);
                    }
                    $total_pages = $blog_posts->max_num_pages;
                    $cat_param = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
                    
                    // Debug için
                    if (current_user_can('administrator')) {
                        echo '<!-- Debug: current_page=' . $current_page . ', total_pages=' . $total_pages . ', category=' . $cat_param . ' -->';
                    }
                    
                    // Önceki sayfa butonu
                    if ($current_page > 1) {
                        $prev_page = $current_page - 1;
                        $prev_link = add_query_arg('paged', $prev_page, get_permalink());
                        if (!empty($cat_param)) {
                            $prev_link = add_query_arg('category', $cat_param, $prev_link);
                        }
                        echo '<a href="' . esc_url($prev_link) . '" class="pagination-btn prev-btn">← Önceki</a>';
                    }
                    
                    // Sayfa numaraları
                    $start_page = max(1, $current_page - 2);
                    $end_page = min($total_pages, $current_page + 2);
                    
                    // İlk sayfa
                    if ($start_page > 1) {
                        $first_link = add_query_arg('paged', 1, get_permalink());
                        if (!empty($cat_param)) {
                            $first_link = add_query_arg('category', $cat_param, $first_link);
                        }
                        echo '<a href="' . esc_url($first_link) . '" class="pagination-btn">1</a>';
                        if ($start_page > 2) {
                            echo '<span class="pagination-dots">...</span>';
                        }
                    }
                    
                    // Sayfa numaraları
                    for ($i = $start_page; $i <= $end_page; $i++) {
                        if ($i == $current_page) {
                            echo '<span class="pagination-btn current-page">' . $i . '</span>';
                        } else {
                            $num_link = add_query_arg('paged', $i, get_permalink());
                            if (!empty($cat_param)) {
                                $num_link = add_query_arg('category', $cat_param, $num_link);
                            }
                            echo '<a href="' . esc_url($num_link) . '" class="pagination-btn">' . $i . '</a>';
                        }
                    }
                    
                    // Son sayfa
                    if ($end_page < $total_pages) {
                        if ($end_page < $total_pages - 1) {
                            echo '<span class="pagination-dots">...</span>';
                        }
                        $last_link = add_query_arg('paged', $total_pages, get_permalink());
                        if (!empty($cat_param)) {
                            $last_link = add_query_arg('category', $cat_param, $last_link);
                        }
                        echo '<a href="' . esc_url($last_link) . '" class="pagination-btn">' . $total_pages . '</a>';
                    }
                    
                    // Sonraki sayfa butonu
                    if ($current_page < $total_pages) {
                        $next_page = $current_page + 1;
                        $next_link = add_query_arg('paged', $next_page, get_permalink());
                        if (!empty($cat_param)) {
                            $next_link = add_query_arg('category', $cat_param, $next_link);
                        }
                        echo '<a href="' . esc_url($next_link) . '" class="pagination-btn next-btn">Sonraki →</a>';
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
// Blog filtreleme ve arama fonksiyonları
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const blogGrid = document.getElementById('blogGrid');
    const categoryItems = document.querySelectorAll('.category-item');
    const accordionHeader = document.querySelector('.accordion-header');
    const accordionContent = document.querySelector('.accordion-content');
    
    let selectedCategory = '';
    let searchTerm = '';

    // Akordiyon toggle
    if (accordionHeader && accordionContent) {
        accordionHeader.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            console.log('Akordiyon tıklandı'); // Debug için
            
            const isActive = accordionContent.classList.contains('active');
            
            if (isActive) {
                accordionContent.classList.remove('active');
            } else {
                accordionContent.classList.add('active');
            }
            
            const toggle = this.querySelector('.accordion-toggle');
            if (toggle) {
                toggle.textContent = accordionContent.classList.contains('active') ? '▲' : '▼';
            }
        });
        
        // Dışarı tıklandığında kapat
        document.addEventListener('click', function(e) {
            if (!accordionHeader.contains(e.target) && !accordionContent.contains(e.target)) {
                accordionContent.classList.remove('active');
                const toggle = accordionHeader.querySelector('.accordion-toggle');
                if (toggle) {
                    toggle.textContent = '▼';
                }
            }
        });
    } else {
        console.log('Akordiyon elementleri bulunamadı:', {accordionHeader, accordionContent});
    }

    // Kategori seçimi
    categoryItems.forEach(item => {
        item.addEventListener('click', function() {
            // Önceki seçili kategoriyi temizle
            categoryItems.forEach(cat => cat.classList.remove('active'));
            
            // Yeni kategoriyi seç
            this.classList.add('active');
            selectedCategory = this.getAttribute('data-category');
            
            // Arama çubuğunu temizle
            if (searchInput) {
                searchInput.value = '';
                searchTerm = '';
            }
            
            // URL üzerinden server-side filtreleme ve sayfa 1'e git
            const url = new URL(window.location.href);
            if (selectedCategory) {
                url.searchParams.set('category', selectedCategory);
            } else {
                url.searchParams.delete('category');
            }
            url.searchParams.delete('paged');
            window.location.href = url.toString();
            
            // Akordiyonu kapat
            if (accordionContent) {
                accordionContent.classList.remove('active');
                const toggle = accordionHeader.querySelector('.accordion-toggle');
                if (toggle) {
                    toggle.textContent = '▼';
                }
            }
        });
    });

    // Arama fonksiyonu
    let searchTimeout;
    if (searchInput) {
        searchInput.addEventListener('input', function() {
        searchTerm = this.value.toLowerCase();
        
        // Debounce: 300ms bekle
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            if (searchTerm.length > 0) {
                // AJAX ile arama yap
                searchBlogPosts(searchTerm);
            } else {
                // Arama temizlendiğinde normal filtrelemeye dön
                filterBlogPosts();
                // Sayfalamayı tekrar göster
                showPagination();
            }
        }, 300);
        
        // Kategori seçimini temizleme - kaldırıldı
        // categoryItems.forEach(cat => cat.classList.remove('active'));
        // selectedCategory = '';
        });
    }

    // AJAX ile blog arama
    function searchBlogPosts(searchTerm) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        displaySearchResults(response.data, searchTerm);
                    }
                } catch (e) {
                    console.error('JSON parse error:', e);
                }
            }
        };
        
        const data = 'action=search_blog_posts&search=' + encodeURIComponent(searchTerm) + '&nonce=<?php echo wp_create_nonce('search_blog_nonce'); ?>';
        xhr.send(data);
    }

    // Arama sonuçlarını göster
    function displaySearchResults(posts, searchTerm) {
        blogGrid.innerHTML = '';
        
        if (posts.length === 0) {
            blogGrid.innerHTML = '<div class="no-posts"><h3>Arama sonucu bulunamadı</h3><p>"' + searchTerm + '" için sonuç bulunamadı.</p></div>';
            updateResultCount(0, searchTerm);
            // Sayfalamayı gizle
            hidePagination();
            return;
        }
        
        posts.forEach(post => {
            const blogCard = createBlogCard(post);
            blogGrid.appendChild(blogCard);
        });
        
        updateResultCount(posts.length, searchTerm);
        // Sayfalamayı gizle
        hidePagination();
        
        // Kategori seçimini temizle (sadece arama yapıldığında)
        categoryItems.forEach(cat => cat.classList.remove('active'));
        selectedCategory = '';
    }

    // Blog kartı oluştur
    function createBlogCard(post) {
        const article = document.createElement('article');
        article.className = 'blog-card';
        article.setAttribute('data-categories', post.category_slug);
        
        article.innerHTML = `
            <div class="blog-image">
                ${post.thumbnail ? `<img src="${post.thumbnail}" class="blog-thumbnail" alt="${post.title}">` : `
                <div class="blog-placeholder">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 19V5C21 3.9 20.1 3 19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19ZM8.5 13.5L11 16.51L14.5 12L19 18H5L8.5 13.5Z" fill="currentColor"/>
                    </svg>
                </div>`}
                <div class="blog-category" data-category="${post.category_slug}">${post.category_name}</div>
            </div>
            <div class="blog-content-inner">
                <h2 class="blog-card-title">${post.title}</h2>
                <p class="blog-excerpt">${post.excerpt}</p>
                <div class="blog-meta">
                    <span class="blog-author">${post.author}</span>
                    <span class="blog-date">${post.date}</span>
                    <span class="blog-read-time">${post.reading_time} dk okuma</span>
                </div>
                <a href="${post.url}" class="blog-read-more">Devamını Oku →</a>
            </div>
        `;
        
        return article;
    }

    // Filtreleme fonksiyonu
    function filterBlogPosts() {
        const blogCards = blogGrid.querySelectorAll('.blog-card');
        let visibleCount = 0;
        
        blogCards.forEach(card => {
            const title = card.querySelector('.blog-card-title').textContent.toLowerCase();
            const excerpt = card.querySelector('.blog-excerpt').textContent.toLowerCase();
            const category = card.querySelector('.blog-category').getAttribute('data-category');
            
            let shouldShow = true;
            
            // Kategori filtresi
            if (selectedCategory && category !== selectedCategory) {
                shouldShow = false;
            }
            
            // Arama filtresi (sadece yerel filtreleme için)
            if (searchTerm && !title.includes(searchTerm) && !excerpt.includes(searchTerm)) {
                shouldShow = false;
            }
            
            if (shouldShow) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        
        // Sonuç sayısını güncelle
        updateResultCount(visibleCount);
        
        // Arama yapılıyorsa sayfalamayı gizle, yapılmıyorsa göster
        if (searchTerm) {
            hidePagination();
        } else {
            showPagination();
        }
    }

    // Sonuç sayısını güncelle
    function updateResultCount(count, searchTermParam = '') {
        let resultText = '';
        if (selectedCategory) {
            const categoryName = document.querySelector('.category-item.active .category-name').textContent;
            resultText = `${categoryName} kategorisinde ${count} yazı bulundu`;
        } else if (searchTerm || searchTermParam) {
            const term = searchTerm || searchTermParam;
            resultText = `"${term}" için ${count} sonuç bulundu`;
        } else {
            resultText = `Toplam ${count} yazı`;
        }
        
        // Sonuç sayısını göster (eğer varsa)
        const resultCount = document.querySelector('.result-count');
        if (resultCount) {
            resultCount.textContent = resultText;
        }
    }

    // Blog kartlarına tıklama olayı
    blogGrid.addEventListener('click', function(e) {
        const blogCard = e.target.closest('.blog-card');
        if (blogCard) {
            const link = blogCard.querySelector('.blog-read-more');
            if (link) {
                window.location.href = link.href;
            }
        }
    });

    // Sayfalama kontrol fonksiyonları
    function hidePagination() {
        const pagination = document.querySelector('.pagination');
        if (pagination) {
            pagination.style.display = 'none';
        }
    }
    
    function showPagination() {
        const pagination = document.querySelector('.pagination');
        if (pagination) {
            pagination.style.display = 'block';
        }
    }
    
    // İlk yüklemede sonuç sayısını göster
    updateResultCount(blogGrid.querySelectorAll('.blog-card').length);
});
</script>

<?php
// Helper function for reading time
function get_reading_time() {
    $content = get_the_content();
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // 200 words per minute
    return $reading_time > 0 ? $reading_time : 1;
}
?>

<?php get_footer(); ?> 