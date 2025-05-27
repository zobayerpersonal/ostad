<?php
require_once "../app/Classes/VehicleManager.php";
use App\Classes\VehicleManager;

$vehicleManager = new VehicleManager();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vehicleManager->addVehicle($_POST);
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Vehicle</title>
</head>
<body>
    <h2>Add a New Vehicle</h2>
    <form method="POST">
        <label>Name:</label> <input type="text" name="name" required><br>
        <label>Type:</label> <input type="text" name="type" required><br>
        <label>Price:</label> <input type="number" name="price" required><br>
        <label>Image URL:</label> <input type="text" name="image"><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>