<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask\UserTypes;

use Paymoko\CommissionTask\Contracts\UserType;

class LegalUser implements UserType
{
    const TYPE = 'legal';
    private $minimum = 0.50;

    public function getFee(float $amount)
    {
        return $amount < $this->minimum ? $this->minimum : $amount;
    }
}
