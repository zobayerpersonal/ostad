<?php
namespace App\Classes;

class VehicleManager extends VehicleBase implements VehicleActions {
    use FileHandler;

    public function __construct() {}

    public function addVehicle($data) {
        $vehicles = $this->readFile();
        $data["id"] = uniqid(); // Unique identifier for each vehicle
        $vehicles[] = $data;
        $this->writeFile($vehicles);
    }

    public function editVehicle($id, $data) {
        $vehicles = $this->readFile();
        foreach ($vehicles as &$vehicle) {
            if ($vehicle['id'] === $id) {
                $vehicle = array_merge($vehicle, $data);
                break;
            }
        }
        $this->writeFile($vehicles);
    }

    public function deleteVehicle($id) {
        $vehicles = $this->readFile();
        $vehicles = array_filter($vehicles, fn($vehicle) => $vehicle['id'] !== $id);
        $this->writeFile(array_values($vehicles));
    }

    public function getVehicles() {
        return $this->readFile();
    }

    public function getDetails() {
        return "{$this->name} ({$this->type}) - $ {$this->price}";
    }
}