<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask\Contracts;

use Iterator;

interface FileReader
{
    public function getRecords(): Iterator;
}
