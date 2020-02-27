<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask\OperationTypes;

use Paymoko\CommissionTask\Contracts\Fee;
use Paymoko\CommissionTask\Contracts\OperationType;
use Paymoko\CommissionTask\Service\Computation;

class CashIn implements OperationType, Fee
{
    const TYPE = 'cash_in';
    protected $percentage = 0.3;
    protected $minimum = 5.00;

    public function getFee($amount): float
    {
        return $this->compute($amount) < $this->minimum ? $this->compute($amount) : $this->minimum;
    }

    public function compute($amount)
    {
        return Computation::compute($amount, $this->percentage);
    }
}
