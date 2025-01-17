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
    $haber_basligi = $_POST["haber_basligi"];
    $resim_url = $_POST["resim_url"];
    $haber_aciklamasi = $_POST["haber_aciklamasi"];

    $sql = "INSERT INTO haberler (haber_basligi, resim_url, haber_aciklamasi, tarih) VALUES ('$haber_basligi', '$resim_url', '$haber_aciklamasi', NOW())";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        header("Location: haber.php?id=$last_id");
        exit;
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
