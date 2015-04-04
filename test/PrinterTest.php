<?php


namespace KataBank\Test;

use KataBank\Printer;
use Prophecy\PhpUnit\ProphecyTestCase;
use Prophecy\Prophecy\ObjectProphecy;

class PrinterTest extends ProphecyTestCase
{
    /**
     * @var Printer
     */
    private $printer;

    /**
     * @var ObjectProphecy
     */
    private $outputProphecy;

    protected function setUp()
    {
        parent::setUp();
        $this->outputProphecy = $this->prophesize('KataBank\Output\Output');
        $this->printer = new Printer($this->outputProphecy->reveal());
    }

    /**
     * @test
     */
    public function print_transactions_prints_the_header()
    {
        $transactions = array();

        $this->printer->printTransactions($transactions);

        $this->outputProphecy->write("DATE | AMOUNT | BALANCE")->shouldBeCalled();
    }

    /**
     * @test
     */
    public function print_transactions_prints_the_transaction_in_the_correct_format()
    {
        $date = '01/04/2014';
        $amount = 1000;
        $transactionProphecy = $this->createTransactionProphecy($date, $amount);

        $transactions = array($transactionProphecy->reveal());

        $this->printer->printTransactions($transactions);

        $this->outputProphecy->write("$date | $amount | $amount")->shouldBeCalled();
    }

    /**
     * @param string $date
     * @param int $amount
     * @return ObjectProphecy
     */
    protected function createTransactionProphecy($date, $amount)
    {
        $transactionProphecy = $this->prophesize('KataBank\Transaction');
        $transactionProphecy->date()->willReturn($date);
        $transactionProphecy->amount()->willReturn($amount);

        return $transactionProphecy;
    }
}
