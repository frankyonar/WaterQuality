<?php
require 'config.php';

function getSegnalazioni() {
    global $conn;
    $sql = "SELECT Posizione, Descrizione FROM segnalazione ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$response = [
    'segnalazioni' => getSegnalazioni()
];

echo json_encode($response);
?>

