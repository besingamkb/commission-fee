<?php


namespace Paymoko\CommissionTask\Tests\Setup;


class OperationDataFactory
{
    const PERCENTAGE = 0.3;
    const LEGAL_USER_MINIMUM = 0.50;
    const CASH_IN_MAXIMUM = 5.00;
    const TYPE_CASH_IN = "cash_in";
    const TYPE_CASH_OUT = "cash_out";
    const USER_TYPE_NATURAL = "natural";
    const USER_TYPE_LEGAL = "legal";

    public function getDataForNaturalCashOut()
    {
        return [
            "2016-02-19",
            "5",
            "natural",
            "cash_out",
            "3000000",
            "JPY"
        ];
    }

    public function getDataForNaturalCashIn()
    {
        return [
            "2016-01-05",
            "1",
            "natural",
            "cash_in",
            "200.00",
            "EUR",
        ];
    }
}