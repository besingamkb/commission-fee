<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask\OperationTypes;

use Paymoko\CommissionTask\Contracts\Fee;
use Paymoko\CommissionTask\Contracts\OperationType;
use Paymoko\CommissionTask\Contracts\UserType;
use Paymoko\CommissionTask\Service\Computation;

class CashOut implements OperationType, Fee
{
    const TYPE = 'cash_out';
    /**
     * @var \Paymoko\CommissionTask\Contracts\UserType
     */
    private $userType;
    protected $percentage = 0.3;

    public function __construct(UserType $userType)
    {
        $this->userType = $userType;
    }

    public function getFee($amount): float
    {
        return $this->userType->getFee($this->compute($amount));
    }

    public function compute($amount)
    {
        return Computation::compute($amount, $this->percentage);
    }
}
