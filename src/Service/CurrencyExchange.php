<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask\Service;

use Paymoko\CommissionTask\Contracts\Currency;

class CurrencyExchange
{
    /**
     * @var float
     */
    private $amount;
    /**
     * @var string
     */
    private $base;

    /**
     * CurrencyExchange constructor.
     */
    public function __construct(float $amount, Currency $base)
    {
        $this->amount = $amount;
        $this->base = $base;
    }

    /**
     * Convert currency from Base Currency into Eur.
     */
    public function exchangeTo(): float
    {
        return $this->amount / $this->base->rate();
    }

    /**
     * Convert currency from Eur to Base Currency.
     */
    public function exchangeFrom(): float
    {
        return $this->amount * $this->base->rate();
    }

    public static function numberFormat($number)
    {
        return number_format(round(ceil($number * 100) / 100, 2), 2);
    }
}
