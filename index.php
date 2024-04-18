<?php
declare(strict_types=1);

require_once 'autoloader.php';

use CarMaster\Auto;
use CarMaster\CarOwner;
use CarMaster\Client;
use CarMaster\SpareParts;
use CarMaster\WorkOrder;
use CarMaster\Exceptions\AutoValidationException;
use CarMaster\Exceptions\WorkOrderValidationException;

try {
    $firstAuto = new Auto();
//    $firstAuto->setBrand('Honda');
//    $firstAuto->setBrand('');
    $firstAuto->setModel('Civic');
    $firstAuto->setBodyType('sedan');
    $firstAuto->setYearOfIssue(2008);
    $firstAuto->setEngineCapacity(1.8);
    $firstAuto->setWinNumber('NLAFD78908W350773');
    $firstAuto->setRegistrationNumber('KE5115AB');
    $firstAuto->setCarMileage(158269);

    $carOwner = new CarOwner();
    $carOwner->setName('Igor');
    $carOwner->setSurname('Petrenko');
    $carOwner->setFatherName('Vladislavovich');
    $carOwner->setTelephoneNumber(380660615661);

    $client = new Client();
    $client->setClientStatus('Personal driver');
    $client->setName('Artem');
    $client->setSurname('Vlasov');
    $client->setFatherName('Borisovich');
    $client->setTelephoneNumber(380935896357);

    $sparePart = new SpareParts();
    $sparePart->setPartNumber("141516");
    $sparePart->setName('Ball joint left');
    $sparePart->setCount(1);
    $sparePart->setUnitPrice(987);

    $workOrder = new WorkOrder();
    $workOrder->setWorkOrderNumber(1234567890);
    $workOrder->setAuto($firstAuto);
    $workOrder->setCarOwner($carOwner);
    $workOrder->setServiceCode(1456);
    $workOrder->setCompletedWork('Replacing the front left ball joint');
    $workOrder->setNumberOfStandardHours(2);
    $workOrder->setSpareParts($sparePart);
    $workOrder->setGaveAwayTheCar('Voloshin Andrey');
    $workOrder->setReceivedTheCar($client);

    foreach ($workOrder->getFullInfo() as $key => $order) {
        echo "\n" . $key;
        foreach ($order as $orderKey => $value){
            echo "\n" . $orderKey . ': ' . $value;
        }
    }
} catch (WorkOrderValidationException $e) {
    echo 'WorkOrder object generated error detected: ' . $e;
} catch (AutoValidationException $e) {
    echo 'Auto object generated error detected: ' . $e;
}
