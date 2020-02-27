<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask;

use Paymoko\CommissionTask\Currencies\Eur;
use Paymoko\CommissionTask\Currencies\Jpy;
use Paymoko\CommissionTask\Currencies\Usd;
use Paymoko\CommissionTask\OperationTypes\CashIn;
use Paymoko\CommissionTask\OperationTypes\CashOut;
use Paymoko\CommissionTask\Service\CommissionFee;
use Paymoko\CommissionTask\UserTypes\LegalUser;
use Paymoko\CommissionTask\UserTypes\NaturalUser;

class Operation
{
    private $operationDate;
    private $userId;
    private $userType;
    private $operationType;
    private $operationAmount;
    private $operationCurrency;

    public function __construct($operationDate, $userId, $userType, $operationType, $operationAmount, $operationCurrency)
    {
        $this->operationDate = $operationDate;
        $this->userId = $userId;
        $this->userType = $userType;
        $this->operationType = $operationType;
        $this->operationAmount = $operationAmount;
        $this->operationCurrency = $operationCurrency;
    }

    public function getCommissionFee()
    {
        return (new CommissionFee(
            (float) $this->operationAmount,
            $this->getOperationType(),
            $this->getCurrency()
        ))->compute();
    }

    public function getCurrency()
    {
        $currency = null;
        switch ($this->operationCurrency) {
            case 'JPY':
                $currency = new Jpy();
                break;

            case 'USD':
                $currency = new Usd();
                break;

            case 'EUR':
                $currency = new Eur();
                break;
        }

        return $currency;
    }

    public function getUserType()
    {
        if ($this->userType === LegalUser::TYPE) {
            return new LegalUser();
        }

        return new NaturalUser();
    }

    public function getOperationType()
    {
        if ($this->operationType === CashOut::TYPE) {
            return new CashOut($this->getUserType());
        }

        return new CashIn();
    }
}
