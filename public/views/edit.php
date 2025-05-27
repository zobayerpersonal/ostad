<?php
require_once "../app/Classes/VehicleManager.php";
use App\Classes\VehicleManager;

$vehicleManager = new VehicleManager();
$vehicles = $vehicleManager->getVehicles();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vehicleManager->editVehicle($_POST["id"], $_POST);
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Vehicle</title>
</head>
<body>
    <h2>Edit Vehicle</h2>
    <form method="POST">
        <label>Vehicle ID:</label> <input type="text" name="id" required><br>
        <label>Name:</label> <input type="text" name="name"><br>
        <label>Type:</label> <input type="text" name="type"><br>
        <label>Price:</label> <input type="number" name="price"><br>
        <label>Image URL:</label> <input type="text" name="image"><br>
        <input type="submit" value="Edit">
    </form>
</body>
</html>