<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask\Service;

use Paymoko\CommissionTask\Contracts\Currency;
use Paymoko\CommissionTask\Contracts\OperationType;

class CommissionFee
{
    /**
     * @var float
     */
    private $amount;
    /**
     * @var \Paymoko\CommissionTask\Contracts\OperationType
     */
    private $operationType;
    /**
     * @var \Paymoko\CommissionTask\Contracts\Currency
     */
    private $operationCurrency;

    public function __construct(float $amount, OperationType $operationType, Currency $operationCurrency)
    {
        $this->amount = $amount;
        $this->operationType = $operationType;
        $this->operationCurrency = $operationCurrency;
    }

    public function compute()
    {
        $currentExchangeTo = new CurrencyExchange($this->amount, $this->operationCurrency);
        $computedFee = $this->operationType->getFee($currentExchangeTo->exchangeTo());
        $currentExchangeFrom = new CurrencyExchange($computedFee, $this->operationCurrency);

        return CurrencyExchange::numberFormat($currentExchangeFrom->exchangeFrom());
    }
}
