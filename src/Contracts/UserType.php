<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask\Contracts;

interface UserType
{
    public function getFee(float $amount);
}
