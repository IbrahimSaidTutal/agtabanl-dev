<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "news";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Baðlantý hatasý: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $haber_id = intval($_POST["haber_id"]);
    $kullanici_adi = $_POST["kullanici_adi"];
    $yorum = $_POST["yorum"];

    $sql = "INSERT INTO yorumlar (haber_id, kullanici_adi, yorum, tarih) VALUES ($haber_id, '$kullanici_adi', '$yorum', NOW())";

    if ($conn->query($sql) === TRUE) {
        header("Location: haber.php?id=$haber_id");
        exit;
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
