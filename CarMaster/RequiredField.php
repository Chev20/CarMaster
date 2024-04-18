<?php
declare(strict_types=1);

namespace CarMaster;

abstract class RequiredField
{
    private string $text;

    public function requiredText($text)
    {
        if (empty($text)) {
            throw new \Exception('empty');
        }
    }
}