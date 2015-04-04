<?php


namespace KataBank\Test;

use KataBank\Printer;
use Prophecy\PhpUnit\ProphecyTestCase;
use Prophecy\Prophecy\ObjectProphecy;

class PrinterTest extends ProphecyTestCase
{

    /**
     * @var ObjectProphecy
     */
    private $outputProphecy;

    /**
     * @test
     */
    public function print_transactions_prints_the_header()
    {
        $this->outputProphecy = $this->prophesize('KataBank\Output\Output');

        $printer = new Printer($this->outputProphecy->reveal());

        $printer->printTransactions(array());

        $this->outputProphecy->write("DATE | AMOUNT | BALANCE")->shouldBeCalled();
    }
}
