<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask\UserTypes;

use Paymoko\CommissionTask\Contracts\UserType;

class NaturalUser implements UserType
{
    const TYPE = 'natural';

    public function getFee(float $amount)
    {
        return $amount;
    }
}
