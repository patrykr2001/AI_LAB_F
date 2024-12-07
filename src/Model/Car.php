<?php
namespace App\Model;

use App\Service\Config;

class Car
{
    private ?int $id = null;
    private ?string $make = null;
    private ?string $model = null;
    private ?int $year = null;
    private ?float $price = null;
    private ?float $engine_capacity = null;
    private ?string $fuel_type = null;
    private ?int $horsepower = null;
    private ?int $mileage = null;
    private ?string $transmission = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Car
    {
        $this->id = $id;

        return $this;
    }

    public function getMake(): ?string
    {
        return $this->make;
    }

    public function setMake(?string $make): Car
    {
        $this->make = $make;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): Car
    {
        $this->model = $model;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): Car
    {
        $this->year = $year;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): Car
    {
        $this->price = $price;

        return $this;
    }

    public function getEngineCapacity(): ?float
    {
        return $this->engine_capacity;
    }

    public function setEngineCapacity(?float $engine_capacity): Car
    {
        $this->engine_capacity = $engine_capacity;

        return $this;
    }

    public function getFuelType(): ?string
    {
        return $this->fuel_type;
    }

    public function setFuelType(?string $fuel_type): Car
    {
        $this->fuel_type = $fuel_type;

        return $this;
    }

    public function getHorsepower(): ?int
    {
        return $this->horsepower;
    }

    public function setHorsepower(?int $horsepower): Car
    {
        $this->horsepower = $horsepower;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(?int $mileage): Car
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    public function setTransmission(?string $transmission): Car
    {
        $this->transmission = $transmission;

        return $this;
    }

    public static function fromArray($array): Car
    {
        $car = new self();
        $car->fill($array);

        return $car;
    }

    public function fill($array): Car
    {
        if (isset($array['id']) && ! $this->getId()) {
            $this->setId($array['id']);
        }
        if (isset($array['make'])) {
            $this->setMake($array['make']);
        }
        if (isset($array['model'])) {
            $this->setModel($array['model']);
        }
        if (isset($array['year'])) {
            $this->setYear($array['year']);
        }
        if (isset($array['price'])) {
            $this->setFuelType($array['fuel_type']);
        }
        if (isset($array['horsepower'])) {
            $this->setHorsepower($array['horsepower']);
        }
        if (isset($array['mileage'])) {
            $this->setPrice($array['price']);
        }
        if (isset($array['engine_capacity'])) {
            $this->setEngineCapacity($array['engine_capacity']);
        }
        if (isset($array['fuel_type'])) {
            $this->setMileage($array['mileage']);
        }
        if (isset($array['transmission'])) {
            $this->setTransmission($array['transmission']);
        }

        return $this;
    }

    public static function findAll(): array
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM car';
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $cars = [];
        $carsArray = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($carsArray as $carArray) {
            $cars[] = self::fromArray($carArray);
        }

        return $cars;
    }

    public static function find($id): ?Car
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM car WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        $carArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (! $carArray) {
            return null;
        }
        $car = Car::fromArray($carArray);

        return $car;
    }

    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if (! $this->getId()) {
            $sql = "INSERT INTO car (make, model, year, price, engine_capacity, fuel_type, horsepower, mileage, transmission) VALUES (:make, :model, :year, :price, :engine_capacity, :fuel_type, :horsepower, :mileage, :transmission)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'make' => $this->getMake(),
                'model' => $this->getModel(),
                'year' => $this->getYear(),
                'price' => $this->getPrice(),
                'engine_capacity' => $this->getEngineCapacity(),
                'fuel_type' => $this->getFuelType(),
                'horsepower' => $this->getHorsepower(),
                'mileage' => $this->getMileage(),
                'transmission' => $this->getTransmission(),
            ]);

            $this->setId($pdo->lastInsertId());
        } else {
            $sql = "UPDATE car SET make = :make, model = :model, year = :year, price = :price, engine_capacity = :engine_capacity, fuel_type = :fuel_type, horsepower = :horsepower, mileage = :mileage, transmission = :transmission WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':make' => $this->getMake(),
                ':model' => $this->getModel(),
                ':year' => $this->getYear(),
                ':price' => $this->getPrice(),
                ':engine_capacity' => $this->getEngineCapacity(),
                ':fuel_type' => $this->getFuelType(),
                ':horsepower' => $this->getHorsepower(),
                ':mileage' => $this->getMileage(),
                ':transmission' => $this->getTransmission(),
                ':id' => $this->getId(),
            ]);
        }
    }

    public function delete(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM car WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':id' => $this->getId(),
        ]);

        $this->setId(null);
        $this->setMake(null);
        $this->setModel(null);
        $this->setYear(null);
        $this->setPrice(null);
        $this->setEngineCapacity(null);
        $this->setFuelType(null);
        $this->setHorsepower(null);
        $this->setMileage(null);
        $this->setTransmission(null);
    }
}