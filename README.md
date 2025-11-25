# ESUcodes Web (WordPress Tema)

Modern, koyu temalı ve galaktik görünümlü bir WordPress teması. Blog, sayfa şablonları, Customizer ayarları, AJAX arama ve NewsAPI ile teknoloji haberleri gibi pek çok özellikle gelir.

## İçindekiler
- Proje Hakkında
- Özellikler
- Kurulum
- Gerekli Sürüm ve Bağımlılıklar
- Yapı ve Dosya Ağacı
- Sayfa Şablonları
- Customizer (Özelleştirici) Ayarları
- Menü ve Widget Alanları
- Haberler (NewsAPI) Entegrasyonu
- Geliştirme ve Yapılandırma Notları
- Sorun Giderme
- Lisans

## Proje Hakkında
Bu depo, `tema 13/tema/` altında yer alan ESUcodes WordPress temasını içerir. Varsayılan koyu temalı, responsive ve performans odaklıdır. Blog deneyimi için özel `Blog` sayfa şablonu, arşiv ve tekil yazı şablonları bulunur.

## Özellikler
- Koyu tema varsayılan, aydınlık tema destekli tasarım
- Responsive arayüz ve modern tipografi (Inter fontu)
- Blog listesi, arşiv ve tekil yazı sayfaları
- Özel sayfa şablonları: Hakkımızda, Hizmetler, İletişim, Blog, Yönetici Girişi
- WordPress Customizer ile içerik ve metinleri yönetme
- Özel `project` içerik türü (Portfolio/Projeler)
- Kategoriler için akordiyon, arama kutusu, sayfalama
- AJAX ile blog arama (kullanıcı girişi gerektirmez)
- NewsAPI ile teknoloji haberleri göstergesi + 6 saat cache
- Güvenlik iyileştirmeleri (XML-RPC kapatma, gereksiz meta kaldırma)
- Performans odaklı CSS ve lazy-loading kurgusu

## Kurulum
1) Temayı sunucuya kopyalayın:
```
wp-content/themes/esucodes/
```
2) WordPress Yönetim > Görünüm > Temalar > ESUcodes temasını etkinleştirin.

3) Menüleri oluşturun ve ata:
- Görünüm > Menüler > `Primary Menu` ve `Footer Menu`

4) Özelleştirici üzerinden metinleri düzenleyin:
- Görünüm > Özelleştir: Hero açıklaması, Hakkımızda, Footer içerikleri, Blog başlıkları

5) İsteğe bağlı: `Blog` adında bir sayfa oluşturun ve şablon olarak `Blog Sayfası` seçin. Tema gerekli kuralları otomatik ekler ve gerekirse blog sayfasını oluşturur.

## Gerekli Sürüm ve Bağımlılıklar
- PHP 7.4+
- WordPress 6.x önerilir
- jQuery (WordPress ile birlikte gelir)

## Yapı ve Dosya Ağacı
```
tema 13/tema/
├── style.css                # Tema üst bilgisi ve tüm stiller
├── functions.php            # Tema kurulumları, Customizer, CPT, AJAX, NewsAPI
├── header.php               # Üst gezinme, login/giriş butonu
├── footer.php               # Alt bilgi, footer menüsü ve bazı JS başlatmaları
├── index.php                # Ana sayfa (Hero, Tech News, Son Yazılar)
├── archive.php              # Kategori/etiket/yazar arşiv sayfası
├── single.php               # Tekil yazı sayfası
├── page.php                 # Genel sayfa şablonu
├── main.js                  # Tema JS (progress bar, typing, filtreler, lazy-load)
└── page-templates/
    ├── blog.php            # Blog sayfası (kategori akordiyon + arama + sayfalama)
    ├── about.php           # Hakkımızda
    ├── services.php        # Hizmetler
    ├── contact.php         # İletişim
    └── login.php           # Yönetici girişi (sadece admin). 
```

## Sayfa Şablonları
- Blog Sayfası: Kategori akordiyon, arama kutusu, server-side sayfalama.
- Hakkımızda: Başlık, istatistikler, misyon-vizyon, değerler, ekip.
- Hizmetler: Hizmet kartları, süreç adımları, CTA.
- İletişim: Form (HTML), iletişim bilgileri, sosyal linkler, harita placeholder, SSS.
- Yönetici Girişi: Sadece admin rolüne giriş izni, diğer roller engellenir.

## Customizer (Özelleştirici) Ayarları
`functions.php` içinde tanımlı ana başlıklar:
- Hero Section: `hero_description`
- About Section: `about_title`, `feature_1..4_*` (ikon, başlık, açıklama)
- Footer: `footer_logo_text`, `footer_description`, `footer_email`, `footer_github`, `footer_twitter`, `footer_copyright`
- Blog: `blog_title`, `blog_subtitle`

İpucu: Gelişmiş metinler (hizmetler, ekip, SSS vb.) ilgili şablonlarda `get_theme_mod` ile okunur; isterseniz aynı anahtarlara Customizer alanları ekleyebilirsiniz.

## Menü ve Widget Alanları
- Kayıtlı menüler: `primary`, `footer`
- Widget alanları: `Sidebar (sidebar-1)`, `Footer Widget Area (footer-1)`

## Haberler (NewsAPI) Entegrasyonu
- Fonksiyon: `esucodes_get_tech_news()` 6 saatlik transient cache ile 4 haber getirir.
- Anahtar öncelik sırası: `ESUCODES_NEWSAPI_KEY` sabiti > `esucodes_news_api_key` filtresi > Customizer `newsapi_key` (varsa).
- Geliştirme kolaylığı için repo içinde bir filter ile örnek bir API anahtarı geçici olarak sağlanmıştır. Canlı ortamda:
  - `wp-config.php` içine `define('ESUCODES_NEWSAPI_KEY', 'YOUR_KEY');` ekleyin veya
  - Child theme/plugin ile `add_filter('esucodes_news_api_key', fn() => 'YOUR_KEY');` uygulayın.

## Geliştirme ve Yapılandırma Notları
- Blog URL’leri: Tema, `blog` sayfası için rewrite kuralı ekler ve yoksa sayfayı oluşturup `page_for_posts` olarak atayabilir.
- Güvenlik: `wp_generator`, `wlwmanifest_link`, `rsd_link` kaldırılır; XML-RPC kapatılır.
- Görseller: `esucodes-hero`, `esucodes-card`, `esucodes-thumbnail` özel boyutlar kayıtlıdır.
- JS: `main.js` jQuery ile başlatmalar (progress bar, typing, filtreler, lazy-loading, smooth scroll) içerir.
- CSS: Koyu ve açık tema değişkenleri, blog kartları, akordiyon, sayfalama, sayfa şablonları için kapsamlı stiller mevcuttur.

## Sorun Giderme
- Tema etkin fakat CSS/JS görünmüyor: Önbelleği (cache/CDN) temizleyin, `wp_head()` ve `wp_footer()` çağrılarının temada olduğundan emin olun.
- Blog sayfası 404: Kalıcı bağlantıları tekrar kaydedin (Ayarlar > Kalıcı bağlantılar > Değişiklikleri kaydet) ve `after_switch_theme` sonrası rewrite’ların flush edildiğini kontrol edin.
- NewsAPI boş dönüyor: API anahtarını doğrulayın, kota limitlerini ve uç noktayı kontrol edin; admin kullanıcı iseniz `?refresh_news=1` ile cache temizleyebilirsiniz.
- Arama çalışmıyor: `admin-ajax.php` erişilebilir olmalı; `functions.php` içindeki `search_blog_posts` action’larının yüklendiğini doğrulayın.

## Lisans
Tema GPL v2 veya üzeri.
