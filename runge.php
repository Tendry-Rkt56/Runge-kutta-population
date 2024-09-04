<?php



// Fonction pour modéliser la croissance de la population
function populationGrowth($P, $r, $K) {
    return $r * $P * (1 - $P / $K);
}

// Fonction de l'algorithme de Runge-Kutta
function rungeKutta($P0, $r, $K, $h, $t_max) {
    $t = 0;
    $P = $P0;
    $results = [];

    while ($t < $t_max) {
        // Calcul des coefficients k1, k2, k3 et k4
        $k1 = populationGrowth($P, $r, $K);
        $k2 = populationGrowth($P + $h / 2 * $k1, $r, $K);
        $k3 = populationGrowth($P + $h / 2 * $k2, $r, $K);
        $k4 = populationGrowth($P + $h * $k3, $r, $K);

        // Mise à jour de la population
        $P = $P + $h / 6 * ($k1 + 2 * $k2 + 2 * $k3 + $k4);
        
        // Enregistrer les résultats (temps, population)
        $results[] = ['t' => $t, 'P' => $P];

        // Incrémenter le temps
        $t += $h;
    }

    return $results;
}

// Paramètres de simulation
$P0 = 10;    // Population initiale
$r = 0.1;    // Taux de reproduction
$K = 100;    // Capacité de charge
$h = 1;    // Pas de temps
$t_max = 50; // Temps maximum

// $results = rungeKutta(1000, 0.1, 1000, 1, 10);
// foreach($results as $result) {
//     echo "Temps: " .$result['t'] .'|' .' populations: ' .$result['P'] ."\n";
// }
// die();

// Simulation

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $taux = $_POST['taux'];
    $charge = $_POST['charge'];
    $temps = $_POST['temps'];
    $duree = $_POST['duree'];

    
    $results = rungeKutta($nombre, $taux, $charge, $temps, $duree);
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulation de population</title>
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <h1 class="m-5">Simulation de population</h1>
    <div class="container-fluid containers-result d-flex align-items-center justify-content-center flex-row gap-4">
        <div class="box-container d-flex align-items-center justify-content-center flex-column gap-2">
            <!--<div class="align-self-start justify-self-start box m-0">
                <h3>Résultats pour : </h3>
                <ul>
                    <li></li>
                    <li>Taux de reproduction: <span class="fw-bolder"><?=$taux?></span></li>
                    <li>Capacité de charge: <span class="fw-bolder"><?=$charge?></span></li>
                    <li>Pas de temps: <span class="fw-bolder"><?=$temps?></span></li>
                    <li>Durée: <span class="fw-bolder"><?=$duree?></span></li>
                </ul>
            </div>-->
            <div class="card">
                <h4>Nombre de population: </h4>
                <span class="fw-bolder"><?=$nombre?></span>
            </div>
            <div class="card">
                <h4>Taux de reproduction: </h4>
                <span class="fw-bolder"><?=$taux?></span>
            </div>
            <div class="card">
                <h4>Capacité de charge : </h4>
                <span class="fw-bolder"><?=$charge?></span>
            </div>
            <div class="card">
                <h4>Pas de temps (année): </h4>
                <span class="fw-bolder"><?=$temps?></span>
            </div>
            <div class="card">
                <h4>Durée de l'analyse: </h4>
                <span class="fw-bolder"><?=$duree?></span>
            </div>
            
        </div>
        
        <div style="width:70%; height:80vh; overflow-y:scroll">
            <table class="container table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Année</th>
                        <th style="width: 300px;">Population</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($results as $result): ?>
                        <tr>
                            <td><?=$result['t']?></td>
                            <td class="fw-bolder"><?=$result['P']?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>