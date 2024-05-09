<?php
declare(strict_types=1);

namespace CarMaster;

abstract class Materials
{
    private string $name;
    private int $count;
    private int $unitPrice;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function setUnitPrice(int $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }

    public function getTotalPrice(): float
    {
        return $this->getCount() * $this->getUnitPrice();
    }

    public function getFullInfo(): array
    {
        return [
            'Material name' => $this->getName(),
            'Count' => $this->getCount(),
            'Unit price' => $this->getUnitPrice(),
            'Total material price' => $this->getTotalPrice(),
        ];
    }
}