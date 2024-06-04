<?php
session_start();

// Verifica dell'esistenza dei cookie
if (!isset($_COOKIE['user_id']) || $_COOKIE['user_role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Imposta le variabili di sessione dai cookie
$_SESSION['user_id'] = $_COOKIE['user_id'];
$_SESSION['user_role'] = $_COOKIE['user_role'];
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en" data-bss-forced-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Admin</title>
    <link rel="icon" type="image/png" sizes="500x500" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Raleway.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
<div id="wrapper">
    <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
        <!-- Contenuto del menu laterale -->
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                <div class="container-fluid">
                    <!-- Altri contenuti della barra superiore -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">
                <!-- Contenuto della dashboard -->
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Dashboard Admin</h3>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase fw-bold text-primary text-xs mb-1"><span>Utenti&nbsp;</span></div>
                                        <div class="fw-bold text-dark h5 mb-0"><span id="A1">0</span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-user fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase fw-bold text-success text-xs mb-1"><span>Segnalazioni</span></div>
                                        <div class="fw-bold text-dark h5 mb-0"><span id="A2">0</span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-pen-square fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase fw-bold text-info text-xs mb-1"><span>pH</span></div>
                                        <div class="row g-0 align-items-center">
                                            <div class="col-auto">
                                                <div class="fw-bold text-dark h5 mb-0 me-3"><span id="A3">0</span></div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm" id="A4">
                                                    <div class="progress-bar bg-info" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;"><span class="visually-hidden">0%</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-seedling fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-start-warning py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <div class="text-uppercase fw-bold text-warning text-xs mb-1"><span>Sensori</span></div>
                                        <div class="fw-bold text-dark h5 mb-0"><span id="A5">0</span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-rss fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tabella delle segnalazioni -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 fw-bold text-primary">Segnalazioni</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="segnalazioniTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Posizione</th>
                                            <th>Descrizione</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- Le righe verranno inserite qui da JavaScript -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Aggiungi altri contenuti della dashboard qui -->
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Water Quality 2024</span></div>
            </div>
        </footer>
    </div><a class="d-inline border rounded scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/startup-modern.js"></script>
<script>
    fetch('fetch_data.php?role=user')
        .then(response => response.json())
        .then(data => {
            document.getElementById('A1').innerText = data.users;
            document.getElementById('A2').innerText = data.reports;
            document.getElementById('A5').innerText = data.sensors;
            document.getElementById('A3').innerText = data.last_ph;
            document.querySelector('#A4 .progress-bar').style.width = `${data.last_ph}%`;
        })
        .catch(error => console.error('Error fetching data:', error));

    fetch('fetch_segnalazioni.php')
        .then(response => response.json())
        .then(data => {
            // Popolare la tabella delle segnalazioni
            const segnalazioniTable = document.querySelector('#segnalazioniTable tbody');
            segnalazioniTable.innerHTML = ''; // Clear existing rows
            if (data.segnalazioni) {
                data.segnalazioni.forEach(segnalazione => {
                    const row = document.createElement('tr');
                    const posizioneCell = document.createElement('td');
                    const descrizioneCell = document.createElement('td');
                    posizioneCell.textContent = segnalazione.Posizione;
                    descrizioneCell.textContent = segnalazione.Descrizione;
                    row.appendChild(posizioneCell);
                    row.appendChild(descrizioneCell);
                    segnalazioniTable.appendChild(row);
                });
            }
        })
        .catch(error => console.error('Error fetching segnalazioni:', error));
</script>
</body>

</html>
