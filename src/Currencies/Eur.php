<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask\Currencies;

use Paymoko\CommissionTask\Contracts\Currency;

class Eur implements Currency
{
    public $value = 1;
    /**
     * @var float
     */
    private $amount;

    public function setValue(float $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    public function getValue(): float
    {
        return $this->amount / $this->rate();
    }

    public function rate()
    {
        return $this->value;
    }
}
