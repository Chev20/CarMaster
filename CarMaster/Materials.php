<?php
declare(strict_types=1);

namespace CarMaster;

abstract class Materials
{
    private array $name;
    private array $count;
    private array $unitPrice;

    public function setName(array $name): void
    {
        $this->name = $name;
    }

    public function getName(): array
    {
        return $this->name;
    }

    public function setCount(array $count): void
    {
        $this->count = $count;
    }

    public function getCount(): array
    {
        return $this->count;
    }

    public function setUnitPrice(array $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    public function getUnitPrice(): array
    {
        return $this->unitPrice;
    }

    public function getTotalPrice(): int
    {
        $totalPrice = 0;
        foreach ($this->getCount() as $countValue)
        {
            $price = 0;
            foreach ($this->getUnitPrice() as $unitPriceValue)
            {
                $price = $unitPriceValue * $countValue;
            }
            $totalPrice += $price;
        }
        return $totalPrice;
    }

    public function getFullInfo(): array
    {
        return [
            'Materials name' => implode(', ', $this->getName()),
            'Count' => implode(', ', $this->getCount()),
            'Unit price' => implode(', ', $this->getUnitPrice()),
            'Total materials price' => $this->getTotalPrice(),
        ];
    }
}