<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Haber Detay</title>
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
        <div class="main-content">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "news";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Bağlantı hatası: " . $conn->connect_error);
            }

            if (isset($_GET["id"])) {
                $id = intval($_GET["id"]);
                $sql = "SELECT * FROM haberler WHERE id=$id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<h2 class='main-title'>" . $row["haber_basligi"] . "</h2>";
                        echo "<img src='" . $row["resim_url"] . "' alt='Haber Resmi' class='main-image'>";
                        echo "<p class='main-description'>" . $row["haber_aciklamasi"] . "</p>";
                        echo "<h3>Yorumlar:</h3>";

                        $comment_sql = "SELECT * FROM yorumlar WHERE haber_id=$id ORDER BY tarih DESC";
                        $comment_result = $conn->query($comment_sql);

                        if ($comment_result->num_rows > 0) {
                            while ($comment_row = $comment_result->fetch_assoc()) {
                                $formatted_date = date("d M Y, H:i", strtotime($comment_row["tarih"]));
                                echo "<div class='comment'>";
                                echo "<p><strong>" . $comment_row["kullanici_adi"] . " <span class='comment-date'>(" . $formatted_date . ")</span>:</strong> " . $comment_row["yorum"] . "</p>";
                                echo "</div>";
                            }
                        } else {
                            echo "Henüz yorum yok.";
                        }


                        echo "<h3>Yorum Yap:</h3>";
                        echo "<form action='yorum_ekle.php' method='post'>";
                        echo "<input type='hidden' name='haber_id' value='" . $id . "'>";
                        echo "<label for='kullanici_adi'>Adınız:</label><br>";
                        echo "<input type='text' id='kullanici_adi' name='kullanici_adi' required><br>";
                        echo "<label for='yorum'>Yorumunuz:</label><br>";
                        echo "<textarea id='yorum' name='yorum' required></textarea><br><br>";
                        echo "<input type='submit' value='Yorum Yap'>";
                        echo "</form>";
                    }
                } else {
                    echo "Haber bulunamadı.";
                }
            } else {
                echo "Geçersiz haber ID'si.";
            }

            $conn->close();
            ?>
        </div>
        <div class="sidebar">
            <h2>Son Dakika</h2>
            <?php
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Bağlantı hatası: " . $conn->connect_error);
            }

            $sql = "SELECT id, resim_url FROM haberler ORDER BY id DESC LIMIT 3";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<a href='haber.php?id=" . $row["id"] . "' class='sidebar-img-link'><img src='" . $row["resim_url"] . "' class='sidebar-img'></a>";
                }
            } else {
                echo "Son dakika haber bulunamadı.";
            }

            $conn->close();
            ?>
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
