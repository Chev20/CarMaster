<?php
declare(strict_types=1);

namespace CarMaster;
abstract class Materials
{
    private string $name;
    private int $count;
    private int $unitPrice;

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param int $count
     */
    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $unitPrice
     */
    public function setUnitPrice(int $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return int
     */
    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }
    public function getMaterialsTotalPrice(): float
    {
        return $this->getCount() * $this->getUnitPrice();
    }
    public function getFullInfo(): array
    {
        return [
            'Material name' => $this->getName(),
            'Count' => $this->getCount(),
            'Unit price' => $this->getUnitPrice(),
            'Total material price' => $this->getMaterialsTotalPrice(),
        ];
    }
}