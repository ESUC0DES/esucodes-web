<?php
/*
Template Name: Yönetici Girişi (Custom Login)
*/
if ( is_user_logged_in() ) {
    wp_redirect( admin_url('edit.php') );
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $creds = array();
    $creds['user_login'] = $_POST['username'] ?? '';
    $creds['user_password'] = $_POST['password'] ?? '';
    $creds['remember'] = true;
    $user = wp_signon($creds, false);

    if ( is_wp_error($user) ) {
        $error = 'Kullanıcı adı veya şifre hatalı!';
    } else {
        $user_obj = get_userdata($user->ID);
        if ( in_array('administrator', $user_obj->roles) ) {
            wp_redirect( admin_url('edit.php') );
            exit;
        } else {
            wp_logout();
            $error = 'Sadece yönetici girişi yapılabilir!';
        }
    }
}
get_header();
?>
<style>
.login-bg-galactic {
    min-height: 100vh;
    background: var(--bg-primary);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}
/* login-dots-bg kaldırıldı */
.login-card-galactic {
    background: var(--card-bg);
    border-radius: 1.25rem;
    box-shadow: var(--card-shadow);
    padding: 2.5rem 2rem 2rem 2rem;
    width: 350px;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    border: 1px solid var(--border-color);
}
.login-card-galactic h2 {
    margin-bottom: 1.5rem;
    background: linear-gradient(135deg, var(--galactic-purple), var(--galactic-blue), var(--galactic-cyan));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 700;
    font-size: 1.5rem;
    letter-spacing: 1px;
}
.login-card-galactic form {
    width: 100%;
    display: flex;
    flex-direction: column;
}
.login-card-galactic input[type="text"],
.login-card-galactic input[type="password"] {
    margin-bottom: 1rem;
    padding: 0.85rem 1rem;
    border: 1px solid var(--border-color);
    border-radius: 0.7rem;
    font-size: 1rem;
    background: var(--bg-tertiary);
    color: var(--text-primary);
    transition: border 0.2s;
}
.login-card-galactic input[type="text"]:focus,
.login-card-galactic input[type="password"]:focus {
    border-color: var(--accent-primary);
    outline: none;
}
.login-card-galactic button {
    background: linear-gradient(135deg, var(--galactic-purple), var(--galactic-blue));
    color: #fff;
    border: none;
    border-radius: 0.7rem;
    padding: 0.95rem 0;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    margin-top: 0.5rem;
    box-shadow: 0 2px 8px 0 rgba(99,102,241,0.08);
}
.login-card-galactic button:hover {
    background: linear-gradient(135deg, var(--galactic-blue), var(--galactic-cyan));
}
.login-card-galactic .error {
    color: #fff;
    background: linear-gradient(90deg, var(--galactic-pink), var(--galactic-purple));
    border-radius: 0.5rem;
    padding: 0.7rem 1rem;
    margin-bottom: 1rem;
    text-align: center;
    font-size: 0.98rem;
    border: none;
    box-shadow: 0 2px 8px 0 rgba(236,72,153,0.08);
}
@media (max-width: 480px) {
    .login-card-galactic {
        width: 95vw;
        padding: 2rem 0.5rem 1.5rem 0.5rem;
    }
}
</style>
<div class="login-bg-galactic">
  <div class="stars-container">
    <div class="stars"></div>
    <div class="twinkling"></div>
  </div>
  <div class="login-card-galactic">
    <h2>Yönetici Girişi</h2>
    <?php if ($error): ?>
      <div class="error"><?php echo esc_html($error); ?></div>
    <?php endif; ?>
    <form method="post" autocomplete="on">
      <input type="text" name="username" placeholder="Kullanıcı Adı" required autocomplete="username">
      <input type="password" name="password" placeholder="Şifre" required autocomplete="current-password">
      <button type="submit">Giriş Yap</button>
    </form>
  </div>
</div>
<script>document.body.classList.add('login-bg-galactic');</script>
<?php get_footer(); ?>
