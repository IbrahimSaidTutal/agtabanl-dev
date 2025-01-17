<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Haber Sitesi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <h1><a href="index.php" id="home-link">HaberSitesi(22290991)</a></h1>
        <div class="header-buttons">
            <a href="#" class="button">Giriş Yap</a>
            <a href="admin_panel.php" class="button admin" target="_blank">Admin Paneli</a>
        </div>
    </header>

    <div class="content-section">
        <div class="sort-section">
            <button class="sort-btn" onclick="toggleSort()">
                <span>Tarihe Göre Sırala</span>
                <i class="sort-icon">↓</i>
            </button>
        </div>

        <div class="currency-widget" id="currencyWidget">
            <h4>Döviz:</h4>
            <div id="rates">Yükleniyor...</div>
            <small class="update-time"></small>
        </div>
    </div>

    <nav>
        <ul>
            <li><a href="index.php">Ana Sayfa</a></li>
            <li><a href="#">Politika</a></li>
            <li><a href="#">Ekonomi</a></li>
            <li><a href="#">Spor</a></li>
            <li><a href="#">İletişim</a></li>
        </ul>
    </nav>

    <div class="breaking-news-slider">
        <h2 class="slider-title">Son Dakika</h2>
        <div class="static-news">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "news";
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

<div class="haberler-cs">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "news";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM haberler ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='news-item'>";
            echo "<img src='" . $row["resim_url"] . "' alt='Haber Resmi'>";
            echo "<h2>" . $row["haber_basligi"] . "</h2>";
            echo "<a href='haber.php?id=" . $row["id"] . "' class='read-more-btn'>Devamını Oku</a>";
            echo "</div>";
        }
    } else {
        echo "Gösterilecek haber yok.";
    }

    $conn->close();
    ?>
</div>


    <div class="footer">
        <div class="social-links">
            <a href="http://facebook.com/habersitesi123" target="_blank" class="social-link">📱 Facebook</a>
            <a href="https://twitter.com/habersitesi123" target="_blank" class="social-link">🐦 Twitter</a>
            <a href="https://instagram.com/habersitesi123" target="_blank" class="social-link">📸 Instagram</a>
        </div>
        <div class="legal-links">
            <a href="about.html" class="footer-link">Hakkında</a>
            <a href="privacy.html" class="footer-link">Gizlilik Politikası</a>
            <a href="terms.html" class="footer-link">Kullanım Şartları</a>
            <a href="contact.html" class="footer-link">İletişim</a>
        </div>
    </div>
    <script>
		async function getCurrencyRates() {
			try {
				const response = await fetch('https://api.exchangerate-api.com/v4/latest/TRY');
				const data = await response.json();

				const currencies = {
					USD: (1 / data.rates.USD).toFixed(2),
					EUR: (1 / data.rates.EUR).toFixed(2),
					GBP: (1 / data.rates.GBP).toFixed(2)
				};

				document.getElementById('rates').innerHTML = Object.entries(currencies)
					.map(([currency, rate]) => `
						<div class="currency-rate">
							<span class="currency">${currency}</span>
							<span class="rate">${rate} ₺</span>
						</div>
					`).join('');

				document.querySelector('.update-time').textContent =
					`Son güncelleme: ${new Date().toLocaleTimeString()}`;
			} catch (error) {
				document.getElementById('rates').innerHTML = 'Döviz kurları yüklenemedi';
			}
		}

		getCurrencyRates();
		setInterval(getCurrencyRates, 300000);
        
        let sortOrder = 'desc';

        function toggleSort() {
            const newsContainer = document.querySelector('.haberler-cs');
            const newsItems = Array.from(newsContainer.querySelectorAll('.news-item'));
            
            newsItems.sort((a, b) => {
                const aId = parseInt(a.querySelector('a').getAttribute('href').split('=')[1]);
                const bId = parseInt(b.querySelector('a').getAttribute('href').split('=')[1]);
                return sortOrder === 'desc' ? aId - bId : bId - aId;
            });

            newsItems.forEach(item => newsContainer.appendChild(item));

            sortOrder = sortOrder === 'desc' ? 'asc' : 'desc';
            document.querySelector('.sort-icon').textContent = sortOrder === 'desc' ? '↓' : '↑';
        }
        
        </script>
</body>

</html>
