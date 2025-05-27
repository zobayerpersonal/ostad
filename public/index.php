<?php
require_once "../app/Classes/VehicleManager.php";
use App\Classes\VehicleManager;

$vehicleManager = new VehicleManager();
$vehicles = $vehicleManager->getVehicles();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vehicle Listing</title>
</head>
<body>
    <h2>Available Vehicles</h2>
    <ul>
        <?php foreach ($vehicles as $vehicle): ?>
            <li><?= "{$vehicle['name']} - {$vehicle['type']} - $ {$vehicle['price']}" ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>