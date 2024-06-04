<?php
require 'config.php';

function getCount($table) {
    global $conn;
    $sql = "SELECT COUNT(*) as count FROM $table";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
}



function getLastPHValue() {
    global $conn;
    $sql = "SELECT Valore_pH FROM dati_sensore ORDER BY Timestamp DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['Valore_pH'];
}

$response = [
    'users' => getCount('utente'),
    'reports' => getCount('segnalazione'),
    'sensors' => getCount('sensore'),
    'last_ph' => getLastPHValue()
];

if (isset($_GET['role']) && $_GET['role'] === 'admin') {
    $response['segnalazioni'] = getSegnalazioni();
}

echo json_encode($response);
?>
