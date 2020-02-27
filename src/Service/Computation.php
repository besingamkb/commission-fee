<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask\Service;

class Computation
{
    public static function compute($amount, $percentage)
    {
        return ($amount / 100) * $percentage;
    }
}
