<?php
declare(strict_types=1);

namespace CarMaster\Entity\Exceptions;

use RuntimeException;

class WorkOrderValidationException extends RuntimeException
{
    public function __construct(string $message = "WorkOrder object has invalid data")
    {
        parent::__construct($message);
    }
}