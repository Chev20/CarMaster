<?php
declare(strict_types=1);

namespace CarMaster;

class Consumables extends Materials
{
    private int $consumablesCode;

    public function setCode(int $consumablesCode): void
    {
        $this->consumablesCode = $consumablesCode;
    }

    public function getCode(): int
    {
        return $this->consumablesCode;
    }

    public function getFullInfo(): array
    {
        $fullInfo = parent::getFullInfo();
        $consumablesCode = ['Consumables code' => $this->getCode()];
        return array_merge($consumablesCode, $fullInfo);
    }
}