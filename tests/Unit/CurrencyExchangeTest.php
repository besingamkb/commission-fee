<?php


namespace Paymoko\CommissionTask\Tests\Unit;


use Paymoko\CommissionTask\Currencies\Jpy;
use Paymoko\CommissionTask\Service\CurrencyExchange;
use PHPUnit\Framework\TestCase;

class CurrencyExchangeTest extends TestCase
{
    /** @test */
    public function it_can_convert_currency_into_eur()
    {
        $amount = 5000000;
        $currency = new Jpy;
        $currencyExchange = new CurrencyExchange($amount, $currency);

        $this->assertNotNull($currencyExchange->exchangeFrom());
        $this->assertEquals(($amount * $currency->rate()), $currencyExchange->exchangeFrom());
        $this->assertNotNull($currencyExchange->exchangeTo());
        $this->assertEquals(($amount / $currency->rate()), $currencyExchange->exchangeTo());
    }
    
    /** @test */
    public function it_has_static_function_to_format_into_number()
    {
        $this->assertRegExp("/^\s*[$]?\s*((\d+)|(\d{1,3}(\,\d{3})+))(\.\d{2})?\s*$/", CurrencyExchange::numberFormat(5000055));
    }
}