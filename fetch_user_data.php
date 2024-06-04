<?php
session_start();
require 'config.php';

if (!isset($_COOKIE['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_COOKIE['user_id'];

$sql = "SELECT Nome, Email FROM utente WHERE ID_Utente = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    echo json_encode($user);
} else {
    echo json_encode(['Nome' => '', 'Email' => '']); // Se l'utente non esiste, ritorna valori vuoti
}
?>
