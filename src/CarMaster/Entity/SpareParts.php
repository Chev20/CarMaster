<?php
declare(strict_types=1);

namespace CarMaster\Entity;

class SpareParts extends Materials
{
    private array $partNumber;

    public function setNumber(array $partNumber): void
    {
        $this->partNumber = $partNumber;
    }

    public function getNumber(): array
    {
        return $this->partNumber;
    }

    public function getFullInfo(): array
    {
        $fullInfo = parent::getFullInfo();
        $partNumber = ['Part number' => implode($this->getNumber())];
        return array_merge($partNumber, $fullInfo);
    }
}
