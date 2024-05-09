<?php
declare(strict_types=1);

namespace CarMaster;

class SpareParts extends Materials
{
    private string $partNumber;

    public function setNumber(string $partNumber): void
    {
        $this->partNumber = $partNumber;
    }

    public function getNumber(): string
    {
        return $this->partNumber;
    }

    public function getFullInfo(): array
    {
        $fullInfo = parent::getFullInfo();
        $partNumber = ['Part number' => $this->getNumber()];
        return array_merge($partNumber, $fullInfo);
    }
}
