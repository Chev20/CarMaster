<?php
declare(strict_types=1);

namespace CarMaster;

use CarMaster\Exceptions\WorkOrderValidationException;

class WorkOrder
{
    public const STANDARD_HOUR_PRICE = 600;
    public const ORDER_NUMBER_LENGTH = 10;
    private int $workOrderNumber;
    private int $serviceCode;
    private string $completedWork;
    private int $numberOfStandardHours;
    private string $gaveAwayTheCar = 'Petrov V.P.';
    private Client $receivedTheCar;
    private Auto $auto;
    private CarOwner $carOwner;
    private SpareParts $spareParts;

    public function setWorkOrderNumber(int $workOrderNumber): void
    {
        $this->workOrderNumber = $workOrderNumber;
        $orderNumberLength = strlen((string)$this->workOrderNumber);
        if ($orderNumberLength !== self::ORDER_NUMBER_LENGTH) {
            throw new WorkOrderValidationException('The work order number must be 10 digits.');
        }
    }

    public function getWorkOrderNumber(): int
    {
        return $this->workOrderNumber;
    }

    public function getDate(): string
    {
        return date("Y-m-d H:i:s");
    }

    public function setServiceCode(int $serviceCode): void
    {
        $this->serviceCode = $serviceCode;
    }

    public function getServiceCode(): int
    {
        return $this->serviceCode;
    }

    public function setCompletedWork(string $completedWork): void
    {
        $this->completedWork = $completedWork;
    }

    public function getCompletedWork(): string
    {
        return $this->completedWork;
    }

    public function setNumberOfStandardHours(int $numberOfStandardHours): void
    {
        $this->numberOfStandardHours = $numberOfStandardHours;
    }

    public function getNumberOfStandardHours(): int
    {
        return $this->numberOfStandardHours;
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

    private function getTotalPrice(): float
    {
        return self::STANDARD_HOUR_PRICE * $this->getNumberOfStandardHours() + $this->getSpareParts()->getMaterialsTotalPrice();
    }

    public function getWorkOrder(): array
    {
        return [
            'Work order number' => $this->getWorkOrderNumber(),
            'Date' => $this->getDate(),
            'Service code' => $this->getServiceCode(),
            'Completed work' => $this->getCompletedWork(),
            'Number of standard hours' => $this->getNumberOfStandardHours(),
            'Total price' => $this->getTotalPrice(),
            'Gave away the car' => $this->getGaveAwayTheCar(),
        ];
    }

    public function getFullInfo(): array
    {
        return array_merge(['Auto: ' => $this->getAuto()->getFullInfo(),
            'Car owner: ' => $this->getCarOwner()->getFullInfo(),
            'Spare parts: ' => $this->getSpareParts()->getFullInfo(),
            'Work order: ' => $this->getWorkOrder(),
            'Received the car:' => $this->getReceivedTheCar()->getFullInfo()]);
    }
}