<?php

namespace KataBank\Test;

use KataBank\Account;
use KataBank\Date;
use KataBank\Output\Output;
use KataBank\Printer;
use KataBank\Repository;
use KataBank\TransactionFactory;
use Prophecy\PhpUnit\ProphecyTestCase;

class KataBankTest extends ProphecyTestCase
{
    /**
     * @test
     */
    public function acceptanceTest()
    {

        $consoleProphecy = $this->prophesize('KataBank\Output\Output');
        $date = $this->getMock('KataBank\Date');
        $date->method('now')
            ->will($this->onConsecutiveCalls('01/04/2014', '02/04/2014', '10/04/2014'));

        $account = $this->createAccount($consoleProphecy->reveal(), $date);
        $account->deposit(1000);
        $account->withdraw(100);
        $account->deposit(500);

        $account->printStatements();

        $consoleProphecy->printLine("DATE | AMOUNT | BALANCE")->shouldBeCalled();
        $consoleProphecy->printLine("10/04/2014 | 500 | 1400")->shouldBeCalled();
        $consoleProphecy->printLine("02/04/2014 | -100 | 900")->shouldBeCalled();
        $consoleProphecy->printLine("01/04/2014 | 1000 | 1000")->shouldBeCalled();
    }

    /**
     * @param Output $output
     * @param Date $date
     * @return Account
     */
    protected function createAccount(Output $output, Date $date)
    {
        $transactionFactory = new TransactionFactory($date);
        $repository = new Repository($transactionFactory);
        $printer = new Printer($output);
        $account = new Account($repository, $printer);

        return $account;
    }
}
