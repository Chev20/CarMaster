<?php
require_once 'Auto.php';
require_once 'CarOwner.php';
require_once 'WorkOrder.php';
require_once 'Materials.php';
require_once 'Consumables.php';
require_once 'SpareParts.php';

try {
    $firstAuto = new Auto();
    $firstAuto->setBrand('Honda');
    $firstAuto->setModel('Civic');
    $firstAuto->setBodyType('sedan');
    $firstAuto->setYearOfIssue(2008);
    $firstAuto->setEngineCapacity(1.8);
    $firstAuto->setWinNumber('NLAFD78908W350779');
    $firstAuto->setRegistrationNumber('KE5115AB');
    $firstAuto->setCarMileage(158269);

    $carOwner = new CarOwner();
    $carOwner->setName('Artem');
    $carOwner->setSurname('Vlasov');
    $carOwner->setFatherName('Borisovich');
    $carOwner->setTelephoneNumber(380660615661);

    $sparePart = new SpareParts();
    $sparePart->setPartNumber(141516);
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
    $workOrder->setReceivedTheCar('Vlasov Artem');

    foreach ($workOrder->getWorkOrder() as $key => $order) {
        echo $key . ': ' . $order . "\n";
    }

} catch (Exception $error) {
    echo $error;
}
