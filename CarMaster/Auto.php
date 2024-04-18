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

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        if (empty($brand)) {
            throw new AutoValidationException('Brand is empty.');
        }
        $this->brand = $brand;
    }
    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getBodyType(): string
    {
        return $this->bodyType;
    }

    /**
     * @param string $bodyType
     */
    public function setBodyType(string $bodyType): void
    {
        $this->bodyType = $bodyType;
    }

    /**
     * @return string
     */
    public function getYearOfIssue(): int
    {
        return $this->yearOfIssue;
    }

    /**
     * @param int $yearOfIssue
     */
    public function setYearOfIssue(int $yearOfIssue): void
    {
        $this->yearOfIssue = $yearOfIssue;
    }

    /**
     * @return float
     */
    public function getEngineCapacity(): float
    {
        return $this->engineCapacity;
    }

    /**
     * @param float $engineCapacity
     */
    public function setEngineCapacity(float $engineCapacity): void
    {
        $this->engineCapacity = $engineCapacity;
    }
    /**
     * @return string
     */
    public function getWinNumber(): string
    {
        return $this->winNumber;
    }

    /**
     * @param string $winNumber
     */
    public function setWinNumber(string $winNumber): void
    {
        $this->winNumber = $winNumber;
        $orderNumberLength = strlen((string)$this->winNumber);
        if ($orderNumberLength !== self::WIN_NUMBER_LENGTH) {
            throw new AutoValidationException('The win number must be ' . self::WIN_NUMBER_LENGTH . ' characters long.');
        }
    }

    /**
     * @return string
     */
    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    /**
     * @param string $registrationNumber
     */
    public function setRegistrationNumber(string $registrationNumber): void
    {
        $this->registrationNumber = $registrationNumber;
    }

    /**
     * @return int
     */
    public function getCarMileage(): string
    {
        return $this->carMileage . ' km';
    }

    /**
     * @param int $carMileage
     */
    public function setCarMileage(int $carMileage): void
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
            'Mileage' => $this->getCarMileage(),
        ];
    }

}
