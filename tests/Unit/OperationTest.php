<?php


namespace Paymoko\CommissionTask\Tests\Unit;


use Paymoko\CommissionTask\Contracts\Currency;
use Paymoko\CommissionTask\Contracts\OperationType;
use Paymoko\CommissionTask\Contracts\UserType;
use Paymoko\CommissionTask\Operation;
use Paymoko\CommissionTask\Tests\Setup\OperationDataFactory;
use PHPUnit\Framework\TestCase;

class OperationTest extends TestCase
{
    public $operationData;
    public $operation;

    public function setUp()
    {
        $this->operationData = (new OperationDataFactory())->getDataForNaturalCashIn();
        $this->operation = new Operation(...$this->operationData);
    }

    /** @test */
    public function it_can_get_user_type()
    {
        $this->assertInstanceOf(UserType::class, $this->operation->getUserType());
    }
    
    /** @test */
    public function it_can_get_currency()
    {
        $this->assertInstanceOf(Currency::class, $this->operation->getCurrency());
    }
    
    /** @test */
    public function it_can_get_operation_type()
    {
        $this->assertInstanceOf(OperationType::class, $this->operation->getOperationType());
    }
}