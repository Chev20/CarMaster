<?php
require_once 'Materials.php';
class Consumables extends Materials
{
    private int $consumablesCode;

    /**
     * @param int $consumablesCode
     */
    public function setConsumablesCode(int $consumablesCode): void
    {
        $this->consumablesCode = $consumablesCode;
    }

    /**
     * @return int
     */
    public function getConsumablesCode(): int
    {
        return $this->consumablesCode;
    }

    private function getConsumablesInfo(): array
    {
        $fullInfo = parent::getFullInfo();
        $consumablesCode = ['Consumables code' => $this->getConsumablesCode()];
        return array_merge($consumablesCode, $fullInfo);
    }
}