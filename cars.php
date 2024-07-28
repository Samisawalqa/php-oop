<?php
class Car {
    private $make;
    private $model;
    private $vin;

    public function __construct($make, $model, $vin) {
        $this->make = $make;
        $this->model = $model;
        $this->vin = $vin;
        echo "Car created: " . $this->getDetails() . "\n";
    }

    public function __destruct() {
        echo "Car destroyed: " . $this->getDetails() . "\n";
    }

    public function getMake() {
        return $this->make;
    }

    public function setMake($make) {
        $this->make = $make;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getVin() {
        return $this->vin;
    }

    public function setVin($vin) {
        $this->vin = $vin;
    }

    public function getDetails() {
        return "Make: {$this->make}, Model: {$this->model}, VIN: {$this->vin}";
    }
}


class Inventory {
    private $cars = [];

    public function addCar(Car $car) {
        $this->cars[$car->getVin()] = $car;
    }

    public function removeCar($vin) {
        if (isset($this->cars[$vin])) {
            unset($this->cars[$vin]);
        }
    }

    public function listCars() {
        $details = [];
        foreach ($this->cars as $car) {
            $details[] = $car->getDetails();
        }
        return $details;
    }
}


$car1 = new Car('Toyota', 'Camry', '1HGCM82633A123456');
$car2 = new Car('Honda', 'Accord', '2HGCM82633A123456');
$car3 = new Car('Ford', 'Mustang', '3HGCM82633A123456');

$inventory = new Inventory();

$inventory->addCar($car1);
$inventory->addCar($car2);
$inventory->addCar($car3);

$carsList = $inventory->listCars();
foreach ($carsList as $carDetails) {
    echo $carDetails . "\n";
}

$inventory->removeCar('2HGCM82633A123456');

$carsList = $inventory->listCars();
foreach ($carsList as $carDetails) {
    echo $carDetails . "\n";
}

?>
