<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask;

use Paymoko\CommissionTask\Contracts\FileReader;

class Paymoko
{
    /**
     * @var \Paymoko\CommissionTask\Contracts\FileReader
     */
    private $reader;

    /**
     * Paymoko constructor.
     */
    public function __construct(FileReader $reader)
    {
        $this->reader = $reader;
    }

    public function process()
    {
        foreach ($this->reader->getRecords() as $record) {
            $operation = new Operation(...$record);
            echo $operation->getCommissionFee().PHP_EOL;
        }
    }
}
