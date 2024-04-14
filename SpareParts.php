<?php
require_once 'Materials.php';
class SpareParts extends Materials
{
    private string $partNumber;

    /**
     * @param string $partNumber
     */
    public function setPartNumber(string $partNumber): void
    {
        $this->partNumber = $partNumber;
    }

    /**
     * @return string
     */
    public function getPartNumber(): string
    {
        return $this->partNumber;
    }
    public function getSparePartsInfo(): array
    {
        $fullInfo = parent::getFullInfo();

        $partNumber = ['Part number' => $this->getPartNumber()];

        return array_merge($partNumber, $fullInfo);
    }
}