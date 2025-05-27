<?php
require_once "../app/Classes/VehicleManager.php";
use App\Classes\VehicleManager;

$vehicleManager = new VehicleManager();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vehicleManager->deleteVehicle($_POST["id"]);
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Vehicle</title>
</head>
<body>
    <h2>Delete Vehicle</h2>
    <form method="POST">
        <label>Vehicle ID:</label> <input type="text" name="id" required><br>
        <input type="submit" value="Delete">
    </form>
</body>
</html>