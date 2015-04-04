<?php

namespace KataBank\Test;

use KataBank\Account;
use Prophecy\PhpUnit\ProphecyTestCase;

class KataBankTest extends ProphecyTestCase
{
    /**
     * @test
     */
    public function acceptanceTest()
    {
        $this->markTestSkipped();
        $repositoryProphecy = $this->prophesize('KataBank\Repository');
        $consoleProphecy = $this->prophesize('KataBank\Console');
        $account = new Account($repositoryProphecy->reveal(), $consoleProphecy->reveal());
        $account->deposit(1000);
        $account->withdraw(100);
        $account->deposit(500);

        $account->printStatements();

        $consoleProphecy->printLine("DATE | AMOUNT | BALANCE")->shouldBeCalled();
        $consoleProphecy->printLine("10/04/2014 | 500 | 1400")->shouldBeCalled();
        $consoleProphecy->printLine("02/04/2014 | -100 | 900")->shouldBeCalled();
        $consoleProphecy->printLine("01/04/2014 | 1000 | 1000")->shouldBeCalled();
    }
}
