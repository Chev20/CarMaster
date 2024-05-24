<?php

namespace CarMaster\Repository;

use CarMaster\Entity\Auto;
use PDO;

class AutoRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(Auto $auto): void
    {
        if (null == $auto->getOwner()->getId()) {
            throw new EntityIdException('Auto entity does not have id');
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
            ':engineCapacity' => $auto->getEngineCapacity(),
            ':winNumber' => $auto->getWinNumber(),
            ':registrationNumber' => $auto->getRegistrationNumber(),
            ':carMileage' => $auto->getMileage()
        ]);
        $auto->setId((int)$this->pdo->lastInsertId());
    }

    public function delete(Auto $auto):void
    {
        $statement = $this->pdo->prepare('DELETE FROM auto WHERE winNumber = :winNumber');
        $statement->execute(['win_Number' => $auto->getWinNumber()]);
    }
    public function update(Auto $auto):void
    {
        $statement = $this->pdo->prepare(
            'UPDATE auto 
                   SET registrationNumber=:registrationNumber, carMileage=:carMileage 
                   WHERE id=:id'
        );

        $statement->execute([
            ':id' => $auto->getId(),
            ':registrationNumber' => $auto->getRegistrationNumber(),
            ':carMileage' => $auto->getMileage()
        ]);
    }

    public function findByWinNumber(string $winNumber): object
    {
        $statement = $this->pdo->prepare('SELECT auto.id, carOwner_id brand, model, bodyType, yearOfIssue, engineCapacity, registrationNumber, carMileage
                                                FROM auto 
                                                join carOwner on carOwner.id = auto.carOwner_id
                                                WHERE winNumber=:winNumber'
        );
        $statement->execute($winNumber);
        return $statement->fetchObject();


    }

}