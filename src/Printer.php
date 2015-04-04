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
        $total = 0;
        $textToPrint = array();
        /** @var Transaction $transaction */
        foreach ($transactions as $transaction) {
            $total += $transaction->amount();
            $textToPrint[] = "{$transaction->date()} | {$transaction->amount()} | $total";
        }
        $reverseText = array_reverse($textToPrint);
        array_map(
            function ($toPrint) {
                $this->output->write($toPrint);
            },
            $reverseText
        );
    }
}
