<html lang="tr">
<head>
    <title>user_saving_form</title>
</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";

<form action="?islem=yaz" method="post">
    isim-soyisim:<br>
    <input type="text" name="isim" required><br>
    email:<br>
    <input type="email" name="email" required><br>
    cinsiyet:<br>
    <input type="radio" name="cinsiyet" value="Erkek" required> Erkek <input type="radio" name="cinsiyet" value="Kadim" > Kadin <br><br>
    <input type="submit">
</form>

try {
    $conn = new PDO("mysql:host=$servername;dbname=usernamesavemethod", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<?php
if ($_REQUEST["islem"]=="yaz" and $_SERVER["REQUEST_METHOD"]=="POST"){

    $isim = $_REQUEST['isim'];
    $email = $_REQUEST['email'];
    $cinsiyet = $_REQUEST['cinsiyet'];
    $sql="INSERT INTO ogrenciler (isim,email,cinsiyet) VALUES ('$isim', '$email', '$cinsiyet')";
    $conn->exec($sql);
}
?>
</body>
</html>