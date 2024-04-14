<?php

abstract class Materials
{
    private string $name;
    private string $count;
    private string $unitPrice;

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
     * @param string $count
     */
    public function setCount(string $count): void
    {
        $this->count = $count;
    }

    /**
     * @return string
     */
    public function getCount(): string
    {
        return $this->count;
    }

    /**
     * @param string $unitPrice
     */
    public function setUnitPrice(string $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return string
     */
    public function getUnitPrice(): string
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