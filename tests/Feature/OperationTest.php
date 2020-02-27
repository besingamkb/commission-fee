<?php


namespace Paymoko\CommissionTask\Tests\Feature;


use Paymoko\CommissionTask\Operation;
use Paymoko\CommissionTask\Tests\Setup\OperationDataFactory;
use PHPUnit\Framework\TestCase;

class OperationTest extends TestCase
{
    public $operationData;

    public function setUp()
    {
        $this->operationData = (new OperationDataFactory())->getDataForNaturalCashOut();
    }
    /** @test */
    public function can_get_computed_commission_fee()
    {
        $operation = new Operation(...$this->operationData);
        $computation = ($this->operationData[4] / 100) * OperationDataFactory::PERCENTAGE;
        if ($this->operationData[3] === OperationDataFactory::TYPE_CASH_OUT) {
            if ($this->operationData[2] === OperationDataFactory::USER_TYPE_LEGAL) {
                if ($computation < OperationDataFactory::LEGAL_USER_MINIMUM) {
                    $computation = OperationDataFactory::LEGAL_USER_MINIMUM;
                }
            }
        }

        $this->assertEquals(
            number_format($computation, 2),
            $operation->getCommissionFee()
        );
    }
}