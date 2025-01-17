<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin Paneli</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <h1><a href="index.php" id="home-link">HaberSitesi(22290991)</a></h1>
        <div class="header-buttons">
            <a href="index.php" class="button">Anasayfaya Dön</a>
            <a href="admin_panel.php" class="button admin" target="_blank">Admin Paneli</a>
        </div>
    </header>
    <div class="content-section">
        <div class="form-container">
            <h2>Haber Ekle</h2>
            <form action="haber_ekle.php" method="post" class="admin-form">
                <label for="haber_basligi">Haber Başlığı:</label><br>
                <input type="text" id="haber_basligi" name="haber_basligi" required><br>
                <label for="resim_url">Resim URL'si:</label><br>
                <input type="text" id="resim_url" name="resim_url" required><br>
                <label for="haber_aciklamasi">Haber Açıklaması:</label><br>
                <textarea id="haber_aciklamasi" name="haber_aciklamasi" required></textarea><br><br>
                <input type="submit" value="Haber Ekle">
            </form>
        </div>
    </div>

    <div class="footer">
        <div class="social-links">
            <a href="http://localhost/admin_panel.php" target="_blank" class="social-link">📱 Facebook</a>
            <a href="https://twitter.com/habersitesi" target="_blank" class="social-link">🐦 Twitter</a>
            <a href="https://instagram.com/habersitesi" target="_blank" class="social-link">📸 Instagram</a>
        </div>
        <div class="legal-links">
            <a href="about.html" class="footer-link">Hakkında</a>
            <a href="privacy.html" class="footer-link">Gizlilik Politikası</a>
            <a href="terms.html" class="footer-link">Kullanım Şartları</a>
            <a href="contact.html" class="footer-link">İletişim</a>
        </div>
    </div>

</body>

</html>
