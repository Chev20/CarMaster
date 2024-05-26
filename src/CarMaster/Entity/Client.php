<?php
declare(strict_types=1);

namespace CarMaster\Entity;

class Client extends CarOwner
{
    private string $status;

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getFullInfo(): array
    {
        $fullInfo = parent::getFullInfo();
        $clientStatus = ['Client status' => $this->getStatus()];
        return array_merge($clientStatus, $fullInfo);
    }
}