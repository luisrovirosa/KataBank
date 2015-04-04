<?php


namespace KataBank\Test;

use KataBank\Account;
use Prophecy\PhpUnit\ProphecyTestCase;
use Prophecy\Prophecy\ObjectProphecy;

class AccountTest extends ProphecyTestCase
{
    /**
     * @var ObjectProphecy
     */
    private $repositoryProphecy;

    /**
     * @var ObjectProphecy
     */
    private $printerProphecy;

    /**
     * @var Account
     */
    private $account;

    protected function setUp()
    {
        parent::setUp();
        $this->repositoryProphecy = $this->prophesize('KataBank\Repository');
        $this->printerProphecy = $this->prophesize('KataBank\Printer');
        $this->account = new Account($this->repositoryProphecy->reveal(), $this->printerProphecy->reveal());
    }

    /**
     * @test
     */
    public function deposit_should_call_the_persistence()
    {
        $this->account->deposit(1000);

        $this->repositoryProphecy->deposit(1000)->shouldBeCalled();
    }

    /**
     * @test
     */
    public function withdraw_should_call_the_persistence()
    {
        $this->account->withdraw(500);

        $this->repositoryProphecy->withdraw(500)->shouldBeCalled();
    }

    /**
     * @test
     */
    public function print_statement_retrieve_the_transactions_from_repository()
    {
        $this->account->printStatements();
        $this->repositoryProphecy->getTransactions()->shouldBeCalled();
    }

    /**
     * @test
     */
    public function print_statement_call_the_printer_with_the_transactions()
    {
        $transactions = array();
        $this->repositoryProphecy->getTransactions()->willReturn($transactions);

        $this->account->printStatements();

        $this->printerProphecy->printTransactions($transactions)->shouldBeCalled();
    }
}
