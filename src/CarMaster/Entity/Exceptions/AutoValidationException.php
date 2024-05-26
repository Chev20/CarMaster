<?php
declare(strict_types=1);

namespace CarMaster\Entity\Exceptions;

use RuntimeException;

class AutoValidationException extends RuntimeException
{
    public function __construct(string $message = "Auto object has invalid data")
    {
    parent::__construct($message);
    }
}
