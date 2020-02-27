<?php

declare(strict_types=1);

namespace Paymoko\CommissionTask\Service\FileReaders;

use Exception;
use Iterator;
use League\Csv\Reader;
use Paymoko\CommissionTask\Contracts\FileReader;

class CsvReader implements FileReader
{
    private $csv;

    /**
     * CsvReader constructor.
     *
     * @param $csv
     *
     * @throws \Exception
     */
    public function __construct($csv)
    {
        if (!file_exists($csv)) {
            throw new Exception('File not found. Use absolute path.');
        }
        $this->csv = Reader::createFromPath($csv, 'r');
    }

    public function getRecords(): Iterator
    {
        return $this->csv->getRecords();
    }
}
