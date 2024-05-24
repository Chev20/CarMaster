<?php
declare(strict_types=1);

namespace CarMaster\Entity;
class CarOwner
{
    private int $id;
    private string $name;
    private string $surname;
    private string $fatherName;
    private int $telephoneNumber;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setFatherName(string $fatherName): void
    {
        $this->fatherName = $fatherName;
    }

    public function getFatherName(): string
    {
        return $this->fatherName;
    }

    public function getTelephoneNumber(): int
    {
        return $this->telephoneNumber;
    }

    public function setTelephoneNumber(int $telephoneNumber): void
    {
        $this->telephoneNumber = $telephoneNumber;
    }
    public function getFullInfo(): array
    {
        return [
            'Surname' => $this->getSurname(),
            'Name' => $this->getName(),
            'Father name' => $this->getFatherName(),
            'Telephone number' => $this->getTelephoneNumber(),
        ];
    }
}