<?php
declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use CarMaster\Entity\Auto;
use CarMaster\Entity\CarOwner;
use CarMaster\Entity\Client;
use CarMaster\Entity\Exceptions\AutoValidationException;
use CarMaster\Entity\Exceptions\WorkOrderValidationException;
use CarMaster\Entity\SpareParts;
use CarMaster\Entity\WorkOrder;

try {
    $carOwner = new CarOwner();
    $carOwner->setName(Faker\Factory::create()->firstName());
    $carOwner->setSurname(Faker\Factory::create()->lastName);
    $carOwner->setFatherName('');
    $carOwner->setTelephoneNumber((int)Faker\Factory::create()->e164PhoneNumber);

    $firstAuto = new Auto();
    $firstAuto->setBrand('Honda');
    $firstAuto->setModel('Civic');
    $firstAuto->setBodyType('sedan');
    $firstAuto->setYearOfIssue(2008);
    $firstAuto->setEngineCapacity(1.8);
    $firstAuto->setWinNumber('NLAFD78908W350773');
    $firstAuto->setRegistrationNumber('KE5115AB');
    $firstAuto->setMileage(158269);
    $firstAuto->setOwner($carOwner);

    $client = new Client();
    $client->setStatus('Personal driver');
    $client->setName('Artem');
    $client->setSurname('Vlasov');
    $client->setFatherName('Borisovich');
    $client->setTelephoneNumber(380935896357);

    $sparePart = new SpareParts();
    $sparePart->setNumber(["141516, 141517"]);
    $sparePart->setName(['Ball joint left', 'Ball joint right']);
    $sparePart->setCount([1, 1]);
    $sparePart->setUnitPrice([987, 987]);

    $workOrder = new WorkOrder();
    $workOrder->setNumber(1234567890);
    $workOrder->setAuto($firstAuto);
    $workOrder->setCarOwner($carOwner);
    $workOrder->setServiceCodes([1456, 1457]);
    $workOrder->setCompletedWorks(['Replacing the front left ball joint', 'Replacing the front right ball joint']);
    $workOrder->setNumbersOfStandardHours([2, 1.5]);
    $workOrder->setSpareParts($sparePart);
    $workOrder->setGaveAwayTheCar('Voloshin Andrey');
    $workOrder->setReceivedTheCar($client);

    foreach ($workOrder->getFullInfo() as $workOrderKey => $order) {
        echo "\n" . $workOrderKey;
        foreach ($order as $orderKey => $orderValue){
            if (!is_array($orderValue)) {
                echo "\n" . $orderKey . ': ' . $orderValue;
            } else {
                echo "\n" . $orderKey;
                foreach ($orderValue as $key => $value) {
                    echo "\n" . $key . ': ' . $value;
                }
            }
        }
    }

} catch (WorkOrderValidationException $e) {
    echo 'WorkOrder object generated error detected: ' . $e;
} catch (AutoValidationException $e) {
    echo 'Auto object generated error detected: ' . $e;
}

