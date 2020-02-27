<?php

require __DIR__ . '/vendor/autoload.php';

use Paymoko\CommissionTask\Paymoko;
use Paymoko\CommissionTask\Service\FileReaders\CsvReader;

try {
    (new Paymoko(new CsvReader(__DIR__ . "/" . $argv[1])))->process();
} catch (Exception $e) {
    die($e->getMessage());
}