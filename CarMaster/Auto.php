<?php
declare(strict_types=1);

namespace CarMaster;

use CarMaster\Exceptions\AutoValidationException;

class Auto
{
    const WIN_NUMBER_LENGTH = 17;

    private string $brand;
    private string $model;
    private string $bodyType;
    private int $yearOfIssue;
    private float $engineCapacity;
    private string $winNumber;
    private string $registrationNumber;
    private int $carMileage;

    public function setBrand(string $brand): void
    {
        if (empty($brand)) {
            throw new AutoValidationException('Brand is empty.');
        }
        $this->brand = $brand;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getBodyType(): string
    {
        return $this->bodyType;
    }

    public function setBodyType(string $bodyType): void
    {
        $this->bodyType = $bodyType;
    }

    public function getYearOfIssue(): int
    {
        return $this->yearOfIssue;
    }

    public function setYearOfIssue(int $yearOfIssue): void
    {
        $this->yearOfIssue = $yearOfIssue;
    }

    public function getEngineCapacity(): float
    {
        return $this->engineCapacity;
    }

    public function setEngineCapacity(float $engineCapacity): void
    {
        $this->engineCapacity = $engineCapacity;
    }

    public function getWinNumber(): string
    {
        return $this->winNumber;
    }

    public function setWinNumber(string $winNumber): void
    {
        $this->winNumber = $winNumber;
        $orderNumberLength = strlen($this->winNumber);
        if ($orderNumberLength !== self::WIN_NUMBER_LENGTH) {
            throw new AutoValidationException('The win number must be ' . self::WIN_NUMBER_LENGTH . ' characters long.');
        }
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(string $registrationNumber): void
    {
        $this->registrationNumber = $registrationNumber;
    }

    public function getMileage(): string
    {
        return $this->carMileage . ' km';
    }

    public function setMileage(int $carMileage): void
    {
        $this->carMileage = $carMileage;
    }

    public function getFullInfo(): array
    {
        return [
            'Brand' => $this->getBrand(),
            'Model' => $this->getModel(),
            'Body type' => $this->getBodyType(),
            'Year of issue' => $this->getYearOfIssue(),
            'Engine capacity' => $this->getEngineCapacity(),
            'Registration number' => $this->getRegistrationNumber(),
            'Win number' => $this->getWinNumber(),
            'Mileage' => $this->getMileage(),
        ];
    }
}


