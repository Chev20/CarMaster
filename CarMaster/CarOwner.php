<?php
declare(strict_types=1);

namespace CarMaster;
class CarOwner
{
    private string $name;
    private string $surname;
    private string $fatherName;
    private int $telephoneNumber;

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $fatherName
     */
    public function setFatherName(string $fatherName): void
    {
        $this->fatherName = $fatherName;
    }

    /**
     * @return string
     */
    public function getFatherName(): string
    {
        return $this->fatherName;
    }

    /**
     * @return int
     */
    public function getTelephoneNumber(): int
    {
        return $this->telephoneNumber;
    }

    /**
     * @param int $telephoneNumber
     */
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