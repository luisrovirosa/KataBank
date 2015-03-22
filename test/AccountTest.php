<?php


namespace KataBank\Test;

use KataBank\Account;
use Prophecy\PhpUnit\ProphecyTestCase;

class AccountTest extends ProphecyTestCase
{
    /**
     * @test
     */
    public function depositShouldCallThePersistence()
    {
        $repositoryProphecy = $this->prophesize('KataBank\Repository');
        $account = new Account($repositoryProphecy->reveal());
        $account->deposit(1000);

        $repositoryProphecy->deposit(1000)->shouldBeCalled();
    }
}
