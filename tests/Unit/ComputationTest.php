<?php


namespace Paymoko\CommissionTask\Tests\Unit;


use Paymoko\CommissionTask\Service\Computation;
use PHPUnit\Framework\TestCase;

class ComputationTest extends TestCase
{
    /** @test */
    public function it_can_compute_percentage()
    {
        $number = 3456;
        $percentage = 15.123;
        $value = ($number / 100) * $percentage;

        $this->assertEquals($value, Computation::compute($number, $percentage));
    }
}