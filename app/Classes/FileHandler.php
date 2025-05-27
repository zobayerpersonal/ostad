<?php
namespace App\Classes;

trait FileHandler {
    private $file = __DIR__ . "/../../data/vehicles.json";

    public function readFile() {
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([])); 
        }
        return json_decode(file_get_contents($this->file), true);
    }

    public function writeFile($data) {
        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT));
    }
}