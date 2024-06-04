<?php
$servername = "localhost";
$username = "u392841493_root";
$password = "@;N:^AtLf7";
$dbname = "u392841493_waterquality";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
