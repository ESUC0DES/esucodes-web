# Antiesucodes WordPress Teması

Modern ve galaktik tasarımlı WordPress teması. Koyu tema varsayılan olarak ayarlanmış ve tamamen özelleştirilebilir.

## 🚀 Özellikler

### 🎨 Tasarım
- **Koyu Tema Varsayılan**: Modern koyu tema tasarımı
- **Galaktik Renkler**: Mor, mavi ve cyan gradyanları
- **Responsive Tasarım**: Tüm cihazlarda mükemmel görünüm
- **Progress Bar**: Sayfa kaydırma göstergesi
- **Yazma Animasyonu**: Hero başlığında yazma efekti

### 📝 İçerik Yönetimi
- **WordPress Customizer**: Tüm ayarlar WordPress panelinden
- **Hero Section**: Özelleştirilebilir hero bölümü
- **Özellikler Grid**: 4 adet özelleştirilebilir özellik kartı
- **Blog Sistemi**: Tam blog desteği
- **Proje Post Type**: Özel proje yazı tipi

### ⚡ Performans
- **Optimize Edilmiş CSS**: Minimal ve hızlı
- **Lazy Loading**: Görsel yükleme optimizasyonu
- **AJAX Desteği**: Dinamik içerik yükleme
- **SEO Dostu**: Arama motoru optimizasyonu

## 📦 Kurulum

1. **Tema Dosyalarını Yükleyin**
   ```
   wp-content/themes/antiesucodes/
   ```

2. **WordPress Admin Panelinden Etkinleştirin**
   - Görünüm > Temalar
   - Antiesucodes temasını etkinleştirin

3. **Menüleri Ayarlayın**
   - Görünüm > Menüler
   - Primary ve Footer menülerini oluşturun

4. **Özelleştiriciyi Kullanın**
   - Görünüm > Özelleştir
   - Hero, About ve Footer ayarlarını yapın

## 🎛️ Özelleştirme

### Hero Section
- Hero açıklaması
- Birincil buton metni ve URL'si
- İkincil buton metni ve URL'si

### About Section
- Bölüm başlığı
- 4 adet özellik kartı
- Her kart için ikon, başlık ve açıklama

### Footer
- Logo metni
- Açıklama metni
- E-posta adresi
- Sosyal medya linkleri
- Telif hakkı metni

## 📁 Dosya Yapısı

```
wordpress-theme/
├── style.css              # Ana CSS dosyası
├── index.php              # Ana tema dosyası
├── header.php             # Header şablonu
├── footer.php             # Footer şablonu
├── functions.php          # Tema fonksiyonları
├── single.php             # Tek yazı şablonu
├── archive.php            # Arşiv şablonu
├── js/
│   └── main.js           # JavaScript dosyası
└── README.md             # Bu dosya
```

## 🎨 CSS Sınıfları

### Ana Bileşenler
- `.hero` - Ana hero bölümü
- `.feature-card` - Özellik kartları
- `.post-card` - Blog kartları
- `.blog-card` - Blog detay kartları
- `.progress-bar` - İlerleme çubuğu

### Renk Değişkenleri
```css
--bg-primary: #0f172a;        /* Ana arka plan */
--bg-secondary: #1e293b;      /* İkincil arka plan */
--text-primary: #f1f5f9;      /* Ana metin */
--accent-primary: #818cf8;     /* Birincil vurgu */
--galactic-purple: #8b5cf6;   /* Galaktik mor */
--galactic-blue: #06b6d4;     /* Galaktik mavi */
```

## 🔧 Özelleştirme

### Yeni Özellik Ekleme
```php
// functions.php içinde
$wp_customize->add_setting('yeni_ozellik', array(
    'default' => 'Varsayılan değer',
    'sanitize_callback' => 'sanitize_text_field',
));
```

### CSS Özelleştirme
```css
/* style.css içinde */
.yeni-sinif {
    background: var(--galactic-purple);
    color: var(--text-primary);
}
```

## 📱 Responsive Tasarım

### Breakpoint'ler
- **Desktop**: 1200px+
- **Tablet**: 768px - 1199px
- **Mobile**: 320px - 767px

### Mobil Özellikler
- Hamburger menü
- Dokunmatik dostu butonlar
- Optimize edilmiş görsel boyutları

## 🚀 Performans İpuçları

1. **Görsel Optimizasyonu**
   - WebP formatını kullanın
   - Lazy loading aktif
   - Uygun boyutlarda görseller

2. **Cache Kullanımı**
   - WordPress cache eklentisi
   - CDN kullanımı
   - Browser cache ayarları

3. **Database Optimizasyonu**
   - Gereksiz eklentileri kaldırın
   - Database temizliği yapın
   - Optimize edilmiş sorgular

## 🐛 Sorun Giderme

### Yaygın Sorunlar

1. **Tema Yüklenmiyor**
   - Dosya izinlerini kontrol edin
   - PHP sürümünü kontrol edin (7.4+)

2. **CSS Yüklenmiyor**
   - Cache'i temizleyin
   - CDN ayarlarını kontrol edin

3. **JavaScript Hataları**
   - Console'u kontrol edin
   - jQuery yüklü mü kontrol edin

## 📞 Destek

- **E-posta**: info@antiesucodes.com
- **GitHub**: https://github.com/antiesucodes
- **Dokümantasyon**: https://docs.antiesucodes.com

## 📄 Lisans

Bu tema GPL v2 veya üzeri lisansı altında lisanslanmıştır.

## 🔄 Güncellemeler

### v1.0.0
- İlk sürüm
- Koyu tema tasarımı
- WordPress Customizer entegrasyonu
- Responsive tasarım
- Blog sistemi
- Progress bar ve animasyonlar

---

**Antiesucodes WordPress Teması** - Modern ve galaktik tasarım ile geleceğin yazılım topluluğu için geliştirildi. 