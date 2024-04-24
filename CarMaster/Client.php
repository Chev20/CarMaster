<?php
declare(strict_types=1);

namespace CarMaster;

class Client extends CarOwner
{
    private string $clientStatus;

    public function setClientStatus(string $clientStatus): void
    {
        $this->clientStatus = $clientStatus;
    }

    public function getClientStatus(): string
    {
        return $this->clientStatus;
    }

    public function getFullInfo(): array
    {
        $fullInfo = parent::getFullInfo();
        $clientStatus = ['Client status' => $this->getClientStatus()];
        return array_merge($clientStatus, $fullInfo);
    }
}