<?php
declare(strict_types=1);

namespace CarMaster;

class Consumables extends Materials
{
    private array $consumablesCodes;

    public function setCodes(array $consumablesCodes): void
    {
        $this->consumablesCodes = $consumablesCodes;
    }

    public function getCodes(): array
    {
        return $this->consumablesCodes;
    }

    public function getFullInfo(): array
    {
        $fullInfo = parent::getFullInfo();
        $consumablesCodes = ['Consumables codes' => $this->getCodes()];
        return array_merge($consumablesCodes, $fullInfo);
    }
}