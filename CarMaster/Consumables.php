<?php
declare(strict_types=1);

namespace CarMaster;

class Consumables extends Materials
{
    private int $consumablesCode;

    public function setConsumablesCode(int $consumablesCode): void
    {
        $this->consumablesCode = $consumablesCode;
    }

    public function getConsumablesCode(): int
    {
        return $this->consumablesCode;
    }

    public function getFullInfo(): array
    {
        $fullInfo = parent::getFullInfo();
        $consumablesCode = ['Consumables code' => $this->getConsumablesCode()];
        return array_merge($consumablesCode, $fullInfo);
    }
}