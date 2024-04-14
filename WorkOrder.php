<?php
require_once 'Auto.php';
class WorkOrder
{
    public const STANDARD_HOUR_PRICE = 600;
    public const ORDER_NUMBER_LENGTH = 10;
    private int $workOrderNumber;
    private int $serviceCode;
    private string $completedWork;
    private int $numberOfStandardHours;
    private string $gaveAwayTheCar = 'Petrov V.P.';
    private string $receivedTheCar;
    private Auto $auto;
    private CarOwner $carOwner;
    private SpareParts $spareParts;

    /**
     * @param int $workOrderNumber
     * @throws Exception
     */
    public function setWorkOrderNumber(int $workOrderNumber): void
    {
        $this->workOrderNumber = $workOrderNumber;
        $orderNumberLength = strlen((string)$this->workOrderNumber);
        if ($orderNumberLength !== self::ORDER_NUMBER_LENGTH) {
            throw new Exception('The work order number must be 10 digits.');
        }
    }

    /**
     * @return int
     */
    public function getWorkOrderNumber(): int
    {
        return $this->workOrderNumber;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return date("Y-m-d H:i:s");
    }

    /**
     * @param int $serviceCode
     */
    public function setServiceCode(int $serviceCode): void
    {
        $this->serviceCode = $serviceCode;
    }

    /**
     * @return int
     */
    public function getServiceCode(): int
    {
        return $this->serviceCode;
    }

    /**
     * @param string $completedWork
     */
    public function setCompletedWork(string $completedWork): void
    {
        $this->completedWork = $completedWork;
    }

    /**
     * @return string
     */
    public function getCompletedWork(): string
    {
        return $this->completedWork;
    }

    /**
     * @param int $numberOfStandardHours
     */
    public function setNumberOfStandardHours(int $numberOfStandardHours): void
    {
        $this->numberOfStandardHours = $numberOfStandardHours;
    }

    /**
     * @return int
     */
    public function getNumberOfStandardHours(): int
    {
        return $this->numberOfStandardHours;
    }

    /**
     * @param string $gaveAwayTheCar
     */
    public function setGaveAwayTheCar(string $gaveAwayTheCar): void
    {
        $this->gaveAwayTheCar = $gaveAwayTheCar;
    }

    /**
     * @return string
     */
    public function getGaveAwayTheCar(): string
    {
        return $this->gaveAwayTheCar;
    }

    /**
     * @param string $receivedTheCar
     */
    public function setReceivedTheCar(string $receivedTheCar): void
    {
        $this->receivedTheCar = $receivedTheCar;
    }

    /**
     * @return string
     */
    public function getReceivedTheCar(): string
    {
        return $this->receivedTheCar;
    }

    /**
     * @param Auto $auto
     */
    public function setAuto(Auto $auto): void
    {
        $this->auto = $auto;
    }

    /**
     * @return Auto
     */
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

    /**
     * @param SpareParts $spareParts
     */
    public function setSpareParts(SpareParts $spareParts): void
    {
        $this->spareParts = $spareParts;
    }

    /**
     * @return SpareParts
     */
    public function getSpareParts(): SpareParts
    {
        return $this->spareParts;
    }

    private function getTotalPrice(): int
    {
        return self::STANDARD_HOUR_PRICE * $this->getNumberOfStandardHours() + $this->getSpareParts()->getMaterialsTotalPrice();
    }
    public function getWorkOrder()
    {
        $workOrder = [
            'Work order number' => $this->getWorkOrderNumber(),
//            'Car owner' => $this->getCarOwner()->getFullName(),
            'Date' => $this->getDate(),
            'Service code' => $this->getServiceCode(),
            'Completed work' => $this->getCompletedWork(),
            'Number of standard hours' => $this->getNumberOfStandardHours(),
            'Total price' => $this->getTotalPrice(),
            'Gave away the car' => $this->getGaveAwayTheCar(),
            'Received the car' => $this->getReceivedTheCar(),
        ];
        return array_merge($this->getAuto()->getFullInfo(), $this->getCarOwner()->getFullInfo(), $this->getSpareParts()->getSparePartsInfo(), $workOrder);
    }
}