<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask\Contracts;

interface Fee
{
    public function getFee($amount);

    public function compute($amount);
}
