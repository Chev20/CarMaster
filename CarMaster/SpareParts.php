<?php
declare(strict_types=1);

namespace CarMaster;

class SpareParts extends Materials
{
    private string $partNumber;

    public function setPartNumber(string $partNumber): void
    {
        $this->partNumber = $partNumber;
    }

    public function getPartNumber(): string
    {
        return $this->partNumber;
    }

    public function getFullInfo(): array
    {
        $fullInfo = parent::getFullInfo();
        $partNumber = ['Part number' => $this->getPartNumber()];
        return array_merge($partNumber, $fullInfo);
    }
}
