<?php

declare(strict_types=1);

namespace CarMaster\Repository;

use CarMaster\CarMaster\Entity\Auto;
use CarMaster\CarMaster\Repository\Exception\EntityIdException;
use PDO;

class AutoRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(Auto $auto): void
    {
        if ($auto->getOwner()->getId == null) {
            throw new EntityIdException('Car owner entity does not have ID');
        }

        $statement = $this->pdo->prepare(
            'INSERT INTO auto (carOwner_id, brand, model, bodyType, yearOfIssue, engineCapacity, winNumber, registrationNumber, carMileage)
                    VALUES (:carOwner_id, :brand, :model, :bodyType, :yearOfIssue, :engineCapacity, :winNumber, :registrationNumber, :carMileage)'
        );
        $statement->execute([
            ':carOwner_id' => $auto->getOwner()->getId(),
            ':brand' => $auto->getBrand(),
            ':model' => $auto->getModel(),
            ':bodyType' => $auto->getBodyType(),
            ':yearOfIssue' => $auto->getYearOfIssue(),
            ':engineCapacity' =>$auto->getEngineCapacity(),
            ':winNumber' => $auto->getWinNumber(),
            ':registrationNumber' => $auto->getRegistrationNumber(),
            ':carMileage' => $auto->getMileage()
        ]);
        $auto->setId((int)$this->pdo->lastInsertId());
    }

    public function delete(Auto $auto): void
    {
        $statement = $this->pdo->prepare('DELETE FROM auto WHERE id = :auto_id');
        $statement->execute(['auto_id' => $auto->getId()]);
    }

    public function update(Auto $auto): void
    {
        $statement = $this->pdo->prepare(
            'UPDATE auto SET registrationNumber=:registrationNumber, carMileage=:carMileage WHERE id=:id'
        );
        $statement->execute([
            ':id' => $auto->getId(),
            ':registrationNumber' => $auto->getRegistrationNumber(),
            ':carMileage' => $auto->getMileage()
        ]);
    }

    public function findByWinNumber(string $winNumber): void
    {
        $statement = $this->pdo->prepare(
            'select auto.id, auto.carOwner_id, auto.brand, auto.model, auto.bodyType, auto.yearOfIssue, auto.engineCapacity, auto.winNumber, auto.registrationNumber, auto.carMileage
                     from auto
                     join carOwner on auto.carOwner_id = carOwner.id
                     where auto.winNumber = :winNumber;'
        );
        $statement->execute(['winNumber' => $winNumber]);
    }
}