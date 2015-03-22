<?php


namespace KataBank\Test;

use KataBank\Account;
use Prophecy\PhpUnit\ProphecyTestCase;

class AccountTest extends ProphecyTestCase
{
    /**
     * @return \Prophecy\Prophecy\ObjectProphecy
     */
    private $repositoryProphecy;

    /**
     * @var Account
     */
    private $account;

    protected function setUp()
    {
        parent::setUp();
        $this->repositoryProphecy = $this->prophesize('KataBank\Repository');
        $this->account = new Account($this->repositoryProphecy->reveal());
    }

    /**
     * @test
     */
    public function depositShouldCallThePersistence()
    {
        $this->account->deposit(1000);

        $this->repositoryProphecy->deposit(1000)->shouldBeCalled();
    }

    /**
     * @test
     */
    public function withdrawShouldCallThePersistence()
    {
        $this->account->withdraw(500);

        $this->repositoryProphecy->withdraw(500)->shouldBeCalled();
    }
}
