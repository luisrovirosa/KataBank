<?php


namespace KataBank;

use KataBank\Output\Output;

class Printer
{

    /**
     * @var Output
     */
    private $output;

    function __construct(Output $output)
    {
        $this->output = $output;
    }

    public function printTransactions($transactions)
    {
        $this->output->write("DATE | AMOUNT | BALANCE");
    }
}
