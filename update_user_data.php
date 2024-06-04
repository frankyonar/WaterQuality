<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_COOKIE['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Utente non autenticato']);
        exit;
    }

    $user_id = $_COOKIE['user_id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica se l'email esiste già per un altro utente
    $sql = "SELECT ID_Utente FROM utente WHERE Email = :email AND ID_Utente != :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email già in uso']);
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "UPDATE utente SET Nome = :nome, Email = :email, Password = :password WHERE ID_Utente = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':user_id', $user_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Dati aggiornati con successo']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Errore durante l\'aggiornamento dei dati']);
    }
}
?>
