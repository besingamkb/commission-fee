<?php


namespace Paymoko\CommissionTask\Tests\Unit;


use Paymoko\CommissionTask\Operation;
use Paymoko\CommissionTask\Service\CommissionFee;
use Paymoko\CommissionTask\Tests\Setup\OperationDataFactory;
use PHPUnit\Framework\TestCase;

class CommissionFeeTest extends TestCase
{
    public $operationData;
    public $operation;

    public function setUp()
    {
        $this->operationData = (new OperationDataFactory())->getDataForNaturalCashIn();
        $this->operation = new Operation(...$this->operationData);
    }

    /** @test */
    public function it_can_get_computed_commission_fee()
    {
        $commission = new CommissionFee(
            $this->operationData[4],
            $this->operation->getOperationType(),
            $this->operation->getCurrency()
        );

        $this->assertNotNull($commission->compute());
        $this->assertEquals($this->operation->getCommissionFee(), $commission->compute());
    }
}