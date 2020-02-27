<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask\Contracts;

interface Currency
{
    public function setValue(float $amount);

    public function getValue(): float;

    public function rate();
}
