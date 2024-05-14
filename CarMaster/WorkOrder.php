<?php
declare(strict_types=1);

namespace CarMaster;

use CarMaster\Exceptions\WorkOrderValidationException;

class WorkOrder
{
    public const STANDARD_HOUR_PRICE = 600;
    public const ORDER_NUMBER_LENGTH = 10;
    private int $workOrderNumber;
    private array $serviceCodes;
    private array $completedWorks;
    private array $numbersOfStandardHours;
    private string $gaveAwayTheCar = 'Petrov V.P.';
    private Client $receivedTheCar;
    private Auto $auto;
    private CarOwner $carOwner;
    private SpareParts $spareParts;

    public function setNumber(int $workOrderNumber): void
    {
        $this->workOrderNumber = $workOrderNumber;
        $orderNumberLength = strlen((string)$this->workOrderNumber);
        if ($orderNumberLength !== self::ORDER_NUMBER_LENGTH) {
            throw new WorkOrderValidationException('The work order number must be 10 digits.');
        }
    }

    public function getNumber(): int
    {
        return $this->workOrderNumber;
    }

    public function getDate(): string
    {
        return date("Y-m-d H:i:s");
    }

    public function setServiceCodes(array $serviceCodes): void
    {
        $this->serviceCodes = $serviceCodes;
    }

    public function getServiceCodes(): array
    {
        return $this->serviceCodes;
    }

    public function setCompletedWorks(array $completedWorks): void
    {
        $this->completedWorks = $completedWorks;
    }

    public function getCompletedWorks(): array
    {
        return $this->completedWorks;
    }

    public function setNumbersOfStandardHours(array $numbersOfStandardHours): void
    {
        $this->numbersOfStandardHours = $numbersOfStandardHours;
    }

    public function getNumbersOfStandardHours(): array
    {
        return $this->numbersOfStandardHours;
    }

    public function setGaveAwayTheCar(string $gaveAwayTheCar): void
    {
        $this->gaveAwayTheCar = $gaveAwayTheCar;
    }

    public function getGaveAwayTheCar(): string
    {
        return $this->gaveAwayTheCar;
    }

    public function setReceivedTheCar(Client $receivedTheCar): void
    {
        $this->receivedTheCar = $receivedTheCar;
    }

    public function getReceivedTheCar(): Client
    {
        return $this->receivedTheCar;
    }

    public function setAuto(Auto $auto): void
    {
        $this->auto = $auto;
    }

    public function getAuto(): Auto
    {
        return $this->auto;
    }

    public function getCarOwner():CarOwner
    {
        return $this->carOwner;
    }

    public function setCarOwner(CarOwner $carOwner):void
    {
        $this->carOwner = $carOwner;
    }

    public function setSpareParts(SpareParts $spareParts): void
    {
        $this->spareParts = $spareParts;
    }

    public function getSpareParts(): SpareParts
    {
        return $this->spareParts;
    }

    private function getTotalPrice(): float|int
    {
        $standardHoursPricesArray = array_map(function ($standardHour){return $standardHour * self::STANDARD_HOUR_PRICE;}, $this->getNumbersOfStandardHours());
        $standardHourPrice = array_sum($standardHoursPricesArray);
        return $standardHourPrice + $this->getSpareParts()->getTotalPrice();
    }

    public function getWorkOrder(): array
    {
        return [
            'Work order number' => $this->getNumber(),
            'Date' => $this->getDate(),
            'Auto' => $this->getAuto()->getFullInfo(),
            'Service codes' => implode(', ', $this->getServiceCodes()),
            'Spare parts: ' => $this->getSpareParts()->getFullInfo(),
            'Completed works' => implode(', ', $this->getCompletedWorks()),
            'Numbers of standard hours' => implode(', ', $this->getNumbersOfStandardHours()),
            'Total price' => $this->getTotalPrice(),
            'Gave away the car' => $this->getGaveAwayTheCar(),
            'Received the car:' => implode(' ', $this->getReceivedTheCar()->getFullInfo())
        ];
    }

    public function getFullInfo(): array
    {
        return ['Work order: ' => $this->getWorkOrder()];
    }

}