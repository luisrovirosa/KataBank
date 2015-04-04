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
     * @test
     */
    public function prints_more_than_one_transaction_correctly()
    {
        $date1 = '01/04/2014';
        $amount1 = 1000;
        $transaction1Prophecy = $this->createTransactionProphecy($date1, $amount1);
        $date2 = '02/04/2014';
        $amount2 = 400;
        $transaction2Prophecy = $this->createTransactionProphecy($date2, $amount2);
        $transactions = array($transaction1Prophecy->reveal(), $transaction2Prophecy->reveal());

        $this->printer->printTransactions($transactions);

        $this->outputProphecy->write("01/04/2014 | 1000 | 1000")->shouldBeCalled();
        $this->outputProphecy->write("02/04/2014 | 400 | 1400")->shouldBeCalled();
    }

    /**
     * @test
     */
    public function i_don_t_know_how_to_test_order()
    {
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
